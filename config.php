<?php

$server = "localhost";
$username = "root";
$password = "292216";
$database = "fazer_app";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn){
    die("<script>Deu merda</script>");
}

?>