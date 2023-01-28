<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_name('firebase');
session_start();
require('../controllers/firebase.php');
$con = new Firebase();

$username = isset($_POST['username']) ? $_POST['username'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

if($username == "" || $email == "" || $password == ""){
    $_SESSION['error'] = 'กรอกให้มูลให้ครบถ้วน';
    header("Location: ../register.php");
    exit();
}

if($password != $confirm_password){
    $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
    header("Location: ../register.php");
    exit();
}

$data  = $con->select('user','email','EQUAL', $email);
$data = json_decode($data, true);

if(empty($data)){
    $fb = $con->insert('user',[
        'username'=>$username,
        'email'=>$email,
        'password'=>$password,
        'level'=>'user'
    ]);
    $fb = json_decode($fb, true);
    if(empty($fb['error'])){
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['level'] = 'user';
        header("Location: ../index.php");
    }
}
else{
    if(!empty($data['error'])){
        $_SESSION['error'] = $data['error'];
    }
    else{
        $_SESSION['error'] = 'มีผู้ใช้งานอีเมลนี้แล้ว';
    }
    header("Location: ../register.php");
}


?>