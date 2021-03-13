<?php
include "php/conect.php";
  
 $sql = "SELECT * FROM Owners";
  
 $result_select = mysqli_query($conn, $sql) or die("Ошибка " . mysqli_error($conn))
  
 ?>