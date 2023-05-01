<?php
include 'connection.php';


$id = "";
$first_name = "";
$last_name = "";
$email = "";
$password = "";
$gender = "";

if( $_SERVER['REQUEST_METHOD'] == 'GET'){
    
    if(!isset($_GET["id"])){
        header("location: display.php");
        exit;
    }
    
    $id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location: display.php");
        exit;
    }

    $first_name = $row["fname"];
    $last_name =  $row["lname"];
    $email = $row["email"];
    $password = $row["password"];
    $gender = $row["gender"];
}
else{
    $id = $_POST["id"];
    $first_name = $_POST["firstname"];
    $last_name =  $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];

    do{
        $sql = "UPDATE users " . 
        "SET fname = '$first_name',lname = '$last_name', email ='$email', password = '$password', gender = '$gender' " . 
        "WHERE id = $id";

        $result = $conn->query($sql);

        if($result == true) {
            echo 'New record created successfully.';
    
            header("location: display.php");
            exit;
        
        }else{
            echo 'Error'.$sql.'<br>'.$conn->error;        
        }
        $conn->close();  
        
    }while(true);

    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

</head>

<body>

    <h2>Signup Form</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <fieldset class="form">
            <legend>Personal Information</legend>
            Firstname: <br>
            <input type="text" name="firstname" value="<?php echo $first_name;?>">
            <br>
            Lastname: <br>
            <input type=" text" name="lastname" value="<?php echo $last_name;?>">
            <br>

            Passsword: <br>
            <input type="text" name="password" value="<?php echo $password;?>">
            <br>
            Email: <br>
            <input type="email" name="email" value="<?php echo $email;?>">
            <br>
            Gender:<br>
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female
            <br><br>

            <input type="submit" name="submit" value="submit">
        </fieldset>

    </form>


</body>

</html>