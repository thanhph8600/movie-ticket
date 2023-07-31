<?php

require_once "../../global.php";
require_once "../../DAO/user.php";
require_once "../../DAO/ticket.php";
require_once "../../DAO/seat.php";
require_once "../../DAO/discount.php";

extract($_REQUEST);

if (exist_parma('regis')) {
    $mess = '';
    $user = user_select_by_email($email);
    if (!empty($user)) {
        $mess = '<div class="p-2">Email đã được dùng</div>';
    } else {
        try {
            if (!empty($_FILES['thumb'])) {
                $thumb =  save_file('thumb', $UPLOAD_USER_URL);
            } else {
                $thumb = '';
            }
            user_insert($name, $phone, $birtday, $email, md5($pass), $sex, $role, $activated, $thumb);
            $user = user_select_by_email($email);
            $_SESSION['user'] = $user;
            add_cookie('email', $email, 1);
            add_cookie('pass', $pass, 1);
            $mess ='ok';
        } catch (Exception $ex) {
            $mess = '<div class="p-2">Đăng ký thất bại</div>';
        }
    }

    echo $mess;
}
elseif (exist_parma('formRegis')) {
    if(!empty($_SESSION['user'])){
        die;
    }
    include '../user/registration.php';
    die;
}
elseif (exist_parma('login')) {
    try {
        $user = user_select_by_email($email);
        if (empty($user)) {
            $mess = '<div class="p-2">Email không tồn tại</div>';
        } else {
            if ($user['pass'] != md5($pass)) {
                $mess = '<div class="p-2">Mật khẩu không chính xác</div>';
            } else {
                $_SESSION['user'] = $user;
                if (!empty($remenber)) {
                    add_cookie('email', $email, 1);
                    add_cookie('pass', $pass, 1);
                }else{
                    delete_cookie('email');
                    delete_cookie('pass');
                }
                $mess = 'ok';
            }
        }
    } catch (Exception $ex) {
        $mess = '<div class="p-2">Đăng nhập thất bại</div>';
    }
    echo $mess;
}
elseif (exist_parma('formLogin')) {
    if(!empty($_SESSION['user'])){
        die;
    }
    $email = '';
    $pass = '';
    if(!empty($_COOKIE['email'])){
        $email = $_COOKIE['email'];
        $pass = $_COOKIE['pass'];
    }
    include '../user/login.php';
    die;
}
elseif (exist_parma('log_out')) {
    session_unset();
}
elseif (exist_parma('formForgot')) {
    include '../user/forgotPass.php';
}
elseif (exist_parma('forgotPass')) {
    if(!empty($_SESSION['user'])){
        die;
    }
    $mess ='';
    $checkEmail = user_select_by_email($email);
    if(empty($checkEmail)){
        $mess = '<div class="p-2">Email chưa được đăng ký</div>';
    }else {
        $mess = 'ok';
    }

    echo $mess;
}
elseif (exist_parma('account')) {
    check_login();

    $user = $_SESSION['user'];
    $VIEW_NAME = '../user/account.php';
    include '../layout.php';
}
elseif (exist_parma('update')) {
    check_login();
    if(!empty($_POST)){
        if($_COOKIE['email'] != $_POST['email']){
            $user = user_select_by_email($_POST['email']);
        }
        if (!empty($user)) {
            $mess = '<div class=" bg-red-400 text-white pl-10 rounded-md p-2">Email đã được dùng</div>';
        } else {
                if (!empty($_FILES['imgUpload']['name'])) {
                    if(!empty($thumb_old)){
                        unlink('../../uploaded/user/' . $thumb_old);
                    }
                    $thumb =  save_file('imgUpload', $UPLOAD_USER_URL);
                } else {
                    $thumb = $thumb_old;
                }
                user_update($name, $phone, $birtday, $email, $sex, $thumb,$id_user);
                $user = user_select_by_email($email);
                $_SESSION['user'] = $user;
                add_cookie('email', $email, 1);
                $mess ='<div class=" bg-green-400 text-white pl-10 rounded-md p-2">Cập nhật thành công</div>';
        }
    }
    $user = $_SESSION['user'];
    $VIEW_NAME = '../user/account.php';
    include '../layout.php';
}
elseif (exist_parma('changePass')) {
    $user = user_select_by_email($_SESSION['user']['email']);
    if(md5($passOld) != $user['pass']){
        echo 'Mật khẩu cũ không chính xác';
    }elseif($pass != $rePass){
        echo 'Nhập lại mật khẩu chưa chính xác';
    }else{
        user_changer_pass(md5($pass),$user['email']);
        echo 'Cập nhật mật khẩu thành công';
    }
}
elseif (exist_parma('my-ticket')) {
    check_login();
    $user = user_select_by_email($_SESSION['user']['email']);
    $ticket = ticket_select_infoTicket_WHERE_idUser($user['id']);
    $VIEW_NAME = './my-ticket.php';
    include '../layout.php';
}
elseif (exist_parma('detail_ticket')) {
    check_login();
    $ticket = ticket_select_detail_by_idTicket($_GET['id_ticket']);
    $seats = seat_select_by_id_ticket($ticket['id']);
    $discount = 0;
    if(!empty($ticket['id_discount'])){
        $discount = Discount::get_byId($ticket['id_discount']);
        $discount =  $ticket['price']* $ticket['quantity'] * $discount['percent']/100;
    }
    $sum =  $ticket['price'] * $ticket['quantity'] - $discount + $ticket['price_bill'];
    $date_now = date('Y-m-d');
    if($ticket['date'] < $date_now){
        ticket_update_activated(0,$ticket['id']);
    }
    $time_now = date('H:i:s');
    if($ticket['time_end'] < $time_now && $ticket['date'] == $date_now ){
        ticket_update_activated(0,$ticket['id']);
    }
    $VIEW_NAME = './detail_my-ticket.php';
    include '../layout.php';
}
else{
    check_login();
    $user = $_SESSION['user'];
    $VIEW_NAME = '../user/account.php';
    include '../layout.php';
}