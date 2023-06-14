
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
$passw = hash('sha256', $_POST['password']);
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$pass = hash('sha256', $salt . $passw);
extract($_POST);
   $sql = "INSERT INTO `tbl_student`(`stud_id`,`sfname`, `slname`, `dept_id`, `class_id`, `semail`,`password`, `sgender`, `sdob`, `scontact`, `saddress`, `sstatus`) VALUES ('$stud_id','$sfname', '$slname', '$dept_id','$class_id', '$semail','$pass', '$sgender', '$sdob', '$scontact', '$saddress',1)";

   // echo $sql;

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_student.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_student.php";
</script>
<?php } ?>