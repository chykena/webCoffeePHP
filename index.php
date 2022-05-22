<?php include "libs/config.php";?>

<?php 
    session_start();
    $sql = "SELECT * FROM `item` WHERE 1";
    $query = mysqli_query($conn, $sql);
    $query2 = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cafe House - Food and Drink Menu</title>

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
  <link href="libs/css/bootstrap.min.css" rel="stylesheet">
  <link href="libs/css/font-awesome.min.css" rel="stylesheet">
  <link href="libs/css/templatemo-style.css" rel="stylesheet">
  <link rel="shortcut icon" href="libs/img/favicon.ico" type="image/x-icon" />



  </head>
  <body>
    <!-- Preloader -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Preloader -->
    <div class="tm-top-header">
      <div class="container">
        <div class="row">
          <div class="tm-top-header-inner">
            <div class="tm-logo-container">
              <img src="libs/img/logo.png" alt="Logo" class="tm-site-logo">
              <h1 class="tm-site-name tm-handwriting-font">Cafe House</h1>
            </div>
            <div class="mobile-menu-icon">
              <i class="fa fa-bars"></i>
            </div>
            <nav class="tm-nav">
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#today_special">Today Special</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="<?php if(empty($_SESSION['user'])) {echo "account/login.php";} else {echo "account/logout.php";}?>" style="font-style:italic; text-transform: none;"> 
<?php
if(isset($_SESSION['user'])){
    echo "Hello ".$_SESSION['user'];
}else{
    echo 'Login';
} ?>
              </a></li>
              </ul>
            </nav>   
          </div>           
        </div>    
      </div>
    </div>
    <section class="tm-welcome-section">
      <div class="container tm-position-relative">
        <div class="tm-lights-container">
          <img src="libs/img/light.png" alt="Light" class="light light-1">
          <img src="libs/img/light.png" alt="Light" class="light light-2">
          <img src="libs/img/light.png" alt="Light" class="light light-3">  
        </div>        
        <div class="row tm-welcome-content">
          <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="libs/img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Our Menus&nbsp;&nbsp;<img src="libs/img/header-line.png" alt="Line" class="tm-header-line"></h2>
          <h2 class="gold-text tm-welcome-header-2">Cafe House</h2>
          <p class="gray-text tm-welcome-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi veritatis perspiciatis eaque corrupti excepturi consectetur temporibus tempore aut, nisi facilis ducimus nesciunt in doloribus inventore illum itaque magnam iste necessitatibus? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt, soluta culpa molestiae maiores maxime delectus quam similique, tempora veniam magnam dolorem. Ad nobis ducimus ullam at dolores dolorum nemo quia!</p>
          <a href="#main" class="tm-more-button tm-more-button-welcome">Read More</a>      
        </div>
        <img src="libs/img/table-set.png" alt="Table Set" class="tm-table-set img-responsive">  
      </div>      
    </section>
    <div class="tm-main-section light-gray-bg">
      <div class="container" id="main">
        <section class="tm-section row" id="today_special">
          <div class="col-lg-9 col-md-9 col-sm-8">
            <h2 class="tm-section-header gold-text tm-handwriting-font">Variety of Menus</h2>
            <h2>Cafe House</h2>
            <p class="tm-welcome-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquid cum dignissimos ab harum quaerat ullam ducimus sunt ad, obcaecati debitis enim nemo? Veniam dicta laborum assumenda, deleniti rem ex. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed reprehenderit consectetur hic doloribus voluptatem ducimus nobis. Nam doloremque temporibus, voluptates suscipit aliquid adipisci iste perspiciatis repellat voluptas atque quae voluptatem?</p>
            <a href="#" class="tm-more-button margin-top-30">Read More</a> 
          </div>
          <div class="col-lg-3 col-md-3 col-sm-4 tm-welcome-img-container">
            <div class="inline-block shadow-img">
              <img src="libs/img/1.jpg" alt="Image" class="img-circle img-thumbnail">  
            </div>              
          </div>            
        </section>          
        <section class="tm-section row" id="menu">
          <div class="col-lg-12 tm-section-header-container margin-bottom-30">
            <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="libs/img/logo.png" alt="Logo" class="tm-site-logo"> Our Menus</h2>
            <div class="tm-hr-container"><hr class="tm-hr"></div>
          </div>
          <div>
            <div class="col-lg-3 col-md-3">
              <div class="tm-position-relative margin-bottom-30">              
                <nav class="tm-side-menu">
                  <ul>
<?php while($row = mysqli_fetch_array($query)){ ?>
                    <li><a href="#id-<?php echo $row['name'];?>" class="active"> <?php echo $row['name'];?> </a></li>
<?php }?>
                  </ul>              
                </nav>    
                <img src="libs/img/vertical-menu-bg.png" alt="Menu bg" class="tm-side-menu-bg">
              </div>  
            </div>

            <div class="tm-menu-product-content col-lg-9 col-md-9"> <!-- menu content -->

<?php while($row2 = mysqli_fetch_array($query2)){ ?>
              <div class="tm-product" id="id-<?php echo $row2['name'];?>">
                <img src="<?php echo "libs/img/".$row2['image'];?>" alt="Product" style="width: 136px; height: 136px;">
                <div class="tm-product-text">
                  <h3 class="tm-product-title"><?php echo $row2['name'];?></h3>
                  <p style="font-style: italic;">Remaining: <?php echo $row2['amount'];?></p>
                  <p class="tm-product-description"><?php echo $row2['descript'];?></p>
                </div>
                <div class="tm-product-price">
                  <a href="#" class="tm-product-price-link tm-handwriting-font"><span class="tm-product-price-currency">$</span><?php echo $row2['price'];?></a>
                </div>
              </div>
<?php }?>
              
            </div>
          </div>          
        </section>
      </div>
    </div> 
    <footer id="contact">
      <div class="tm-black-bg">
        <div class="container">
          <div class="row margin-bottom-60">
            <nav class="col-lg-3 col-md-3 tm-footer-nav tm-footer-div">
              <h3 class="tm-footer-div-title">Main Menu</h3>
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Directory</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Our Services</a></li>
              </ul>
            </nav>
            <div class="col-lg-5 col-md-5 tm-footer-div">
              <h3 class="tm-footer-div-title">About Us</h3>
              <p class="margin-top-15">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti rem animi, molestiae non maxime eum, sit quas vitae reiciendis optio obcaecati, maiores perferendis autem cum fugit quibusdam iusto tempora est.</p>
              <p class="margin-top-15">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam voluptatem dolore, neque totam quaerat suscipit sapiente error sit voluptas in corporis a hic cum eos. Cumque molestias ipsum id modi!</p>
            </div>
            <div class="col-lg-4 col-md-4 tm-footer-div">
              <h3 class="tm-footer-div-title">Get Social</h3>
              <p>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante.</p>
              <div class="tm-social-icons-container">
                <!-- <a href="#" class="tm-social-icon"><i class="fa fa-facebook"></i></a>
                <a href="#" class="tm-social-icon"><i class="fa fa-twitter"></i></a>
                <a href="#" class="tm-social-icon"><i class="fa fa-linkedin"></i></a>
                <a href="#" class="tm-social-icon"><i class="fa fa-youtube"></i></a>
                <a href="#" class="tm-social-icon"><i class="fa fa-behance"></i></a> -->
              </div>
            </div>
          </div>          
        </div>  
      </div>      
      <div>
        <div class="container">
          <div class="row tm-copyright">
           <p class="col-lg-12 small copyright-text text-center">Copyright &copy; 2022</p>
         </div>  
       </div>
     </div>
   </footer> <!-- Footer content-->  
   <!-- JS -->
   <script type="text/javascript" src="libs/js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
   <script type="text/javascript" src="libs/js/templatemo-script.js"></script>      <!-- Templatemo Script -->

 </body>
 </html>