<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

?>

        <div class="page-wrapper">
           
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Allotment Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Allotment Management</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" action="pages/allot.php" name="userform" enctype="multipart/form-data">
            <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Class</label>
                        <div class="col-sm-9">
                            <select type="text" name="class_id" id="class_id" class="form-control"   placeholder="Class" required="">
                                <option value="">--Select Class--</option>
                                    <?php  
                                    $c1 = "SELECT * FROM `tbl_class`";
                                    $result = $conn->query($c1);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $s1 = "SELECT count(*) as qty FROM `tbl_student` WHERE classname='".$row["id"]."'";
                                        $sr = $conn->query($s1);
                                        if ($sr->num_rows > 0) {
                                            $sres = mysqli_fetch_array($sr);
                                            $qty=$sres['qty'];
                                        }
                                        else
                                        {
                                            $qty=0;
                                        }
                                     ?>
                                            <option value="<?php echo $row["id"];?>" data-capacity="<?php echo $qty; ?>">
                                                <?php echo $row['classname'];?>
                                            </option>
                                            <?php
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Exam</label>
                        <div class="col-sm-9">
                            <select type="text" name="exam_id" id="exam_id" class="form-control"   placeholder="Exam" required="">
                                <option value="">--Select Exam--</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Building</label>
                        <div class="col-sm-9">
                            <select type="text" name="room_type_id" id="room_type_id" class="form-control" placeholder="Room" required="" onselect="call_models(this)">
                                <option value="">--Select Building--</option>
                                    <?php  
                                    $c1 = "SELECT * FROM `room_type`";
                                    $result = $conn->query($c1);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $s1 = "SELECT SUM(strenght) as qty FROM `room` WHERE type_id='".$row["id"]."'";
                                        $sr = $conn->query($s1);
                                        if ($sr->num_rows > 0) {
                                            $sres = mysqli_fetch_array($sr);
                                            $qty=$sres['qty'];
                                        }
                                        else
                                        {
                                            $qty=0;
                                        }
                                     ?>

                                    <option value="<?php echo $row["id"];?>" data-capacity="<?php echo $qty; ?>">
                                                <?php echo $row['roomname'];?>
                                    </option>
                                            <?php
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Room</label>
                        <div class="col-sm-9">
                            <select type="text" name="room_id" id="room_id" class="form-control"   placeholder="Exam" required="" >
                                <option value="">--Select Room--</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Start - End Range</label>
                        <div class="col-sm-4">
                            <select type="text" name="start_ran" id="start_ran" class="form-control"   placeholder="Exam" required="" >
                                <option value="">--Start Range--</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                             <select type="text" name="end_ran" id="end_ran" class="form-control"   placeholder="Exam" required="" >
                                <option value="">--End Range--</option>
                            </select>
                        </div>
                    </div>
                </div>


                                          

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Class Capacity</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="class_capacity" id="class_capacity" class="form-control" placeholder="Class Capacity" readonly>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Buliding Capacity</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="room_capacity" id="buliding_capacity" class="form-control" placeholder="Buliding Capacity" readonly>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Room Capacity</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="room_capacity" id="room_capacity" class="form-control" placeholder="Room Capacity" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
        
<?php include('footer.php');?>

<script type="text/javascript">
    //class cap
 $('#class_id').change(function(){
    var class_capacity=$('#class_id').find(':selected').attr('data-capacity');
    $('#class_capacity').val(class_capacity);



  });
</script>

<script type="text/javascript">
    // room cap
 $('#room_id').change(function(){
    var room_capacity=$('#room_id').find(':selected').attr('data-capacity');
    $('#room_capacity').val(room_capacity);
 
  });
</script>

<script type="text/javascript">
//build cap
 $('#room_type_id').change(function(){
    var room_capacity=$('#room_id').find(':selected').attr('data-capacity');
    $('#room_capacity').val("");
    var build_capacity=$('#room_type_id').find(':selected').attr('data-capacity');
    $('#buliding_capacity').val(build_capacity);
        var room_id = $(this).val();
        if(room_id){
            $.ajax({
                type:'POST',
                url:'ajax/fetch_exam.php',
                data:'room_id='+room_id,
                success:function(html){
                    $('#room_id').html(html);
                   
                }
            }); 
        }else{
            $('#room_id').html('<option value="">-- Select Building-- </option>');
            
        }
    
  });

  $('#btn_save').click(function(){
    var room_capacity=$('#room_capacity').val();
    // var class_capacity=$('#class_capacity').val();

    var end=$('#end_ran').val();
    var start=$('#start_ran').val();

    var class_capacity = end - start + 1;
    
    if(parseInt(class_capacity) > parseInt(room_capacity))
    {
        alert('Students quantity are greater than available room');
        return false;
    }
    else
    {
        return true;
    }
  });

$(document).ready(function(){

    $('#class_id').on('change',function(){
        var class_id = $(this).val();
        if(class_id){
            $.ajax({
                type:'POST',
                url:'ajax/fetch_exam.php',
                data:'exam_id='+class_id,
                success:function(html){
                    $('#exam_id').html(html);
                   
                }
            });
        if (class_id) {
             $.ajax({
                type:'POST',
                url:'ajax/fetch_exam.php',
                data:'Students='+class_id,
                success:function(html){
                    $('#start_ran').html(html);
                    $('#end_ran').html(html);
                   
                }
            });
        } 
        }else{
            $('#exam_id').html('<option value="">-- Select Exam-- </option>');
            
        }
    });
    
});



</script>