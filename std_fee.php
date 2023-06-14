<?php include('head.php');?>
<?php include('header1.php');?>
<?php include('include/NumberToWords.php');?>
<?php include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
 $currentMonth = date('m'); // Get the current month (e.g., '06' for June)

if ($currentMonth >= '01' && $currentMonth <= '06') {
    $nextPaymentMonth = date('Y').' July'; 
} else {
    $nextPaymentMonth = 'January'; 
}

$que="SELECT stud_id,sfname,slname,class_id,semail,sgender,sdob,dept_name,classname,scontact,saddress FROM `tbl_student` ts join tbl_department td on ts.dept_id=td.dept_id join tbl_class tc on ts.class_id=tc.id WHERE ts.id='".$_SESSION["id"]."'";

$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
    
extract($row);
$stud_id = $row['stud_id'];
$fname = $row['sfname'];
$lname = $row['slname'];
// $dept_id = $row['dept_id'];
// $class_id = $row['class_id'];
$email = $row['semail'];
$gender = $row['sgender'];
$dob = $row['sdob'];
$dept_name = $row['dept_name'];
$classname = $row['classname'];
$contact = $row['scontact'];
$address = $row['saddress'];
}


?>
<style>
    tbody tr td{
        color: #000000;
        font-family: Nunito,sans-serif;
    }
</style>

<?php include('stud_sidebar.php');?>   
   
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Exam Fee</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Exam Fee</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
           
            <div class="container-fluid">
                <div class="container ">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="7" class="text-center">
                        <img src="uploadImage/ExamAppHeader.jpg" class="img-fluid" alt="Government Arts College Salem-7">
                    </th>
                </tr>
                <tr>
                    <th colspan="7" class="text-center">
                        <strong style="text-transform: uppercase;">APPLICATION FORM FOR <?php echo $dept_name; ?> EXAMINATIONS - <?php echo $nextPaymentMonth ?> </strong>
                    </th>
                </tr>
                <tr>
                    <th colspan="3" class="text-center">
                        <strong>NAME OF THE CANDIDATE <br> <?php echo $fname.$lname ?></strong>
                    </th>
                    <th class="text-center">
                        <strong>SEMESTER <br> I</strong>
                    </th>
                    <th colspan="2" class="text-center">
                        <strong>REGISTER NUMBER <br> <?php echo $stud_id ?></strong>
                    </th>
                    <th rowspan="2">
                        <img src="image/avatar.png" width="220" height="100" class="img-fluid" alt="22PCA2">
                    </th>
                </tr>
                <tr>
                    <th colspan="4" class="text-center">
                        <strong>DEGREE & BRANCH <br>  <?php echo $dept_name." ".$classname; ?></strong>
                    </th>
                    <th colspan="2" class="text-center">
                        <strong>DATE OF BIRTH <br>  <?php echo $sdob ?></strong>
                    </th>
                </tr>
                <tr>
                    <th>Sem</th>
                    <th>Part</th>
                    <th>Sub.Code</th>
                    <th colspan="3">Name of the Subject</th>
                    <th>Regular / Arrear</th>
                    <th>Fee</th>
                </tr>
            </thead>
            <tbody>

        <?php

            $subqur = "select * from exam";
            
            $query=$conn->query($que);

            while($row1=mysqli_fetch_array($query)) {
    
                extract($row1);
                
                $sem = $row1['sem'];
                $part = $row1['part'];
                $paper_code = $row1['paper_code'];
                $subjectname = $row1['subjectname'];
                $R_A_Type = $row1['R_A_Type'];
                $dob = $row1['sdob'];
                $fee = $row1['fee'];
                $total = $row1['total'];
        ?>

                <tr>
                    <td><?php echo $sem; ?></td>
                    <td><?php echo $part; ?></td>
                    <td><?php echo $paper_code; ?></td>
                    <td colspan="3"><?php echo $subjectname; ?></td>
                    <td class="text-center"><?php echo $R_A_Type; ?></td>
                    <td><?php echo $fee; ?></td>
                </tr>

            <?php } ?>
                <tr>
                    <td><?php echo "I"; ?></td>
                    <td><?php echo "II"; ?></td>
                    <td><?php echo "22pcw99"; ?></td>
                    <td colspan="3"><?php echo "N ame jsj osd bv"; ?></td>
                    <td class="text-center"><?php echo "regary"; ?></td>
                    <td><?php echo 20; ?></td>
                </tr>

            </tbody>
            <thead>
                <tr>
                    <th colspan="4"><b>Particulars:</b></th>
                    <th><b>Regular</b></th>
                    <th><b>Arrear</b></th>
                    <th><b>Total Amount</b></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4"><b>No of Theory Papers</b></td>
                    <td class="text-center">6</td>
                    <td class="text-center">0</td>
                    <td class="text-center">1800</td>
                </tr>
                <tr>
                    <td colspan="4">No of Practical Papers</td>
                    <td class="text-center">2</td>
                    <td class="text-center">0</td>
                    <td class="text-center">700</td>
                </tr>
                <tr>
                    <td colspan="4">Project</td>
                    <td class="text-center">0</td>
                    <td class="text-center">0</td>
                    <td class="text-center">0</td>
                </tr>
                <tr>
                    <td colspan="4">Cost of Application</td>
                    <td colspan="2" rowspan="8"></td>
                    <td class="text-center">50</td>
                </tr>
                <tr>
                    <td colspan="4">Statement of Marks</td>
                    <td class="text-center">100</td>
                </tr>
                <tr>
                    <td colspan="4">*Consolidated Marks</td>
                    <td class="text-center">0</td>
                </tr>
                <tr>
                    <td colspan="4">*Provisional Certificate</td>
                    <td class="text-center">0</td>
                </tr>
                <tr>
                    <td colspan="4">*Convocation Certificate</td>
                    <td class="text-center">0</td>
                </tr>
                <tr>
                    <td colspan="4">Service Charge</td>
                    <td class="text-center">12</td>
                </tr>
                <tr>
                    <td colspan="4" >Penalty (if Applicable)</td>
                    <td class="text-center" >0</td>
                </tr>
                <tr>
                    <td colspan="4">Total</td>
                    <td class="text-center">2662</td>
                </tr>
                <tr>
                    <td colspan="7">*Only for Final Semester Students</td>
                </tr>
                <tr>
                    <td colspan="7"><b>Amount in words:</b> <?php print_r(NumberToWords(2662)); ?> Rupees Only</td>
                </tr>
            </tbody>
        </table>  
    </div>

                             
            </div>
           
            <?php include('footer.php');?>