<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin	</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="home.php"><i class="fa fa-dashboard"></i>Clients Record </a>
                    </li>
                    <li>
                        <a class="active-menu" href="logout.php"><i class="fa fa-dashboard"></i>Logout </a>
                    </li>
                    
				</ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">

                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
											<button class="btn btn-default" type="button">
												 Clients Consultation Information  <span class="badge"></span>
											</button>
											</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
                                           <div class="panel panel-default">
                        
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>AccountType</th>
                                                                    <th>Org. Name</th>
                                                                    <th>Full Name</th>
                                                                    <th>Email</th>
                                                                    <th>Nationality</th>
                                                                    <th>Number</th>
                                                                    <th>Service</th>
                                                                    <th>More</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            <?php
                                                            include_once('db.php');
                                                                                                
                                                            $db = mysqli_connect("localhost", "root", "");
                                                            mysqli_select_db($db, "consultation");

                                                            $query = "select * from clients";
                                                            $apps = mysqli_query($db, $query);
                                                            if($apps){
                                                                if(mysqli_num_rows($apps) > 0){
                                                                while($row = mysqli_fetch_array($apps)){
                                                                    $id = $row['id'];
                                                                    
                                                                    ?>					
						                                     <tr>
                                                                        <td><?php echo $row['id'];?></td>
                                                                        <td><?php echo $row['type']; ?></td>
                                                                        <td><?php echo $row['orgName']; ?></td>
                                                                        <td><?php echo $row['fullname']; ?></td>
                                                                        <td><?php echo $row['email']; ?></td>
                                                                        <td><?php echo $row['nationality'];?></td>
                                                                        <td><?php echo $row['number']; ?></td>
                                                                        <td><?php echo $row['service']; ?></td>
                                                                        
                                                                        <td><a href=del.php?id=".$id ." <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
                                                                        
                                                                </tr>
                                                                <?php
                                                                        }

                                                                     }
                                                                    
                                                            
                                                                } 
                                                                ?>   
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                 </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>