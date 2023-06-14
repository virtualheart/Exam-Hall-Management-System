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

$sql = "DELETE FROM `tbl_department` WHERE dept_id='".$_GET["id"]."'";
$res = $conn->query($sql) ;
 $_SESSION['success']=' Record Successfully Deleted';
?>
<script>

window.location = "view_dept.php";
</script>

