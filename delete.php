<?php
include 'connection.php';
$u_id = $_GET['del_id'];
$sql = "DELETE FROM tbl_users WHERE id=$u_id";
if (mysqli_query($conn, $sql)) {
  echo "<script>
                window.alert('Deleted Successfully!');
                window.location.href='index.php';
        </script>";
}

?>