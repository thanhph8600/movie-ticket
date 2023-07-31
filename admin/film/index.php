<?php

use FFI\Exception;

require_once "../../global.php";
require_once "../../Dao/film.php";
check_login();

extract($_REQUEST);

if (exist_parma('btn_add')) {
    $VIEW_NAME = './add.php';
} elseif (exist_parma('btn_insert')) {

    if (empty($name) || empty($directors) || empty($actor) || empty($genre) || empty($premiere) || empty($time) || empty($language) || empty($rated) || empty($trailer) || empty($description) || empty($_FILES['upload']['name'])) {
        $VIEW_NAME = './add.php';
        $MESS = '<div class="alert alert-warning text-white " role="alert">Bạn hãy bật javascript</div>';
    } else {
        try {
            $thumb = save_file('upload', $UPLOAD_FILM_URL);
            film_insert($name, $directors, $actor, $genre, $premiere, $time, $language, $rated, $trailer, $description, $thumb);
            $VIEW_NAME = './list.php';
            $MESS = '<div class="alert alert-success text-white " role="alert">Thêm thành công</div>';
        } catch (Exception $th) {
            $VIEW_NAME = './add.php';
            $MESS = '<div class="alert alert-warning text-white " role="alert">Thêm thất bại</div>';
        }
    }
} elseif (exist_parma('btn_delete')) {
    $film = film_select_by_id($id_film);
    unlink($UPLOAD_FILM_URL . $film['thumb']);
    film_delete($id_film);
    $MESS = '<div class="alert alert-success text-white " role="alert">Xóa thành công</div>';
    $VIEW_NAME = './list.php';
} elseif (exist_parma('btn_edit')) {
    $film = film_select_by_id($id_film);
    $VIEW_NAME = './edit.php';
} elseif (exist_parma('btn_update')) {
    $film = film_select_by_id($id_film);
    if (empty($name) || empty($directors) || empty($actor) || empty($genre) || empty($premiere) || empty($time) || empty($language) || empty($rated) || empty($trailer) || empty($description)) {
        $VIEW_NAME = './add.php';
        $MESS = '<div class="alert alert-warning text-white " role="alert">Bạn hãy bật javascript</div>';
    } else {
        try {
            if (!empty($_FILES['upload']['name'])) {
                unlink($UPLOAD_FILM_URL . $thumb_old);
                $thumb = save_file('upload', $UPLOAD_FILM_URL);
            } else {
                $thumb = $thumb_old;
            }
            $VIEW_NAME = './list.php';
            $MESS = '<div class="alert alert-success text-white " role="alert">Sửa thành công</div>';
            film_update($name, $directors, $actor, $genre, $premiere, $time, $language, $rated, $trailer, $description, $thumb, $id_film);
        } catch (Exception $th) {
            $VIEW_NAME = './add.php';
            $MESS = '<div class="alert alert-warning text-white " role="alert">Sửa thất bại</div>';
        }
    }
} else {
    $VIEW_NAME = './list.php';
}
$films = film_select_all();

include '../layout.php';
