<?php

include 'connect.php';

if ($_GET['cls_id']) {
        $sql="select * from tbl_class where id != (select p_id from tbl_subasign where p_id=".$_GET['cls_id'].")";
        // echo $sql."<br>";
     $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_array($result)) { 
                $main[] = array('id'=>$row['id'],'name'=>$row['classname']);
                  
                // echo $row['id']." - ".$row['classname']." "."<br>" ;
        }
                echo json_encode($main);
 }

}

?>