<?php
include('db.php')
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MIKE CONSULTANCY</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="../index.php"><i class="fa fa-home"></i> Client Portal</a>
                    </li>
                    
					</ul>

            </div>

        </nav>
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            CLIENT CONSULTATION PORTAL <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            CLIENT INFORMATIONS
                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
                            <div class="form-group">
                                            <label>Account Type*</label>
                                            <select name="type" class="form-control" required >
												<option value selected ></option>
                                                <option value="Personal">Personal</option>
                                                <option value="organization">Organization</option>
                                                
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>Organization Name</label>
                                            <input name="orgname" class="form-control" placeholder="optional for a personal client">
                                            
                               </div>
							   <div class="form-group">
                                            <label>Full Name</label>
                                            <input name="fullname" class="form-control" placeholder="individual name or organization CEO name" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Nationality*</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="nation"  value="nigeria" checked="">Nigerian
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="nation"  value="Non nigeria ">Non Nigerian
                                            </label>
                         
                                </div>
								
								<div class="form-group">
                                            <label>Phone Number</label>
                                            <input name="number" type ="text" class="form-control" required>
                                            
                               </div>
                               <div class="form-group">
                                            <label>Service Required*</label>
                                            <select name="service" class="form-control" required >
												<option value selected ></option>
                                                <option value="consultation">Consultation</option>
                                                <option value="counselling">Counselling</option>
                                                <option value="auditing">Auditing</option>
                                                <option value="finance management">Finance Management</option>
                                                <option value="employee enrollment">Employee Enrolment</option>
                                                <option value="student admission process">Student Admission Process</option>
                                                <option value="Skill acquisition">Skill Acquisition</option>
                                                <option value="Mentoring">Mentoring</option>
                                                
                                            </select>
                              </div>

                              <input type="submit" name="submit" value="CONSULT" class="btn btn-primary">
							   
                        </div>
                        
                    </div>
                </div>
                
						<?php
							if(isset($_POST['submit']))
							{
                            
                                $con=mysqli_connect("localhost","root","","consultation");
                                $check="SELECT * FROM clients WHERE email = '$_POST[email]'";
							    $rs = mysqli_query($con,$check);
								$data = mysqli_fetch_array($rs, MYSQLI_NUM);
								if($data[0] > 1) {
									echo "<script type='text/javascript'> alert('User Already in Exists')</script>";
										
									}
									else
									{
										$newUser="INSERT INTO `clients`(
                                             
                                              `type`,
                                              `orgName`,
                                              `fullname`,
                                              `email`,
                                              `nationality`, 
                                              `number`, 
                                              `service`
                                               )
                                                VALUES
                                                 (
                                                    '$_POST[type]',
                                                    '$_POST[orgname]',
                                                    '$_POST[fullname]',
                                                    '$_POST[email]',
                                                    '$_POST[nation]',
                                                    '$_POST[number]',
                                                    '$_POST[service]'
                                                   
                                                    )";

                                    $run_insert = mysqli_query($con, $newUser);
            
                                    if($run_insert){
                                         
                                         echo "<script>alert('Client Registration Successful')</script>";
                                         
                                        
                                    }else{
                                      echo "<script>alert('Client Registration Failed'.$run_insert.$con->error)</script>";
                                    }
							
                                }

                            }
							?>
						</form>
							
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
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
