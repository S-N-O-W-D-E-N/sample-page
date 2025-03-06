<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>CRUD</h1>
        <h2>Create, Read, Update, Delete</h2>
    <?php
    include 'connection.php';
    $u_id=$_GET["id"]; 
    $sql = "SELECT firstname, lastname FROM tbl_users where id=$u_id;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
      
    ?>

    <form method="post">
            <input type="hidden" name="id" value="<?php echo $u_id;?>" >
            <input type="text" name="fname" value="<?php echo $row['firstname']?>" required><br>
            <input type="text" name="lname" value="<?php echo $row['lastname']?>" required><br>
            <input type="submit" name="update" value="Update">
        </form>
        <?php
          }
        }
        if(isset($_POST['update'])){
            $u_fname = $_POST['fname'];
            $u_lname = $_POST['lname'];
            $u_id1 = $_POST['id'];
            $sql = "UPDATE tbl_users SET firstname='$u_fname', lastname='$u_lname' WHERE id='$u_id1'";
            if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                window.alert("Update Successfully!");
                window.location.href="index.php";
            </script>
            <?php
                }
            }
        ?>
    </center>
</body>
</html>