<?php
require_once "../../global.php";
require_once "../../Dao/user.php";

include  "../../PHPMailer/PHPMailer.php";
include  "../../PHPMailer/Exception.php";
include  "../../PHPMailer/POP3.php";
include  "../../PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


extract($_REQUEST);
if (exist_parma('gui_email_don_hang')) {

    $data = '';
    foreach ($favorites as $key =>  $value) {
        $is = '<tr>
                <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">' . $key . '</td>
                <td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">' . $value['name'] . '</td>
                <td style="border: 1px solid #dddddd;text-align: right;padding: 8px;">' . $value['so_luong'] . '</td>
                <td style="border: 1px solid #dddddd;text-align: right;padding: 8px;">' . currency_format($value['gia']) . '</td>
            </tr>';
        $data = $data . $is;
    }
    $randum = substr(md5(time()), 0, 10);
    $mail = new PHPMailer(true);
    $date = date('Y-m-d', time());
    try {
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'tuyetnhung200201@gmail.com';                 // SMTP username
        $mail->Password = 'pevupqufusoaiatg';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->setFrom('tuyetnhung200201@gmail.com', 'X-shop');
        $mail->addAddress($email, 'User');     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Order info ' . $ma_order . '';
        $mail->Body    = '
                <div style="background:gray;padding:20px">
                    <div style="background:white;padding:50px 20px">
                        <h2 style="color:#3F74B8;font-size:24px;padding-bottom:10px;">[Shops] Order info ' . $ma_order . '</h2>
                        <div style="padding:20px 0;border-top:1px gray solid;">
                            <p>Thank you for ordering at the X-shop</p>
                            <p>Here is your order information.</p>
                        </div>
                        <div>
                            Customer name : ' . $name . ' <br> Email :' . $email . ' <br> Phone :' . $phone . '<br> Time orders : ' . $date . '  <br> 
                        </div>
                        <h3> Order code : ' . $ma_order . '</h3>
                
                        <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
                            <tr style="background-color: #dddddd;">
                                <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Order</th>
                                <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Product</th>
                                <th style="border: 1px solid #dddddd;text-align: right;padding: 8px;">Quantity</th>
                                <th style="border: 1px solid #dddddd;text-align: right;padding: 8px;">Price</th>
                            </tr>
                            ' . $data . '
                            <tr>
                                <td colspan="4" style=" border: 1px solid #dddddd;text-align: right;padding: 8px;">' . currency_format($tong_tien) . '</td>
                            </tr>
                        </table>
                        <p>You can review the information orders at <a href="' . $SITE_URL . 'gio_hang/chi_tiet_don_hang.php?ma_order=' . $ma_order . '' . '">Here</a></p>
                    </div>
                </div>
                        ';
        $mail->send();
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
} elseif (exist_parma('mua_ve')) {
    extract($_REQUEST);
    $email = $_SESSION['user']['email'];
    $user = user_select_by_email($email);
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'tuyetnhung200201@gmail.com';                 // SMTP username
        $mail->Password = 'pevupqufusoaiatg';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->setFrom('tuyetnhung200201@gmail.com', 'Kin Star');
        $mail->addAddress($email, 'User');     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Thank you for using our service';
        $mail->Body    = '
        <p>Xin chào ' . $user['name'] . ', <br>
        
';
        $mail->send();
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error';
    }
} else {
    extract($_REQUEST);
    if (!empty($daDangNhap)) {
        $email = $_SESSION['user']['email'];
    }
    $user = user_select_by_email($email);
    $randum = substr(md5(time()), 0, 10);
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'tuyetnhung200201@gmail.com';                 // SMTP username
        $mail->Password = 'pevupqufusoaiatg';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->setFrom('tuyetnhung200201@gmail.com', 'Kin Star');
        $mail->addAddress($email, 'User');     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Reset password: ' . $randum . '';
        $mail->Body    = '
        <p>Xin chào ' . $user['name'] . ', <br>
        Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu của bạn. <br>
        Mật khẩu mới của bạn là: <br></p>
        <span style="padding:15px;border:1px grey solid;font-size:22px">' . $randum . '</span>
        <p>Cảm ơn bạn đã dùng dịch vụ của chúng tôi</p>
';
        $mail->send();
        user_changer_pass(md5($randum), $email);
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error';
    }
}
