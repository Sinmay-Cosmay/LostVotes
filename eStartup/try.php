<?php


if(isset($_POST["submit"])){
    echo "b";
    $no=$_POST['aadhaar'];
    if(!preg_match("/^$|^[0-9]{12}$/",$no)){
        echo "<script>alert('AADHAAR NO. INVOLVES 12 DIGITS')</script>";
    }
}

?>

<form method="post" action="try.php">
AADHAAR CARD NUMBER
<input type="text" name="aadhaar">
<button name="submit">Submit</button>
</form>