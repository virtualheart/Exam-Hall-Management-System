
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');

if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sure
    </h1>
    <p>Are You Sure To Delete This Record?</p>
    <p>
      <a href="del_student.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
      <a href="view_student.php" class="button button--error" data-for="js_success-popup">No</a>
    </p>
  </div>
</div>
<?php } ?>

        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View Student</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Student</li>
                    </ol>
                </div>
            </div>
           
            <div class="container-fluid">
              
                           <div class="col-lg-8" style="margin-left: 10%;">
                              <div class="card">
                                 <div class="form-group">
                                  <form class="form-horizontal" method="POST" action="" name="userform" enctype="multipart/form-data">
                                      <div class="row">
                                                <label class="col-sm-3 control-label">Department Name</label>
                                                <div class="col-sm-9">
                                                    <select type="text" name="dept_id" id="dept_id" class="form-control"   placeholder="Class" required="">
                                                        <option value="">--Select Department--</option>
                                                            <?php  
                                                            $c1 = "SELECT * FROM `tbl_department`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["dept_id"];?>">
                                                                        <?php echo $row['dept_name'] ;?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Class Name</label>
                                                <div class="col-sm-9">
                                                    <select type="text" name="class_id" id="class_id" class="form-control"   placeholder="Class" required="" disabled>
                                                        <option value="">--Select class--</option>
                                                    </select>
                                                    <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Show</button>
                                                </div>
                                            </div>
                                        </div>
                                </form>

                                      </div>
                                    </div>



                 <div class="card">
                            <div class="card-body">
                              <?php if(isset($useroles)){ if(in_array("add_student",$useroles)){ ?> 
                            <a href="add_student.php"><button class="btn btn-primary">Add Student</button></a>
                          <?php } } ?>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Register Num</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Dept Name</th>
                                                <th>Class</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Birth Date</th>
                                                <th>Contact No.</th>
                                               <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php 
                                    include 'connect.php';

                                if (isset($_POST['dept_id']) && isset($_POST['class_id'])) {

                                    $sql = "SELECT * FROM `tbl_student` WHERE class_id=".$_POST['class_id'] ." and dept_id=".$_POST['dept_id'];
 
                                    $result = $conn->query($sql);
                                    $i=0;
                                   while($row = $result->fetch_assoc()) { 
                                    $sql2 = "SELECT  * FROM `tbl_class` c join `tbl_department` d on d.dept_id = c.dept_id where id='".$row['class_id']."'";
                                     $result2=$conn->query($sql2);
                                     $row2=$result2->fetch_assoc();
                                      ?>
                                            <tr>
                                                <td><?php echo $row['stud_id']; ?></td>
                                                <td><?php echo $row['sfname']; ?></td>
                                                <td><?php echo $row['slname']; ?></td>
                                                <td><?php echo $row2['dept_name']; ?></td>
                                                <td><?php echo $row2['classname']; ?></td>
                                                <td><?php echo $row['semail']; ?></td>
                                                <td><?php echo $row['sgender']; ?></td>
                                                <td><?php echo $row['sdob']; ?></td>
                                                <td><?php echo $row['scontact']; ?></td>
                                                <td><?php echo $row['saddress']; ?></td>
                                                
                                                <td>
            <?php if(isset($useroles)){  if(in_array("edit_student",$useroles)){ ?> 
                                                <a href="edit_student.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-plus-square"></i></button></a>
                                              <?php } } ?>

            <?php if(isset($useroles)){  if(in_array("delete_student",$useroles)){ ?> 
                                                <a href="view_student.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button></a>
                                              <?php } } ?>
                                               
                                                </td>
                                            </tr>
                                          <?php  $i++;} }
                                          ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
               
<?php include('footer.php');?>

<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);

$('#dept_id').change(function() {
        var dept_id = $(this).val();
        if(dept_id){
            $.ajax({
                type:'POST',
                url:'ajax/dept_ajax.php',
                data:'dept_id='+dept_id,
                success:function(html){
                    $('#class_id').html(html);
                    // alert(html)
                    $('#class_id').removeAttr( "disabled" );
                   
                }
            }); 
        }else{
            $('#class_id').html('<option value="">-- Select Class-- </option>');
            $('#paper_id').html('<option value="">-- Select Class-- </option>');
            $('#class_id').attr( "disabled" );
            $('#paper_id').attr( "disabled" );
        }
    });

    </script>