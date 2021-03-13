<?php
    include ("php/admin_input.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    
    <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.fias.min.js" type="text/javascript"></script>
    <script src="js/kladr.js" type="text/javascript"></script>
    <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    
    <script src="js/ajax/foto_uploder.js" type="text/javascript"></script>
  
  </head>
  <body>
  <div class="site-loader"></div>
  
  <div class="site-wrap">

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

    <div class="py-5 site-section-sm bg-light"  >
      <div class="container">
      <h2>Админ. панель</h2>
        <p><b>Информация о квартире</b></p>
      <?php
      $red = $_GET['red'];
      var_dump($red);
      $result=mysqli_query($conn, "SELECT * FROM `Flats`, `Images_for_flat` WHERE Flats.Id_flat = '$red' AND Images_for_flat.Id_flat = '$red';");
      $row = mysqli_fetch_array($result);
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
      $URL=$row['Link'];
      $Commentary=$row['Commentary'];
      ?>
      <form method = "Post" class = "js-form-address" enctype="multipart/form-data" id="myform">
         <div class="form-row">
          <div class="form-group col-md-2">
          <label for="inputEmail4">Количество комнат</label>
          <input type="Количество комнат" class="form-control" name="Number_of_rooms" placeholder="0" value="<?php echo($Number_of_rooms) ?>">
          </div>
          <div class="form-group col-md-2">
          <label for="inputCity">Этаж</label>
          <input type="text" class="form-control" name="Floor"  placeholder="0" value="<?php echo($Floor) ?>">
          </div>
          <div class="form-group col-md-2">
          <label for="inputAddress">Жилая Площадь</label>
          <input type="text" class="form-control" name="Lived_square" placeholder="0" value="<?php echo($Lived_square) ?>">
          </div>
          <div class="form-group col-md-2">
          <label for="inputAddress2">Общая площадь</label>
          <input type="text" class="form-control" name="Common_square" placeholder="0" value="<?php echo($Common_square) ?>">
          </div>
        </div>
        <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Регион</label>
                    <input type="text" name="region" class="form-control" placeholder="Регион" value="<?php echo($Region) ?>">
                </div>
                <div class="form-group col-md-2">
                    <label>Район</label>
                    <input type="text" name="district" class="form-control" placeholder="Район(если есть)" value="<?php echo($District) ?>">
                </div>
                <div class="form-group col-md-2">
                    <label>Город</label>
                    <input type="text" name="city" class="form-control" placeholder="г/с/д" value="<?php echo($City) ?>">
                </div>
                <div class="form-group col-md-2">
                    <label>Улица</label>
                    <input type="text" name="street" class="form-control" placeholder="Улица" value="<?php echo($Street) ?>">
                </div>
                <div class="form-group col-md-2">
                    <label>Дом</label>
                    <input type="text" name="building" class="form-control" placeholder="0" value="<?php echo($Building) ?>">
                </div>
                <div class="form-group col-md-2">
                    <label>Индекс</label>
                    <input type="text" name="zip" class="form-control" placeholder="000000" value="<?php echo($Zip) ?>">
                </div>
                
        </div> 
        <div class="form-row">
          <div class="form-group col-md-2">
          <label>Цена</label>
          <input type="price" class="form-control" name="Price" placeholder="0.000.000" value="<?php echo($Price) ?>">
          </div>

          <div class="form-group col-md-2">
          <label>Тип постройки</label>
          <select class="form-control " name="Type_of_construction" value="<?php echo($Type_of_construction) ?>">
            <option selected>Новостройка</option>
            <option>Вторичное</option>
          </select>
          </div>
          <div class="form-group">
          <label>Актуальность</label>
          <select class="form-control" name="Relevant" value="<?php echo($Relevant) ?>">
            <option selected>1</option>
            <option>0</option>
          </select>
          </div>
          <div class="form-group col-md-2">
          <label>Год постройки</label>
          <input type="year" class="form-control" name="Year_of_construction" placeholder="0000" value="<?php echo($Year_of_construction) ?>">
          </div>
        </div>  
        <div class="form-row">
        <div class="form-group col-md-3">
          <label for="inputCity">Фото для обложки(url)</label>
          <input type="text" class="form-control" name="URL"  placeholder="url for image" value="<?php echo($URL) ?>">
          </div>
        
        <div class="form-group col-md-4">
          <label>Владелец</label>
          <select class="form-control" id="select-me" name="Id_owner" value="<?php echo($Id_owner) ?>">
            <?php 
              include "php/owner_cheak.php";
              while($object = mysqli_fetch_object($result_select)):?>
              <option value ="<?=$object->Id_owner?>">
              <?=$object->Id_owner?>. <?=$object->First_name?> <?=$object->Midle_name?> <?=$object->Second_name?> 
              </option>
            <?php endwhile;?>
          </select>
          </div>
          </div>
        <div class="form-row">
        <div class="form-group col-md-7">
        <label for="exampleFormControlTextarea1">Более подробная информация о недвижимости</label>
        <textarea class="form-control" rows="3" name="Commentary"><?php echo($Commentary) ?></textarea>
        </div>
        </div>
        
        <button type="submit" id="btn" class="btn btn-primary">Отправка</button>
      
      </form>
      <?php 
        if($result1){
          echo "<br><p><b>Данные успешно внесены в бд</b></p>"; 
        }
        if($result3 || $result4){
          echo "<br><p><b>Данные успешно отредактированы и занесены в бд</b></p>"; 
        }
      ?>   
    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script src="js/ajax/select.js"></script>
    <script src="js/ajax/foto_uploder.js"></script>   
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