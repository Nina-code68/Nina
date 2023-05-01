<?php
include 'connection.php';

$first_name = "";
$last_name = "";
$email = "";
$password = "";
$gender = "";

if(isset($_POST['submit'])){
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = Md5($password);
    $gender = $_POST['gender'];

    $sql = "INSERT INTO users(fname,lname,email,password,gender) values('$first_name','$last_name','$email','$password','$gender')";
    $result = $conn->query($sql);

    
    if($result == true) {
        echo 'New record created successfully.';

        header("location: display.php");
        exit;
    
    }else{
        echo 'Error'.$sql.'<br>'.$conn->error;        
    }
    $conn->close();  
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
    <form action="create.php" method="POST">

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