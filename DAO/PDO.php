<?php

function pdo_get_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        //kết nối cơ sở dữ liệu
        $conn = new PDO("mysql:host=$servername;dbname=kinstar", $username, $password);
        // set the PDO error mode to exception
        //giấu thông báo lỗi
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}


function pdo_execute($sql)
{
    //func_get_args() là tất cả các đối số được truyền vào hàm
    //cắt mảng, lấy từ đối số thứ 2 trở đi
    $sql_args = array_slice(func_get_args(), 1);
    try {
        //kết nối csdl
        $conn = pdo_get_connection();
        //kiểm tra và chuyển hóa câu lệnh sql 
        $stmt = $conn->prepare($sql);
        //thực thi câu lệnh sql với các biến được cắt ra ở trên
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        //đóng kết nối 
        unset($conn);
    }
}

function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        //lấy tất cả giá trị trả về 
        $row = $stmt->fetchAll();
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        // trả về dữ liệu của object
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //lấy giá trị đầu tiên của mảng trả về
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function last_id($sql)
{

    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        //lấy id sau khi thực thi lâu lệnh
        $last_id = $conn->lastInsertId();
        return $last_id;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
