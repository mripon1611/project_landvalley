<?php
   include("indexDB.php");
   session_start();
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    $username='';$password='';$b=true;
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['username']))
				$username=test_input($_POST['username']);
				else $b=false;
        if(isset($_POST['password']))
				$password=test_input($_POST['password']);
				else $b=false;
        if(isset($_POST['type']))
						$type=test_input($_POST['type']);
						else $b=false;
				$tablename='';$id='';
				if(empty($_POST['username']))
				$b=false;
				if($b==false)
				{
					header('Location: loginuser.php');
				}
        if($type=='normal')
        {
            $id='uid';
            $tablename='login';
        }
        else if($type=='builder')
        {
            $id='bid';
            $tablename='login_builder';
        }
        $q="select $id,password from $tablename where username='$username'";
        echo $q;
        $result=$conn->query($q);
        if($result==true)
        {
            $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
        }
        else
        {
					header('Location: loginuser.php');
        }
        if($row['password']==$password)
        {
            $_SESSION['username']=$username;
            $_SESSION['type']=$type;
            if($id=='uid' && $b==true)
            {
                $_SESSION['id']=$row['uid'];
               header('Location: normalHomeSale.php');
            }
            if($id=='bid' && $b==true)
            {
                $_SESSION['id']=$row['bid'];
                header('Location: builderHome.php');
            }
        }
        else
        {
            echo "Invalid Password!!!!";
            header('Location: loginuser.php');
        }
    }
?>