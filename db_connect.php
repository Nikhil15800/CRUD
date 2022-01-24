<?php
  $insert = false;
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "notes";

  $conn = mysqli_connect("$servername","$username","$password","$database");

  if(!$conn){
    die("Connection was not stablished due to" .mysqli_connect_error());
  }

  


  if($_SERVER['REQUEST_METHOD']=='POST'){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO `notes` (`sno`, `title`, `description`, `date`) VALUES (NULL, '$title', '$description', current_timestamp())";
    $result = mysqli_query($conn,$sql);

    if($result){
      //echo"The record has been submited successfully: ";
      $insert = true;
    }
    else{
      echo mysqli_error($conn);
    }
  }

?>