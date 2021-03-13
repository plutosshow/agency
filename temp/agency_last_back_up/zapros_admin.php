<?php
    include ("php/owner.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Real Estate Agency</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/mediaelementplayer.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/fl-bigmug-line.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/jquery.fias.min.css" rel="stylesheet">

  </head>
  <body>
  
  <div class="site-loader"></div>
  
  <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
      
    </div>
    <div class="site-navbar">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class=""><a href="index.php" class="h5 text-uppercase text-black"><strong>HomeSpace<span class="text-danger">.</span></strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="has-children">
                    <a href="#">Формирование нового обьекта</a>
                  <ul class="dropdown">
                        <li><a href="inf_owner.php">Информация о владельце</a></li>
                        <li class="has-children">
                          <a href="admin.php">Добавить обьект недвижимости</a>
                        </li>
                  </ul>
                  </li>
                  
                  <li><a href="in_work.php">В работе</a></li>
                  <li><a href="zapros_admin.php">Запросы на звонок</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="py-5 site-section-sm bg-light" >
        <div class="container">
            <h2>Админ. панель</h2>
            <p><b>Недвижимость в работе</b></p>

            <?php
                echo'<form method="POST">';
                echo'<table class="table table-sm">';
                echo'<thead>';
                echo'      <tr>';
                echo'          <th scope="col">#</th>';
                echo'          <th scope="col">ID запроса</th>';
                echo'          <th scope="col">Имя</th>';
                echo'          <th scope="col">Телефон</th>';  
                echo'          <th scope="col">Удаление</th>';             
                echo'      </tr>';
                echo'  </thead>';
                echo'<tbody>';
                $k = 0;
            require_once "php/conect.php";
            $result=mysqli_query($conn, "SELECT * FROM `Zapros`");
            while($row = mysqli_fetch_array($result)){
              $k++;
              $Name=$row['Name'];
              $Phone=$row['Phone'];
              $Id_zapros=$row['Id_zapros'];
              echo'<tr>';
              echo'<th scope="row">'.($k).'</th>';
              $arr[] = $Id_zapros;
              echo'<td><input disabled  class="form-control" type="text" name="Id_zapros'.$k.'" value="'.$Id_zapros.'" /></td>';
              echo'<td><input disabled  class="form-control" type="text" name="Name'.$k.'" value="'.$Name.'" /></td>';
              echo'<td><input disabled  class="form-control" type="text" name="Phone'.$k.'" value="'.$Phone.'" /></td>';
              echo'<td><a href="zapros_admin.php?del='.$k.'" class="btn btn-outline-danger">Удалить</a></td>';
              echo'</tr>';
              }
              echo'</tbody>';
              echo'</table>';
              echo'</form>';
              foreach($arr as $key=>$value){        
                if(!empty($_GET['del']) && $key == ($_GET['del'] - 1))    {
                  $foo = $value;
                  $DEL = "DELETE FROM `Zapros` WHERE `Zapros`.`Id_zapros` = $foo;";    
                  mysqli_query($conn, $DEL);
                  echo'<script language="JavaScript"> 
                  window.location.href = "zapros_admin.php"
                  </script>';
                }           
              } 
            ?>
        </div>

<!-- Footer -->
<footer class="page-footer font-small special-color-dark pt-4">

  <!-- Footer Elements -->
  <div class="container">

    <!-- Social buttons -->
    <ul class="list-unstyled list-inline text-center">
      <li class="list-inline-item">
        <a class="btn-floating btn-fb mx-1">
          <i class="fab fa-facebook-f"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-tw mx-1">
          <i class="fab fa-twitter"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-gplus mx-1">
          <i class="fab fa-google-plus-g"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-li mx-1">
          <i class="fab fa-linkedin-in"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-dribbble mx-1">
          <i class="fab fa-dribbble"> </i>
        </a>
      </li>
    </ul>
    <!-- Social buttons -->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="http://121171.defiska.tmweb.ru/121171-15/agency/index.php">Homespace</a>
    by Yuri Shcherba
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

  </div>
  <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="js/jquery.fias.min.js" type="text/javascript"></script>
  <script src="js/kladr.js" type="text/javascript"></script>
  <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/mediaelement-and-player.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>