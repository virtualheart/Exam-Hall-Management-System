<?php include('head.php');?>
<?php include('header.php');?>

<?php include('sidebar.php');?>   
                
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Attendence</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Blank</li>
                    </ol>
                </div>
            </div>
           
            <div class="container-fluid">
<!--  -->
<div class="container mt-6">
    <div class="row justify-content-start">
        <h4 class="pr-2" style="color:#656565"><?php echo "Today" ?>'s attendance for </h4>
        <div class="form-row">
<!--             <div class="col">
                <input type="text" name="year" class="form-control" placeholder="YYYY" size="10" value="">
            </div>
            <div class="col">
                <input type="text" name="month" class="form-control" placeholder="MM" size="10" value="">
            </div> -->
            <div class="col">
                <input type="hidden" name="empid" value="">
                <button type="submit" class="btn btn-primary" >Submit</button>
                <button onclick="setAllPresent()" class="btn selectedOption" name="allp">All Present</button>
                <a href="#" class="btn btn-dark" >Go Back</a>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-5">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">S.No Name</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Class</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include 'connect.php';
                            $sql1 = "SELECT * FROM `tbl_class`"; 
                            $result1 = $conn->query($sql1);
                            $index = 0;
                            while($row = $result1->fetch_assoc()) { 
                            $index++;
                        ?>
                        <tr>
                            <td>
                                <p><?php echo $index; ?></p>    
                            </td>
                            <td>
                                <p><?php echo "rani muniyamma angala parameswari";//echo $row['name']; ?></p>    
                            </td>
                            <td>
                                <p><?php echo "Pariya lambadi pombalaya irrpa pola";//echo $row['class']; ?></p>    
                            </td>
                            <td>
                                <button onclick="changeOption(<?php echo $index; ?>)" class="btn selectedOption" data-index="<?php echo $index; ?>" name="attstatus[]">Click</button>
                            </td>
                        </tr>
                        <?php } ?>
                        <input type="hidden" name="empid" value="">
                        <input type="hidden" name="year" value="">
                        <input type="hidden" name="month" value="">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!--  -->
            </div>
           
            <?php include('footer.php');?>

<script>


function changeOption(index) {
    var selectedOption = document.querySelector("[data-index='" + index + "']");
    var currentValue = selectedOption.textContent;
    var value;

    if (currentValue === "P") {
        value = "A";
    } else if (currentValue === "A") {
        value = "H";
    } else if (currentValue === "H") {
        value = "OD";
    } else {
        value = "P";
    }

    selectedOption.className = "btn selectedOption " + getButtonColor(value);
    selectedOption.textContent = value;
    // Perform actions with the selected value
    // console.log(value); 
    // btn-primary: Blue button
    // btn-secondary: Gray button
    // btn-success: Green button
    // btn-danger: Red button
    // btn-warning: Yellow button
    // btn-info: Light blue button
    // btn-light: Light gray button
    // btn-dark: Dark gray button
    // btn-link: Button with an underline style
}

function getButtonColor(value) {
    switch (value) {
        case 'P':
            return "btn-success";
        case 'A':
            return "btn-danger";
        case 'OD':
            return "btn-primary";
        case 'H':
            return "btn-warning";
        default:
            return "btn-secondary";
    }
}

function setAllPresent() {

    var attstatus = document.querySelectorAll('button[name="attstatus[]"]');
        
        for (var i = 0; i < attstatus.length; i++) {
            attstatus[i].textContent = 'P';
            attstatus[i].className = 'btn selectedOption ' + getButtonColor('P');
        }

    }

</script>

    <!-- $attStatusValues = $_POST['attstatus']; // Array of attstatus[] values
    
    // Loop through the attstatus[] values
    foreach ($attStatusValues as $value) {
        // Process each value as needed
        echo $value . "<br>";
    }
     -->