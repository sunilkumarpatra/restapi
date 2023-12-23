<?php
header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');

include "config.php";
$sql="SELECT * FROM blog";
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
