<?php

require_once '../../global.php';
require_once '../../DAO/question.php';
check_login();

extract($_REQUEST);

if (exist_parma('btn_edit')) {
    $question = question_select_byId($id_question);
    $VIEW_NAME = 'edit.php';
} elseif (exist_parma('btn_insert')) {

    try {
        question_insert_answer($answer, $id_question);
        $MESS = '<div class="alert alert-success text-white " role="alert">Trả lời thành công</div>';
        $questions = question_getALL();
        $VIEW_NAME = './list.php';
    } catch (Exception $e) {
        $MESS = '<div class="alert alert-warning text-white">Trả lời thất bại</div>';
        $question = question_select_byId($id_question);
        $VIEW_NAME = 'edit.php';
    }

    
} elseif (exist_parma('btn_delete')) {
    try {
        question_delete($id_question);
        $MESS = '<div class="alert alert-success text-white " role="alert">Xóa thành công</div>';
        $questions = question_getALL();
        $VIEW_NAME = './list.php';
    } catch (Exception $e) {
        $MESS = '<div class="alert alert-warning text-white">Xóa thất bại</div>';
        $question = question_select_byId($id_question);
        $VIEW_NAME = 'edit.php';
    }
} else {
    $questions = question_getALL();
    $VIEW_NAME = './list.php';
}
include '../layout.php';
