
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
 ?>
<div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Exam Report</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Exam Report</li>
                    </ol>
                </div>
            </div>
          
            <div class="container-fluid">                    
               <div class="card">
                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Exam Name</th>
                                                <th>Exam Date</th>
                                                <th>Time</th> 
                                                <th>Class Name</th>
                                                <th>Subject Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php 
                                    include 'connect.php';  

                                    $sql1 = "SELECT allot.*, tbl_class.classname, exam.name AS exam_name, exam.exam_date, exam.start_time,exam.end_time, tbl_subject.subjectname
                                             FROM allot
                                             INNER JOIN tbl_class ON allot.class_id = tbl_class.id
                                             INNER JOIN exam ON allot.exam_id = exam.id
                                             LEFT JOIN tbl_subject ON exam.p_id = tbl_subject.id";

                                    $result1 = $conn->query($sql1);

                                    while ($row = $result1->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['exam_name']; ?></td>
                                            <td><?php echo $row['exam_date']; ?></td>
                                            <td><?php echo $row['start_time'] . '-' . $row['end_time']; ?></td>
                                            <td><?php echo $row['classname']; ?></td>
                                            <td><?php echo $row['subjectname']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>


                                        </tbody>
                                    </table>
                                </div>
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
    </script>