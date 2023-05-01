<?php 
if (isset($_GET["id"])){
    $id =$_GET["id"];

    include 'connection.php';

    $sql = "DELETE FROM users WHERE id=$id";
    $conn->query($sql);
}

header("location: index.php");
exit;

?>