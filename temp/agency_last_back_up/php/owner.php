<?php
require_once ('conect.php');

if (!empty($_POST['Second_name']) && !empty($_POST['First_name']) && !empty($_POST['Midle_name']) && !empty($_POST['Gender']) 
&& !empty($_POST['Passport_series']) && !empty($_POST['Passport_ID'])) {
   
    $Second_name=$_POST['Second_name'];
    $First_name=$_POST['First_name'];
    $Midle_name=$_POST['Midle_name'];
    $Gender=$_POST['Gender'];
    
    $Passport_series=$_POST['Passport_series'];
    $Passport_ID=$_POST['Passport_ID'];

    $query2 =" INSERT INTO `Passports` (`Passport_series`, `Passport_ID`) VALUES
    ('$Passport_series','$Passport_ID')"; 

    $result2 = mysqli_query($conn, $query2) or die("Ошибка " . mysqli_error($conn));
    
    $id_from_passport = "SELECT MAX(`Id_passport`) FROM `Passports`";
    $maxId = $conn->query($id_from_passport); 
    $row_maxId = $maxId->fetch_assoc();
    $max_id = $row_maxId['MAX(`Id_passport`)'];

    $query1 =" INSERT INTO `Owners` (`Second_name`, `First_name`, `Midle_name`, `Gender`, `Id_passport`) VALUES
    ('$Second_name','$First_name','$Midle_name','$Gender','$max_id')";

    $result1 = mysqli_query($conn, $query1) or die("Ошибка " . mysqli_error($conn));  
}
?>

