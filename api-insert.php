<?php
header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');
header('Access-Conrtol-Allow-Methods:POST');
include "config.php";
$data=json_decode(file_get_contents("php://input"),true); 
$id="29";
$title=$data['title'];
$description=$data['description'];
$created=date('d-m-Y H:i:s');


$sql="INSERT INTO blog(id,title,description,created) VALUES ('{$id}','{$title}', '{$description}', '{$created}')";
//print_r($sql);die;

if(mysqli_query($conn,$sql))
{
    //return the json data
    //$output=mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode(array('message' => 'Data Saved Successfully','status' => true));
}
else
{
    echo json_encode(array('message' => 'Something Went Wrong','status' => false));
}
?>
