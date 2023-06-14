<?php include('head.php');?>
<?php include('header.php');?>

<?php include('sidebar.php');?>   
   
        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Classwise Subject</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Classwise Subject</li>
                    </ol>
                </div>
            </div>
           
            <div class="container-fluid">
               
             <div class="col-lg-8" style="margin-left: 10%;">
                <div class="card">
                                    <form action="" method="POST">
                                         <div class="form-group">
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
                              <?php if(isset($useroles)){  if(in_array("add_subject",$useroles)){ ?> 
                            <a href="add_sub_asign.php"><button class="btn btn-primary">Asign Subjects</button></a>
                          <?php } } ?>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Paper code</th>
                                                <th>Subject Name</th>
                                                <th>class Name</th>
                                                <th>Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php 

                                    if (isset($_POST['class_id'])) {

                                    include 'connect.php';
                                    
                                  $sql1 = "SELECT *,sa.id as sid  FROM tbl_subasign sa join tbl_class cl on sa.cls_id=cl.id join tbl_subject sub on sub.id=sa.p_id where cls_id='".$_POST['class_id']."'";
                                   $result1 = $conn->query($sql1);
                                   while($row = $result1->fetch_assoc()) { 
                                
                                 
                                      ?>
                                            <tr>
                                                <td><?php echo $row['paper_code']; ?></td>
                                                <td><?php echo $row['subjectname']; ?></td>
                                                <td><?php echo $row['classname']; ?></td>

                                                
                                                <td>
            <?php if(isset($useroles)){  if(in_array("edit_subject",$useroles)){ ?> 
                                                <a href="edit_sub_asign.php?id=<?=$row['sid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-plus-square"></i></button></a>
                                              <?php } } ?>

            <?php if(isset($useroles)){  if(in_array("delete_subject",$useroles)){ ?> 
                                                <a href="view_sub_asign.php?id=<?=$row['sid'];?>"><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button></a>
                                              <?php } } ?>
                                               
                                                </td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
            <?php } ?>
                    
                </div>

        </div>
           
            <?php include('footer.php');?>

<script type="text/javascript">
    
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