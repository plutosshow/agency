
<?php
require_once "conect.php";
if(isset($_GET['z']) && ctype_digit($_GET['z'])){
  $z = $_GET['z'];
  $result=mysqli_query($conn, "SELECT * FROM `Flats`,`Images_for_flat` WHERE Flats.Id_flat ='$z' AND Images_for_flat.Id_flat = '$z';");
          while($row = mysqli_fetch_array($result)){
            $Id_flat=$row['Id_flat'];
            $Number_of_rooms=$row['Number_of_rooms'];
            $Price=$row['Price'];
            $Lived_square=$row['Lived_square'];
            $Common_square=$row['Common_square'];
            $Floor=$row['Floor'];
            $Type_of_construction=$row['Type_of_construction'];
            $Year_of_construction=$row['Year_of_construction'];
            $Region=$row['Region'];
            $District=$row['District'];
            $City=$row['City'];
            $Street=$row['Street'];
            $Building=$row['Building'];
            $Zip=$row['Zip'];
            $Id_owner=$row['Id_owner'];
            $Relevant=$row['Relevant'];
            $Link=$row['Link'];
            $Commentary=$row['Commentary'];



echo'<div class="site-section site-section-sm  bg-light">';
echo' <div class="container">';
echo'   <div class="row">';
echo'       <div class="col-lg-8 pl-md-7">';
echo'         <figure>';
echo'         <img src="'.$Link.'" alt="Image" class="img-fluid">';
echo'         </figure>';
echo'         <div class="row mb-5">';
echo'           <div class="col-md-6">';
echo'             <strong class="text-success h1 mb-3">₽ '.number_format($Price, 0, '', ' ').' </strong>';
echo'           </div>';
echo'           <div class="col-md-6">';
echo'             <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">';
echo'             <li>';
echo'               <span class="property-specs">Общая площадь</span>';
echo'               <span class="property-specs-number">'.$Common_square.' м<sup>2</sup></span>';             
echo'             </li>';
echo'             <li>';
echo'               <span class="property-specs">Площадь</span>';
echo'               <span class="property-specs-number">'.$Lived_square.' м<sup>2</sup></span>';
              
echo'             </li>';
echo'             <li>';
echo'               <span class="property-specs">Количество комнат</span>';
echo'               <span class="property-specs-number">'.$Number_of_rooms.'</span>';
              
echo'             </li>';
echo'           </ul>';
echo'           </div>';
echo'         </div>';
echo'         <div class="row mb-5">';
echo'           <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">';
echo'             <span class="d-inline-block text-black mb-0 caption-text">Тип</span>';
echo'             <strong class="d-block">'.$Type_of_construction.'</strong>';
echo'           </div>';
echo'           <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">';
echo'             <span class="d-inline-block text-black mb-0 caption-text">Год постройки</span>';
echo'             <strong class="d-block">'.$Year_of_construction.'</strong>';
echo'           </div>';
echo'           <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">';
echo'             <span class="d-inline-block text-black mb-0 caption-text">Цена/м<sup>2</sup></span>';
echo'             <strong class="d-block">'.round(($Price/$Common_square), 3).'</strong>';
echo'           </div>';
echo'         </div>';
echo'         <h2 class="h4 text-black">Больше информации</h2>';
echo'         <p>'.$Commentary.'</p>';
echo'              <div class="row mt-5">';      
                
echo'         </div>';
echo'       </div>';


}
}   
?>
