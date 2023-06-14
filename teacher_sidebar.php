 <?php 
 include('connect.php');

 ?>

 
        <div class="left-sidebar">
            
            <div class="scroll-sidebar">
                
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="teacher_panel.php" aria-expanded="false"><i class="fa fa-window-maximize"></i>Dashboard</a>
                        </li>              
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-clock-o"></i><span class="hide-menu">Attendence Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add_attendence.php">Add Attendence</a></li>
                                <li><a href="view_attendence.php">View Attendence</a></li>                               
                            </ul>
                        </li>
                    </ul>   
                </nav>
            </div>
           
        </div>
        