<?php

include("config.php");

    session_start();
   
if(isset($_POST['login'])) {
    $user = trim(mysqli_real_escape_string($conn, $_POST['username']));
    
    $pass = sha1(trim(mysqli_real_escape_string($conn, $_POST['password'])));

    $query_login = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user' AND password = '$pass'") or die (mysqli_error($conn));
    $result = mysqli_query($conn, "SELECT * FROM user");
    mysqli_fetch_array($result);

     if(mysqli_num_rows($query_login) > 0) {
       
         $_SESSION['user'] = $user;
       

         echo "<script>
         alert('Login Berhasil!!');
         window.location='".'index.php'."';
         </script>";

     } else {
        echo "<script>
        alert('Login Gagal! Cek username dan password anda!');
        window.location='".'login.php'."';
        </script>";
     }
} 

if(!empty($_SESSION["user"])) {
        echo "<script>
         alert('Anda tidak diizinkan!!');
         window.location='".'index.php'."';
         </script>";
}
?>

<html>
<head>
<title>Admin Login</title>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">

<h3 align="center">Enter Login </h3>
 Username:<br>
 <input type="text" name="username">
 <br>
 Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="login" value="Submit">
<input type="reset">
</form>
</body>
</html>