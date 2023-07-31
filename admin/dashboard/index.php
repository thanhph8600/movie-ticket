<?php
require_once '../../global.php';
require_once '../../DAO/showtime.php';
require_once '../../DAO/film.php';
require_once '../../DAO/room.php';
require_once '../../DAO/shift.php';
require_once '../../DAO/beverages.php';
require_once '../../DAO/discount.php';
require_once '../../DAO/user.php';
require_once '../../DAO/comment.php';

extract($_REQUEST);
$date_now = date('Y-m-d');
$film_dang_chieu = film_select_dang_chieu($date_now);
$user = user_select_new_user();
$discount = Discount::count_discout($date_now);
$price_ticket_Bill = Beverages::get_price_bill_and_ticket();
$comment = comment_getAll();
$VIEW_NAME = 'list.php';

include '../layout.php';