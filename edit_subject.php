
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
if(isset($_POST["btn_update"]))
{
    extract($_POST);
    
      $q1="UPDATE `tbl_subject` SET `subjectname`='$subjectname',`paper_code`='$paper_code', `price`='$paper_price', `part`='$paper_part' WHERE `id`='".$_GET['id']."'";
 
    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="view_subject.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_subject.php";
</script>
<?php
}

}
?>

<?php
$que="SELECT * from `tbl_subject` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
   
    extract($row);
$fname = $row['subjectname'];
$paper_code = $row['paper_code'];

}

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
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="subjectform">

                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">


                                   <div class="form-group">
                                            <div class="row">

                                        <label class="col-sm-3 control-label">Paper Part</label>
                                        <div class="col-sm-9">
                                            <select type="text" name="paper_part" id="paper_part" class="form-control"   placeholder="Class" required="">
                                                <option value="">--Select Part--</option>
                                                    <option value="I" <?php if ($part == "I"): echo "selected"; endif ?>>I</option>
                                                    <option value="II" <?php if ($part == "II"): echo "selected"; endif ?>>II</option>
                                                    <option value="III" <?php if ($part == "III"): echo "selected"; endif ?>>III</option>
                                            </select>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Class</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="paper_code" class="form-control" value="<?php echo $paper_code; ?>" placeholder="Paper code" required="">
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Subject Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="subjectname" class="form-control" placeholder="Subject Name" id="event" onkeydown="return alphaOnly(event);" value="<?php echo $subjectname; ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <label class="col-sm-3 control-label">Paper-Price</label>
                                                <div class="col-sm-9">
                                                    <input type="number" name="paper_price" class="form-control" value="<?php echo $price; ?>" placeholder="Paper-Price" required min="0">
                                                </div>
                                            </div>
                                        </div>

                                       
                                        <button type="submit" name="btn_update" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
   
<?php include('footer.php');?>

