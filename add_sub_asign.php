<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $currnt_date = date('Y-m-d');

?>

        <div class="page-wrapper">
           
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Subject Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Subject Management</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" action="pages/save_sub_asign.php" name="userform" enctype="multipart/form-data">
                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">

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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Paper</label>
                                                <div class="col-sm-9">
                                                    <select type="text" name="paper_id" id="paper_id" class="form-control" placeholder="Class" required="" disabled>
                                                        <option value="">--Select Paper--</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                  
                </div>
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
    </script>
        
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
            $('#class_id').attr( "disabled" );
        }
    });

//         


$('#class_id').change(function() {
        var class_id = $(this).val();
        if(class_id){
            $.ajax({
                type:'POST',
                url:'ajax/common_ajax.php',
                data:'p_id='+class_id,
                success:function(html){
                    $('#paper_id').html(html);
                    // alert(html)
                    $('#paper_id').removeAttr( "disabled" );
                   
                }
            }); 
        }else{
            $('#paper_id').html('<option value="">-- Select Class-- </option>');
            $('#paper_id').attr( "disabled" );
        }
    });

</script>

