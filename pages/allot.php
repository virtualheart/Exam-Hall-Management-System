<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
extract($_POST);
   $sql = "INSERT INTO `allot` (`exam_id`,`room_type_id`,`class_id`) VALUES ('$exam_id','$room_type_id','$class_id')";
    // echo $sql;

 if ($conn->query($sql) === TRUE) {
 	 $last_id = $conn->insert_id;
 	 $s1 = "SELECT * FROM `exam` WHERE id='".$exam_id."'";
     // echo $s1;
 	 $sr = $conn->query($s1);
     $sres = mysqli_fetch_array($sr);

     $s2 = "SELECT * FROM `room` WHERE type_id='".$room_type_id."'";
 	 $sr2 = $conn->query($s2);

while ($row = mysqli_fetch_array($sr2)) {

     $s3 = "SELECT * FROM `tbl_student` WHERE class_id ='".$class_id."' limit ".$start_ran.",".$end_ran+1;
     // echo $s3;
 	 $sr3 = $conn->query($s3);
 	 $i=1;
    while ($student = mysqli_fetch_array($sr3)) {
    	if($i<=$row['strenght'])
    	{
    		$s4 = "SELECT * FROM `allot_student` WHERE exam_id='".$exam_id."' and student_id='".$student['id']."'";
	        $sr4 = $conn->query($s4);
	        if ($sr4->num_rows==0) {
	        	$sql = "INSERT INTO `allot_student`(`allot_id`,`exam_id`, `start_time`, `end_time`, `room_id`, `student_id`, `stud_id`) VALUES('$last_id','$exam_id','".$sres['start_time']."','".$sres['end_time']."','".$row['id']."','".$student['id']."','".$student['stud_id']."')";
                // echo $sql;
 				$conn->query($sql);

	        }
    	}
    	$i++;

        // $s4="UPDATE room set alacated=". $i ." WHERE id='".$row['id']."'";
        // $sr4 = $conn->query($s4);


	}


}
      $_SESSION['success']=' Record Successfully Added';
     ?>

<script type="text/javascript">
window.location="../view_allotment.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_allotment.php";
</script>
<?php } ?>
