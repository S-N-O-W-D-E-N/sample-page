<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <h1>CRUD FINAL</h1>
    <h2>Create, Read, Update, Delete</h2>
        <form method="post">
            <input type="text" name="fname" placeholder="Enter Firstname" required><br>
            <input type="text" name="lname" placeholder="Enter Lastname" required><br>
            <input type="submit" name="save" value="save">
        </form>
        <?php
            include 'connection.php';
            if(isset($_POST['save'])){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $sql = "INSERT INTO tbl_users (firstname, lastname)
                VALUES ('$fname','$lname')";

                if ($conn->query($sql) === TRUE) {
                echo "
                    <script>
                        window.alert('Recorded Successfully!');
                        window.location.href='index.php';
                    </script>
                ";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        ?>
      <br>
      <style>
        table,th,tr,td{
            width: 60%;
            border:1px solid black;
            border-collapse:collapse;
        }
      </style>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = "SELECT id, firstname, lastname FROM tbl_users;";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
            ?>
            <tr>     
                <td><?php echo $row['firstname'];?></td>
                <td><?php echo $row['lastname'];?></td>
                <td><a href="update.php?id=<?php echo $row['id'];?>">Edit</a>|<a href="delete.php?del_id=<?php echo $row['id'];?>">Delete</a></td>
            </tr>
            <?php
              }
            }
            ?>
        </table>
    </center>
</body>
</html>