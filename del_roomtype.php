<?php
include 'connect.php';
session_start();

    if(!isset($_SESSION["email"])){
    ?>
    <script>
    window.location="login.php";
    </script>
    <?php
        } 

$sql = "DELETE FROM `room_type` WHERE id='".$_GET["id"]."'";
$res = $conn->query($sql) ;
 $_SESSION['success']=' Record Successfully Deleted';
?>
<script>

window.location = "view_roomtype.php";
</script>

