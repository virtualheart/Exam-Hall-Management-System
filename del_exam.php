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
        
$sql = "DELETE FROM `exam` WHERE id='".$_GET["id"]."'";
$sql1 = "UPDATE tbl_subject set status=0 WHERE paper_code='".$_GET["pcode"]."'";

if ($conn->query($sql) === TRUE) {
    if($conn->query($sql1)===TRUE){
        $_SESSION['success']=' Record Successfully Deleted';
    }
} 

?>
<script>

window.location = "view_exam.php";
</script>

