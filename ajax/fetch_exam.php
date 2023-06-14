<?php

include '../connect.php';


// exam paper

if(!empty($_POST["exam_id"])){

$sql="select * from exam e join tbl_subject su on e.p_id=su.id join tbl_subasign sa on sa.p_id=e.p_id where cls_id='".$_POST['exam_id']."'";

$res=mysqli_query($conn,$sql);
$rowCount = mysqli_num_rows($res);

if($rowCount > 0){
		echo '<option value="">--Select Exam--</option>';
        while($row =mysqli_fetch_array($res)){ 
		
            echo '<option value="'.$row['id'].'">'.$row['paper_code']." ".$row['subjectname'].'</option>';
            $i++;
        }
    }
    else{
        echo '<option value="">Exam NOT AVAILABLE</option>';
    }
}


//range 

if(!empty($_POST["Students"])){

    $sql1="select * from tbl_student where class_id='".$_POST['Students']."'";

$res=mysqli_query($conn,$sql1);
$rowCount = mysqli_num_rows($res);

if($rowCount > 0){

        echo '<option value="">--Select Range--</option>';

        $i=0;
        while($row =mysqli_fetch_array($res)){ 
        
            echo '<option value="'.$i.'">'.$row['stud_id'].'</option>';
            $i++;
        }
    }
    else{
        echo '<option value="">Students NOT AVAILABLE</option>';
    }
}

//room 

if(!empty($_POST["room_id"])){

$sql="SELECT * FROM room WHERE type_id = '".$_POST['room_id']."'";

$res=mysqli_query($conn,$sql);
$rowCount = mysqli_num_rows($res);

if($rowCount > 0){
		echo '<option value="">--Select Room--</option>';
        while($row =mysqli_fetch_array($res)){ 
		
            echo '<option value="'.$row['id'].'" data-capacity="'.$row['strenght'].'">'.$row['name'].'</option>';
        }
    }
    else{
        echo '<option value="">Rooms NOT AVAILABLE</option>';
    }
}
?>