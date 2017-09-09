<?php

session_start();

error_reporting(E_ALL ^ E_DEPRECATED);


$database="exalt";
$con = mysqli_connect("localhost","root" ,"",$database);
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysqli_select_db($con,"$database");


$table = 'student_data';



//$getdata = "SELECT * FROM $table where ";
//$gotdata = mysql_query($getdata);



?>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.common.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.css" />
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    <!--[if lt IE 9]>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="height:80px">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>
          <a class="navbar-brand" href="#">
            <img alt="Brand" src="Sortinghat.png" width="50px" height="50px"/>
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <li><a href="#" style=" line-height: 50px;">Home</a></li>
          <li><a href="#" style=" line-height: 50px;">Gallery</a></li>
          <li><a href="#" style=" line-height: 50px;">About Us</a></li>
          <li><a href="#" style=" line-height: 50px;">Registrations</a></li>
          <li><a href="#" style=" line-height: 50px;">Events</a></li>
        </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="img/wallpaper.png" alt="Los Angeles">
        </div>

        <div class="item">
          <img src="img/wallpaper.png" alt="Chicago">
        </div>

        <div class="item">
          <img src="img/wallpaper.png" alt="New York">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="row">
    <div class="col-sm-6" style="padding:50px;">
      <div class="hatcontainer" style="margin:50px;">
        <img src="img/SortingHat.png" height="500px" width="500px">
      </div>
    </div>
    <div class="col-sm-6" style="padding:100px;">
      <center> <h2>Enter your moodle ID here to know which house you belong to !!! </h2> <br>
      <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">

          <div class="col-sm-10" style="width:100%;">
            <input type="text" class="form-control input input-primary input-lg outline" id="moodleid" name="moodleid" placeholder="Enter Moodle ID">
          </div>
        </div>


        <div class="form-group">
          <div class="col-sm-10" style="width:100%;">
            <button type="submit" class="btn btn-primary btn-lg outline" style="width:100%;">Submit</button>
          </div>
        </div>
      </form>

      <?php
      if(isset($_POST['moodleid']))

      {

          $MoodleID = $_POST['moodleid'];

          $getpost = "SELECT * FROM $table where StudentID ='" .$MoodleID. "'";
          $gotpost = mysqli_query($con,$getpost);
          $gotpost = mysqli_fetch_assoc( $gotpost );
          $Fullname=$gotpost['FirstName'];
          $House=$gotpost['Group'];

          if ($Fullname==NULL) {

                      
          		echo "<script type='text/javascript'>\n";
          		echo "alert('This Moodle ID does not exist');\n";
          		echo "</script>";
          		echo '<script>window.location="index.php"</script>';
          		}

              echo '<br><div> <h2>Congratulations '.$Fullname.' <br> you belong to the '.$House.' House</h2> </div>';

      }
      ?>
      </center>
    </div>
  </div>


    <div class="container">
      <!-- Example row of columns -->


      <hr>

      <footer>
        <p></p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
    </body>
</html>
