<?php
include_once '../../global.php';
include_once '../../DAO/user.php';

var_dump(User::find_by_id(2));