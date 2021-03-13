<?php
            include "conect.php";
            $k = 1;
            $def = $def1 = 30;
            if(!empty($_GET['Lived_square'])){
              $Lived_square = $_GET['Lived_square'];
              if($Lived_square == 110){
                $def = $def + 1000;
              }
              $Liv = "AND Flats.Lived_square <= $Lived_square + $def AND Flats.Lived_square >= $Lived_square";
            }
            if(!empty($_GET['Common_square'])){
              $Common_square = $_GET['Common_square'];
              if($Common_square == 110){
                $def1 = $def1 + 1000;
              }
              $comm = "AND Flats.Common_square <= $Common_square + $def1 AND Flats.Common_square >= $Common_square";
            }
            if(!empty($_GET['Adress'])){
              $Adress = $_GET['Adress'];
              $Adr = "AND Flats.Region = '$Adress'";
            }
            if(!empty($_GET['Price_min'])){
              $Price_min = $_GET['Price_min'];
              $Pr_min = "AND Flats.Price >= '$Price_min'";
            }
            if(!empty($_GET['Price_max'])){
              $Price_max = $_GET['Price_max'];
              $Pr_m = "AND Flats.Price <= '$Price_max'";
            }
            if(!empty($_GET['Number_of_rooms'])){
              $Number_of_rooms = $_GET['Number_of_rooms'];
              if($Number_of_rooms < 5)
              $Num = "AND Flats.Number_of_rooms = '$Number_of_rooms'";
              else
              $Num = "AND Flats.Number_of_rooms >= '$Number_of_rooms'";
            }
              
              $result=mysqli_query($conn, "SELECT * FROM `Flats`, `Images_for_flat` WHERE Flats.Id_flat = Images_for_flat.Id_flat 
              $Pr_m $Pr_min $Adr $comm $Liv $Num");
?>