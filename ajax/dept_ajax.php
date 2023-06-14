<?php

include '../connect.php';

if(!empty($_POST["dept_id"])){

$sql="select * from tbl_class where dept_id=".$_POST['dept_id'];
// echo $sql;
$res=mysqli_query($conn,$sql);
$rowCount = mysqli_num_rows($res);

if($rowCount > 0){
		echo '<option value="">--Select Department--</option>';
        while($row =mysqli_fetch_array($res)){ 
		 
            echo '<option value="'.$row['id'].'">'.$row['classname'].'</option>';
        }
    }
    else{
        echo '<option value="">Class Not Available</option>';
    }
}

?>