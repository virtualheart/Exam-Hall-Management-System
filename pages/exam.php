
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
extract($_POST);
   $sql = "INSERT INTO `exam` (`name`,`session`,`p_id` , `semester`, `exam_date`, `start_time`, `end_time`, `status`, `added_date`) VALUES ('$exam_name','$session_id','$p_id' ,'$sem_id','$exam_date','$start_time','$end_time',0,'".date('Y-m-d')."')";


    $sql1="update tbl_subject set status=1 where id='".$p_id."'";

 if ($conn->query($sql) === TRUE) {
    if ($conn->query($sql1) === TRUE) {
        
      $_SESSION['success']=' Record Successfully Added';
     ?>
        <script type="text/javascript">
            window.location="../view_exam.php";
        </script>
<?php
    }
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_exam.php";
</script>
<?php } ?>




