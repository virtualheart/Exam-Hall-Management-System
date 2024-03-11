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
                                    <form class="form-horizontal" method="POST" action="pages/save_subjects.php" name="userform" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">
                                                                       
                                   <div class="form-group">
                                            <div class="row">

                                        <label class="col-sm-3 control-label">Paper Part</label>
                                        <div class="col-sm-9">
                                            <select type="text" name="paper_part" id="paper_part" class="form-control"   placeholder="Class" required="">
                                                <option value="">--Select Part--</option>
                                                    <option value="I">I</option>
                                                    <option value="II">II</option>
                                                    <option value="III">III</option>
                                            </select>
                                        </div>
                                    </div>
                                    </div>

                                   <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Paper-code</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="paper_code" class="form-control"   placeholder="Paper-code" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Paper Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="subjectname" class="form-control" placeholder="Paper Name" id="event" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <label class="col-sm-3 control-label">Paper-Price</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="paper_price" class="form-control"   placeholder="Paper-Price" required min="0">
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
                
        
<?php include('footer.php');?>
