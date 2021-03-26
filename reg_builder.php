<?php 
session_start();
include('indexDB.php');
$username = $name = $surname = $email = $password = $cpassword = $phone = $lno ="";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$usernameErr = $nameErr = $surnameErr = $emailErr = $passwordErr = $cpasswordErr = $phoneErr = $lnoErr= "";
$b=true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameErr = "*Username is required";
        $b=false;
      } else {
        $username = test_input($_POST["username"]);
         if (!preg_match("/^[a-zA-Z0-9]*$/",$username) || $username=='') {
          $usernameErr = "*Only letters and numbers allowed";
          $b=false; 
        }
      }
  if (empty($_POST["name"])) {
    $nameErr = "*Name is required";
    $b=false;
  } else {
    $name = test_input($_POST["name"]);
     if (!preg_match("/^[a-zA-Z_ ]*$/",$name) || $name=='') {
      $nameErr = "*Only letters allowed ";
      $b=false; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "*Email is required";
    $b=false;
  } else {
    $email = test_input($_POST["email"]);
     if (!preg_match("/^[a-zA-Z0-9\.]*@[a-z\.]{1,}[a-z]*$/",$email) || $email=='') {
      $emailErr = "*Enter a Valid Email"; 
      $b=false;
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "*Password is required";
    $b=false;
  } else {
    $password = test_input($_POST["password"]);
     if (!preg_match("/^[a-zA-Z0-9]{10,}$/",$password) || $password=='') {
      $passwordErr = "*Enter minimum 10 characters ";
      $b=false;
    }
  }

  if (empty($_POST["confirm"])) {
    $cpasswordErr = "*Confirmation of Password is required";
    $b=false;
  } else {
    $cpassword = test_input($_POST["confirm"]);
    $password= test_input($_POST["password"]);
    if (strcmp($password,$cpassword)!=0) {
      $cpasswordErr = "*Password does not match ";
      $b=false;
    }
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "*Contact Number is required";
    $b=false;
  } else {
    $phone = test_input($_POST["phone"]);
    if(!preg_match("/^[0-9]{10,10}$/",$phone) || $phone==''){
    	$phoneErr = "*Enter A Valid Contact Number";
    	$b=false;
		}
	}
		if (empty($_POST["lno"])) {
			$lnoErr = "*License Number is required";
			$b=false;
		} else {
			$lno = test_input($_POST["phone"]);
			if(!preg_match("/^[0-9]{5,10}$/",$phone) || $phone==''){
				$lnoErr = "*Enter only digits";
				$b=false;
			}
  }
}
if($b==true && isset($_POST['submit']))
{
		$sql = "insert into login_builder(username,lno,password,emailid,phoneno,nameorg) values('$username', $lno,'$password','$email',$phone,'$name')";
		$res=$conn->query($sql);
		echo "insert done";
    $sql1="select bid from login_builder where username='$username'";
    $result=$conn->query($sql1);
    $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
    $_SESSION['username']=$username;
    $_SESSION['type']='builder';
		$_SESSION['id']=$row['bid'];
		header('Location: builderHome.php');
}
?>