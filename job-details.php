<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>wizhart.com | Creative Media</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <?php
      include_once("includes/header.php")
    ?>
    <?php
      $id = null;

      if (!empty($_GET)) {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
        }
      }else{
        header("Location: jobs.php");
      }

      $resultData = $db->getBy("services", "id", $id);
      $servicesData = null;
      if ($resultData->num_rows) {
        $servicesData = $resultData->fetch_assoc();
      }else{
        header("Location: blog.php");
      }
    ?>

    <!-- Page Content -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><?= $servicesData['title'] ?></h1>

            <span><?= $servicesData['content_short'] ?></span>
          </div>
        </div>
      </div>
    </div>

    <div class="services">
      <div class="container">

        <!-- Banner Starts Here -->
        <div class="main-banner header-text" id="top">
            <div class="Modern-Slider">
              <!-- Item -->
              <?php if(!empty($servicesData['images'])){ ?>
              <div class="item" style="background-image: url('assets/images/services/<?= $servicesData['images'] ?>');">
                <div class="img-fill"></div>
              </div>
              <?php } ?>
              <?php if(!empty($servicesData['images2'])){ ?>
              <div class="item" style="background-image: url('assets/images/services/<?= $servicesData['images2'] ?>');">
                <div class="img-fill"></div>
              </div>
              <?php } ?>
              <?php if(!empty($servicesData['images3'])){ ?>
              <div class="item" style="background-image: url('assets/images/services/<?= $servicesData['images3'] ?>');">
                <div class="img-fill"></div>
              </div>
              <?php } ?>
              <?php if(!empty($servicesData['images4'])){ ?>
              <div class="item" style="background-image: url('assets/images/services/<?= $servicesData['images4'] ?>');">
                <div class="img-fill"></div>
              </div>
              <?php } ?>
              <?php if(!empty($servicesData['images5'])){ ?>
              <div class="item" style="background-image: url('assets/images/services/<?= $servicesData['images5'] ?>');">
                <div class="img-fill"></div>
              </div>
              <?php } ?>
              <?php if(!empty($servicesData['images6'])){ ?>
              <div class="item" style="background-image: url('assets/images/services/<?= $servicesData['images6'] ?>');">
                <div class="img-fill"></div>
              </div>
              <?php } ?>
            </div>
        </div>
        <!-- Banner Ends Here -->


        <br>
        <?= $servicesData['content'] ?>
        <br>
        <br>
        <br>
        <br>
      </div>
    </div>

    <!-- Footer Starts Here -->
    <?php
      include_once("includes/footer.php")
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>