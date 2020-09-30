<?php
$host     = "localhost";
$user     = "id14834087_root";
$password = "Hibakoubi.11";
$database = "id14834087_mycv";
$return = $_POST["return"];
$name = $_POST["name"];
$psw = $_POST["psw"];



if(empty($_POST["email"])){
    $request = "select * from users where username = '".$name."' and password = '".$psw."' LIMIT 1";
}else{
    $email = $_POST["email"];
    $request = "INSERT INTO users (username, email, password) VALUES ('".$name."', '".$email."', '".$psw."'); ";
}

$connect = mysqli_connect($host,$user,$password,$database);
mysqli_query($connect,"set character_set_server='utf8'");
mysqli_query($connect,"set names 'utf8'");

if($connect) {

    $result = mysqli_query($connect, $request);

   if ($return == "1"){
           //You need to redirect
           header("Location: log_in.php"); /* Redirect browser */
           
       }
    else if ($return == "0") {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            session_start();

            $_SESSION['username'] = $row["username"];
            $_SESSION['ID'] = $row["ID"];

            header("Location:comment.php"); /* Redirect browser */
            
        } else {
            header("Location:Sign_in.php"); /* Redirect browser */
            
        }
    }
}
else{
    echo ($connect);
}
?>


