<?php
header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');

include "config.php";

 $data=json_decode(file_get_contents("php://input"),true); 
 //print_r($data);
$student_id=$data['sid'];
$sql="SELECT * FROM blog
       WHERE id={$student_id}
    ";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0)
{
    //return the json data
    $output=mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}
else
{
    echo json_encode(array('message' => 'No Records Found','status' => false));
}
?>
