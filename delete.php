<?php 
require"db_connect.php";

$id = $_GET['id'];
$sql = "DELETE FROM `notes` WHERE id = $id ";
mysqli_query($conn,$sql);


?>