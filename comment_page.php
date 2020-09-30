<?php
$host     = "localhost";
$user     = "id14834087_root";
$password = "Hibakoubi.11";
$database = "id14834087_mycv";
session_start();

$name = $_SESSION['username'];
$id = $_SESSION['ID'];


$comment = $_POST["comment"];


$connect = mysqli_connect($host,$user,$password,$database);
mysqli_query($connect,"set character_set_server='utf8'");
mysqli_query($connect,"set names 'utf8'");

$request = "INSERT INTO comments (id_name, name, cmnt) VALUES ( '".$id."', '".$name."','".$comment."')";

if($connect) {

    $result = mysqli_query($connect, $request);
    header("Location: comment.php"); /* Redirect browser */


}
