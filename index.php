<?php
require('./controllers/firebase.php');
$con = new Firebase();
//$data = $con->select('test');
//$data = $con->update('test',[
//    'name'=>'seubsak',
//    'nicname'=>'ball',
//    'phone'=>'088888888'
//]);

//$data = $con->insert('profile',[
//    'name'=>'vvvvvvv',
//    'email'=>'seubsakcub@gmail.com',
//    'phone'=>'08888888'
//]);

$data = $con->insertKeys('profile/A-1',[
    'name'=>'vvvvvvv',
    'email'=>'seubsakcub@gmail.com',
    'phone'=>'08888888'
]);


print_r($data);



?>