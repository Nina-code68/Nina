<?php 
$server='localhost';
$dbname='student_db';
$username='root';
$password='';
$conn = new mysqli($server,$username,$password,$dbname);

if(!$conn){
    echo 'Connection failed';
    
}else{
    echo 'Connection successful';
}


?>