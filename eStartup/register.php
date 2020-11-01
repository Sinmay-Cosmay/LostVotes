<?php

session_start();

global $username,$email,$phone,$dob,$aadhaar,$photo,$sign;


$db=mysqli_connect('localhost','root','','voting_db');
if(isset($_POST['submit']))
{
  $username = mysqli_real_escape_string($db,$_POST['username']);
  $email = mysqli_real_escape_string($db,$_POST['email']);
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $aadhaar = $_POST['aadhaar'];
  $photo = $_POST['photo'];
  $sign = $_POST['sign'];
  $duplicate = mysqli_query($db, "select * from regusers where email='$email' or aadhaar='$aadhaar' or contact='$phone' ");
  if(time()<strtotime('+18 years', strtotime($dob))){
    echo '<script>alert("You are under 18. You cannot vote !!!")</script>';
  }
  elseif (!preg_match("/^$|^[0-9]{10}$/",$phone)) {
    echo "<script>alert('Illegal contact number.')</script>";
  }
  elseif (!preg_match("/^$|^[0-9]{12}$/",$aadhaar)) {
    echo "<script>alert('AADHAAR NO. INVOLVES 12 DIGITS')</script>";
  }
  elseif (mysqli_num_rows($duplicate)>0){
    echo "<script>alert('You are already registered...')</script>";
  }
  else{
  $query = "INSERT INTO regusers (name, email, contact, DOB, aadhaar, photo, signature)
             VALUES('$username','$email','$phone','$dob','$aadhaar','$photo', '$sign')";
  mysqli_query($db, $query);
  $pwd=bin2hex(openssl_random_pseudo_bytes(4));
  $sql = "INSERT INTO users (name, username, password, type) VALUES('$username','$username','$pwd','2')";
  mysqli_query($db, $sql);

  $to=$email;
			$subject="Online Voting";
			$message="<h2>Hello $username </h2><p>Thank you so much for registering !!!</br> Your vote is really important, choose wisely.</br><h2>Login Credentials</h2> Username- $username </br> Password- $pwd</p></br><a href='http://localhost/phplessons/voteme/eStartup/login.php'>VOTE NOW</a> ";
			$headers="From: tanmay30111999@gmail.com \r\n";
			$headers.="MIME-Version: 1.0" . "\r\n";
			$headers.="Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to,$subject, $message, $headers);

echo "<script>alert('Registered Successfully. Check your registered email for logging in & cast your vote.')</script>";
}
}

?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
</head>
    <style>
    
        html {
  width: 100%;
  height: 100%;
}

body {

  color: rgba(0, 0, 0, 0.6);
  font-family: "Roboto", sans-serif;
  font-size: 14px;
  line-height: 1.6em;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  background-image:url("regbg.jpg");
  background-size:cover;
  background-attachment:fixed;
}

.overlay, .form-panel.one:before {
  position: absolute;
  top: 0;
  left: 0;
  display: none;
  background: rgba(0, 0, 0, 0.8);
  width: 100%;
  height: 100%;
}

.form {
  z-index: 15;
  position: relative;
  background:#fff;
  width: 600px;
  border-radius: 4px;
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
  box-sizing: border-box;
  margin: 100px auto 10px;
  overflow: hidden;
  
}
.form-toggle {
  z-index: 10;
  position: absolute;
  top: 60px;
  right: 60px;
  background:#FFFFFF;
  width: 60px;
  height: 60px;
  border-radius: 100%;
  -webkit-transform-origin: center;
          transform-origin: center;
  -webkit-transform: translate(0, -25%) scale(0);
          transform: translate(0, -25%) scale(0);
  opacity: 0;
  cursor: pointer;
  transition: all 0.3s ease;
  
}
.form-toggle:before, .form-toggle:after {
  content: '';
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 30px;
  height: 4px;
  background: #4285F4;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}
.form-toggle:before {
  -webkit-transform: translate(-50%, -50%) rotate(45deg);
          transform: translate(-50%, -50%) rotate(45deg);
}
.form-toggle:after {
  -webkit-transform: translate(-50%, -50%) rotate(-45deg);
          transform: translate(-50%, -50%) rotate(-45deg);
}
.form-toggle.visible {
  -webkit-transform: translate(0, -25%) scale(1);
          transform: translate(0, -25%) scale(1);
  opacity: 1;
}
.form-group {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 0 0 20px;
}
.form-group:last-child {
  margin: 0;
}
.form-group label {
  display: block;
  margin: 0 0 10px;
  color: rgba(0, 0, 0, 0.6);
  font-size: 12px;
  font-weight: 500;
  line-height: 1;
  text-transform: uppercase;
  letter-spacing: .2em;
}
.two .form-group label {
  color: #FFFFFF;
}
.form-group input {
  outline: none;
  display: block;
  background:rgba(0, 0, 0, 0.1);
  width: 100%;
  border: 0;
  border-radius: 4px;
  box-sizing: border-box;
  padding: 12px 20px;
  color: rgba(0, 0, 0, 0.6);
  font-family: inherit;
  font-size: inherit;
  font-weight: 500;
  line-height: inherit;
  transition: 0.3s ease;

}
.form-group input:focus {
  color: rgba(0, 0, 0, 0.8);
}
.two .form-group input {
  color: #FFFFFF;
}
.two .form-group input:focus {
  color: #FFFFFF;
}
.form-group button {
  outline: none;
  background: #4285F4;
  width: 100%;
  border: 0;
  border-radius: 4px;
  padding: 12px 20px;
  color: #FFFFFF;
  font-family: inherit;
  font-size: inherit;
  font-weight: 500;
  line-height: inherit;
  text-transform: uppercase;
  cursor: pointer;
}
.two .form-group button {
  background: #FFFFFF;
  color: #4285F4;
}
.form-group .form-remember {
  font-size: 12px;
  font-weight: 400;
  letter-spacing: 0;
  text-transform: none;
}
.form-group .form-remember input[type='checkbox'] {
  display: inline-block;
  width: auto;
  margin: 0 10px 0 0;
}
.form-group .form-recovery {
  color: #4285F4;
  font-size: 12px;
  text-decoration: none;
}
.form-panel {
  padding: 60px calc(5% + 60px) 60px 60px;
  box-sizing: border-box;
}
.form-panel.one:before {
  content: '';
  display: block;
  opacity: 0;
  visibility: hidden;
  transition: 0.3s ease;
}
.form-panel.one.hidden:before {
  display: block;
  opacity: 1;
  visibility: visible;
}
.form-panel.two {
  z-index: 5;
  position: absolute;
  top: 0;
  left: 95%;
  background: #4285F4;
  width: 100%;
  min-height: 100%;
  padding: 60px calc(10% + 60px) 60px 60px;
  transition: 0.3s ease;
  cursor: pointer;
}
.form-panel.two:after {
  left: 3%;
}
.form-panel.two:hover {
  left: 93%;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
.form-panel.two:hover:before, .form-panel.two:hover:after {
  opacity: 0;
}
.form-panel.two.active {
  left: 10%;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  cursor: default;
}
.form-panel.two.active:before, .form-panel.two.active:after {
  opacity: 0;
}
.form-header {
  margin: 0 0 40px;
}
.form-header h1 {
  padding: 4px 0;
  color: #4285F4;
  font-size: 24px;
  font-weight: 700;
  text-transform: uppercase;
}
.two .form-header h1 {
  position: relative;
  z-index: 40;
  color: #FFFFFF;
}

.pen-footer {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  width: 600px;
  margin: 20px auto 100px;
}
.pen-footer a {
  color: #FFFFFF;
  font-size: 12px;
  text-decoration: none;
  text-shadow: 1px 2px 0 rgba(0, 0, 0, 0.1);
}
.pen-footer a .material-icons {
  width: 12px;
  margin: 0 5px;
  vertical-align: middle;
  font-size: 12px;
}

.cp-fab {
  background: #FFFFFF !important;
  color: #4285F4 !important;
}

    </style>

<body>
    <div class="form">

  <div class="form-panel one">
    <div class="form-header">
      <h1>Register to vote</h1>
      
    </div>
    <div class="form-content">
      <form method="post" action="register.php">
        <div class="form-group">
          
          <label for="username">Name</label>
          <input type="text" id="username" name="username" placeholder="Name" required="required"/>
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" placeholder="xyz@gmail.com" required="required"/>
        </div>
        <div class="form-group">
          <label for="phone">Contact Number</label>
          <input type="tel" id="phone" name="phone" placeholder="Number" required="required"/>
        </div>
        <div class="form-group">
          <label for="dob">DOB</label>
          <input type="date" id="dob" name="dob"  required="required"/>
        </div>
        <div class="form-group">
          <label for="aadhaar">AADHAAR NUMBER</label>
          <input type="number" id="aadhaar" name="aadhaar" placeholder="12 digit UID" required="required"/>
        </div>
        <div class="form-group">
          <label for="photo">Upload Photo</label>
          <input type="file" id="photo" name="photo" required="required"/>
        </div>
        <div class="form-group">
          <label for="sign">Upload Signature</label>
          <input type="file" id="sign" name="sign" required="required"/>
        </div>
       
        <div class="form-group">
          <button type="submit" name="submit" value="submit">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>


    
</body>
</html>