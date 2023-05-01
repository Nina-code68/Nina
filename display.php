<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <a class="btn btn-primary" href="create.php">Add User</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php';
                
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if (!$result){
                    die("Invalid query: " . $conn->error);
                }
                    
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[fname]</td>
                    <td>$row[lname]</td>
                    <td>$row[password]</td>
                    <td>$row[email]</td>
                    <td>$row[gender]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='update.php?id=$row[id]'>Update</a>
                        <a class='btn btn-primary btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                    ";
                }
                

                ?>

            </tbody>
        </table>
    </div>
</body>

</html>