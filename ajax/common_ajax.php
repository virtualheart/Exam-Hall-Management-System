<?php

include '../connect.php';

if(!empty($_POST["p_id"])){

$sql="select * from tbl_subject where id not in (select p_id from tbl_subasign where cls_id=".$_POST['p_id'].")";
//$sql="select * from tbl_subject"; // -- - where p_id=".$_POST['p_id'].")";

$res=mysqli_query($conn,$sql);
$rowCount = mysqli_num_rows($res);

if($rowCount > 0){
		echo '<option value="">--Select Subject--</option>';
        while($row =mysqli_fetch_array($res)){ 
		 
            echo '<option value="'.$row['id'].'">'.$row['subjectname']." - ".$row['paper_code']. '</option>';
        }
    }
    else{
        echo '<option value="">Subject Not Available</option>';
    }
}

?>