<?php
require_once ('conect.php');

if (!empty($_POST['Commentary']) && !empty($_POST['Year_of_construction']) && !empty($_POST['Number_of_rooms']) && !empty($_POST['Price']) && !empty($_POST['Lived_square']) && !empty($_POST['Common_square']) 
&& !empty($_POST['Floor']) && !empty($_POST['Type_of_construction']) && !empty($_POST['Relevant']) && !empty($_POST['region']) && !empty($_POST['Id_owner']) && !empty($_POST['street']) && !empty($_POST['city']) && !empty($_POST['building'])) {
   
    $Number_of_rooms=$_POST['Number_of_rooms'];
    $Price=$_POST['Price'];
    $Lived_square=$_POST['Lived_square'];
    $Common_square=$_POST['Common_square'];
    $Floor=$_POST['Floor'];
    $Type_of_construction =$_POST['Type_of_construction'];
    $Relevant=$_POST['Relevant'];
    
    $region=$_POST['region'];
    $district=$_POST['district'];
    $city=$_POST['city'];
    $street=$_POST['street'];
    $building=$_POST['building'];
    $zip =$_POST['zip'];
    $Id_owner =$_POST['Id_owner'];
    $Year_of_construction=$_POST['Year_of_construction'];
    $URL=$_POST['URL'];
    $Commentary=$_POST['Commentary'];
    if(!empty($_GET['red'])){
        $red = $_GET['red'];
        $query3 ="UPDATE `Flats` SET `Number_of_rooms` = '$Number_of_rooms', `Price` = '$Price', `Lived_square` = '$Lived_square', `Common_square` = '$Common_square', 
        `Floor` = '$Floor', `Type_of_construction` = '$Type_of_construction', 
        `Commentary` = '$Commentary', `Region` = '$region', `Year_of_construction` = '$Year_of_construction',
        `District` = '$district', `City` = '$city', `Street` = '$street', `Building` = '$building', `Zip` = '$zip', `Id_owner` = '$Id_owner', 
        `Relevant` = '$Relevant' WHERE `Flats`.`Id_flat` = '$red';";
        $query4 = "UPDATE `Images_for_flat` SET `Link` = '$URL' WHERE `Images_for_flat`.`Id_flat` = '$red'";
        $result3 = mysqli_query($conn, $query3)or die("Ошибка " . mysqli_error($conn));
        $result4 = mysqli_query($conn, $query4)or die("Ошибка " . mysqli_error($conn));
    }
    else{
    $query1=" INSERT INTO `Flats` (`Number_of_rooms`, `Price`, `Lived_square`, `Common_square`, `Floor`, `Type_of_construction`,  
    `Region`, `District`, `City`, `Street`, `Building`, `Zip`, `Relevant`, `Id_owner`, `Year_of_construction`, `Commentary`) VALUES
    ('$Number_of_rooms','$Price','$Lived_square','$Common_square','$Floor','$Type_of_construction',
    '$region', '$district', '$city', '$street', '$building', '$zip', '$Relevant', '$Id_owner', '$Year_of_construction', '$Commentary')";
    $result1 = mysqli_query($conn, $query1)or die("Ошибка " . mysqli_error($conn)); 

    $id_from_passport = "SELECT MAX(`Id_flat`) FROM `Flats`;";
    $maxId = $conn->query($id_from_passport); 
    $row_maxId = $maxId->fetch_assoc();
    $max_id = $row_maxId['MAX(`Id_flat`)'];
     
    $query2=" INSERT INTO `Images_for_flat` (Id_flat, Link) VALUES ('$max_id', '$URL');"; 

    $result2 = mysqli_query($conn, $query2)or die("Ошибка " . mysqli_error($conn)); 
}
}

?>

