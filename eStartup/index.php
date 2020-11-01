<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>E-Voting</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/modal-video/css/modal-video.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
<style>
#pop-proc{
  display:none;
  position:fixed;
  z-index:10;
  left:0;
  top:0;
  width:100%;
  height:100%;
  overflow:auto;
  background:color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
}
.modal-content{
  background-color:#fefefe;
  margin:auto;
  padding:20px;
  border:1px solid #888;
  width:80%;
}
.close{
  color:#aaaaaa;
  float:right;
  font-weight:bold;
  font-size:28px;
}
.close:hover,
.close:focus{
  color:#000;
  text-decoration:none;
  cursor:pointer;
}
</style>
  
</head>

<body>

  <header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#body" class="scrollto"><span>e</span>Voting</a></h1>
        
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          
          
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="hero" class="wow fadeIn">
    <div class="hero-container">
      <h1>Welcome to eVoting App</h1>
      <h2>Voting... Our Right, Our Responsibility !!!</h2>
      <img src="vote (1).jpg" alt="Hero Imgs">
      <button class="btn-get-started scrollto" id="mybtn" style="cursor:pointer">VOTE NOW</button>
      
    </div>
  </section><!-- #hero -->

  
  <div id="pop-proc">
  <div class="modal-content">
  <span class="close"><img src="https://openclipart.org/image/2400px/svg_to_png/183568/close-button.png" height="50px" width="50px"></span>
  <h1 align="center">VOTING PROCEDURE</h1></br>
  <ol>
  <li>A citizen must firstly register on the link given below.</li>
  <li>Fill in all the particulars- Name, Email, Phone Number, DOB, AADHAAR number, your photo & signature.</li>
  <li>After registering, if the application is successfully submitted, you will get an username & password on your registered mail.</li>
  <li>The mail also consists of a link to login & vote</li>
  <li>Each registered mail i.e. a citizen can cast a single vote only.</li>
  <li>Once submitting the vote it cannot be recasted. Hence, choose your vote wisely.</li>
  <li>Any unfair means may result into a legal action against that particular citizen.</li>
  </ol>
  <label for="read">
  <input type="checkbox" name="read" value="read" id="read" required>  &nbsp; I have well read all the instructions.
  </label>
  <button class="btn-get-started scrollto" style="background:#000000"><a href="register.php" style="text-decoration:none;font-size:20px;font-weight:700">Proceed</a></button>
  </div>
  </div>

  <script>
  var modal= document.getElementById("pop-proc");
  var btn= document.getElementById("mybtn");
  var span= document.getElementsByClassName("close")[0];
  btn.onclick = function(){
    modal.style.display = "block";
  }
  span.onclick = function(){
    modal.style.display = "none";
  }
  window.onclick = function(event){
  if(event.target == modal){
    modal.style.display = "none";
  }
  }
  </script>
  


  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/modal-video/js/modal-video.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
