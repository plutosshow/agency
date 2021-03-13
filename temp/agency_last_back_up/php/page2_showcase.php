<?php
            include "filter.php";
            while($row = mysqli_fetch_array($result)){
              $Id_flat=$row['Id_flat'];
              $Number_of_rooms=$row['Number_of_rooms'];
              $Price=$row['Price'];
              $Lived_square=$row['Lived_square'];
              $Common_square=$row['Common_square'];
              $Floor=$row['Floor'];
              $Type_of_construction=$row['Type_of_construction'];
              $Region=$row['Region'];
              $District=$row['District'];
              $City=$row['City'];
              $Street=$row['Street'];
              $Building=$row['Building'];
              $Zip=$row['Zip'];
              $Id_owner=$row['Id_owner'];
              $Relevant=$row['Relevant'];
              $Link=$row['Link'];;
              if($k > 6){
              echo'<div class="col-md-6 col-lg-4 mb-4">';
              echo'<a href="property-details.php?z='.$Id_flat.'" class="prop-entry d-block">';
              echo'<figure>';
              echo'<img src="'.$Link.'" alt="Image" class="img-fluid">';
              echo'</figure>';
              echo'<div class="prop-text">';
              echo'<div class="inner">';
              echo'<span class="price rounded">₽ '.number_format($Price, 0, '', ' ').'</span>';
              echo'<h3 class="title">'.$City.'</h3>';
              echo'<p class="location">'.' '.$Street.', д. '.$Building.'</p>';
              echo'</div>';
              echo'<div class="prop-more-info">';
              echo'<div class="inner d-flex">';
              echo'<div class="col">';
              echo' <span>Общая площадь:</span>';
              echo' <strong>'.$Common_square.' м'.'<sup>2</sup></strong>';
              echo'  </div>';
              echo'  <div class="col">';
              echo'     <span>Комнат:</span>';
              echo'     <strong>'.$Number_of_rooms.'</strong>';
              echo'  </div>';
              echo'    <div class="col">';
              echo'     <span>Жил. площадь:</span>';
              echo'     <strong>'.$Lived_square.' м'.'<sup>2</sup></strong>';
              echo'   </div>';
              echo' </div>';
              echo' </div>';
              echo'</div>';
              echo'</a>';
              echo'</div>';
            }
            $k++;
            }
?>