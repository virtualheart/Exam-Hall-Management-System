<?php include('head.php');?>
<?php include('header.php');?>

<?php include('sidebar.php');?>   
   
        
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Class TimeTable</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Class TimeTable</li>
                    </ol>
                </div>
            </div>
           
            <div class="container-fluid">
                   <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="input-states">
                                  <?php
/**/
?>
   <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <div class="row">
    <label for="day" class="col-sm-3 control-label">Select Day(s):</label><br>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" value="Monday" name="Monday" id="Monday">
      <label class="form-check-label" for="Monday">Monday</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" value="Tuesday" name="Tuesday" id="Tuesday">
      <label class="form-check-label" for="Tuesday">Tuesday</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" value="Wednesday" name="Wednesday" id="Wednesday">
      <label class="form-check-label" for="Wednesday">Wednesday</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" value="Thursday" name="Thursday" id="Thursday">
      <label class="form-check-label" for="Thursday">Thursday</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" value="Friday" name="Friday" id="Friday">
      <label class="form-check-label" for="Friday">Friday</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" value="Saturday" name="Saturday" id="Saturday">
      <label class="form-check-label" for="Saturday">Saturday</label>
    </div>
  </div>
</div>

  <div class="form-group">
    <div class="row">
    <label for="time_start" class="col-sm-3 control-label">Time Start:</label>
  <div class="col-sm-9">

    <select class="form-control" name="time_start">
      <option>--Select--</option>
      <option value="I">I</option>
      <option value="II">II</option>
      <option value="III">III</option>
      <option value="IV">IV</option>
      <option value="V">V</option>
    </select>
  </div>
</div>
</div>

  <div class="form-group">
        <div class="row">
    <label for="fname" class="col-sm-3 control-label">Teacher:</label>
  <div class="col-sm-9">
    <select class="form-control" name="fname">
      <option>--Select--</option>
    </select>
</div>
</div>
  </div>

  <div class="form-group">
            <div class="row">

    <label class="col-sm-3 control-label" for="subject_code">Subject:</label>
  <div class="col-sm-9">
    <select class="form-control" name="subject_code">
      <option>--Select--</option>
    </select>
</div>
</div>
  </div>

  <div class="form-group">

        <div class="row">

    <label class="col-sm-3 control-label" for="room_name">Room:</label>
  <div class="col-sm-9">
    <select class="form-control" name="room_name">
      <option>--Select--</option>
    </select>

</div>
</div>
  </div>

  <div class="form-group">

        <div class="row">

    <label class="col-sm-3 control-label" for="course_year_section">Course:</label>
  <div class="col-sm-9">
    <select class="form-control" name="course_year_section">
      <option>--Select--</option>
    </select>

</div>
</div>
  </div>

  <div class="form-group">
        <div class="row">

    <label class="col-sm-3 control-label" for="semester">Semester:</label>
  <div class="col-sm-9">

    <select class="form-control" name="semester">
      <option>1ST</option>
      <option>2ND</option>
    </select>

</div>
</div>
  </div>

  <div class="form-group">
        <div class="row">

    <label class="col-sm-3 control-label" for="sy">School Year:</label>
  <div class="col-sm-9">


    <select class="form-control" name="sy">
      <option>--Select--</option>
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
</div>
</div>
           
            <?php include('footer.php');?>
            <!-- 

          $Monday=@$_POST['Monday'];
          $Tuesday=@$_POST['Tuesday'];
          $Wednesday=@$_POST['Wednesday'];
          $Thursday=@$_POST['Thursday'];
          $Friday=@$_POST['Friday'];
          $Saturday=@$_POST['Saturday'];

          $day=$Monday." ".$Tuesday." ".$Wednesday." ".$Thursday." ".$Friday." ".$Saturday;
          $time_start= $_POST['time_start'] ;         
          $time_end=$_POST['time_end'] ;
          $fname=$_POST['fname'] ;
          $subject_code=$_POST['subject_code'] ;
          $room_name=$_POST['room_name'] ;
          $course_year_section=$_POST['course_year_section'] ;
          $semester=$_POST['semester'] ;
          $sy=$_POST['sy'] ;
          $department=$_POST['department'] ;


$query = mysqli_query($conn, "SELECT * FROM classsched WHERE day='$day' AND time_start='$time_start' AND time_end='$time_end' AND (fname='$fname' OR room_name='$room_name' OR course_year_section='$course_year_section')");
$row = mysqli_fetch_assoc($query);

if ($row > 0) {
    if ($fname == $row['fname']) {
        echo "<script>alert('Teacher already exists: $fname');</script>";
    } elseif ($room_name == $row['room_name']) {
        echo "<script>alert('Room already exists: $room_name');</script>";
    } elseif ($course_year_section == $row['course_year_section']) {
        echo "<script>alert('Course already exists');</script>";
    } elseif(think(same for up)) {
        echo "<script>alert('Conflict in time');</script>";
    }else{
        mysqli_query("insert into classsched (classid,day,time_start,time_end,fname,subject_code,room_name,course_year_section,semester,sy,department,status) values ('','$day','$time_start','$time_end','$fname','$subject_code','$room_name','$course_year_section','$semester','$sy','$department','unsaved') ");
}
-->
