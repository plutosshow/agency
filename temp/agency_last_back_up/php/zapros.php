<?php
require_once ('conect.php');
if (!empty($_POST['Name']) && !empty($_POST['Phone'])){
    $Name=$_POST['Name'];
    $Phone=$_POST['Phone'];

   $query1=" INSERT INTO Zapros (Name, Phone) VALUES ('$Name', '$Phone'); ";

   $result1 = mysqli_query($conn, $query1)or die("Ошибка " . mysqli_error($conn)); 

  }
?>