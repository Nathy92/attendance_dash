<!DOCTYPE html>
<?php
$conn = mysqli_connect("localhost", "root", "", "access");
$output = '';

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport"
   <!--Links-->
		<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/profile.css">
		<title></title>
        
         <script src="js/jquery.js"></script> <!-- Search function library -->
         
</head>
<body>

 
<div class="container">
  
    <div class="row">
                      <div class="panel panel-default">
                      <div class="panel-heading-custom panel-heading heading "> <h4 >User Profile</h4></div>
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                       <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                     
                 
                      </div>
                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >  <!-- Start of HTML container with PHP-->
                                    <?php   
                                        if(isset($_GET["value_key"])){


                                        $search = mysqli_real_escape_string($conn, $_GET["value_key"]);
                                        $query = "
                                        SELECT * FROM attend 
                                        WHERE Emp_id LIKE '%".$search."%' ORDER by Time LIMIT 0,1

                                        ";

                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($result); // Fetch the one row as Array
                                            
                            echo '   <div class="container" >
                            <h2>'.$row["Emp_id"].'</h2>
                            <p>an   <b> Employee Name ...</b></p>
							
                          
                           
                          </div>
                           <hr>
                          <ul class="container details" >
                            <li><p><span style="width:50px;"></span>Time   : '.$row["Time"].' </p></li>
                            <li><p><span style="width:50px;"></span>Status : '.$row["Status"].'</p></li>
                            <li><p><span style="width:50px;"></span>Access : '.$row["Access_method"].' </p></li>
                          
                          </ul>
                          <hr>
                          <div class="col-sm-5 col-xs-6 tital " > Date : '.$row["Date"].' </div>
                              '; // end of string 
                                        } // End of isset condition
                                        else{ // Incase there id no value in the link

                                        echo "No Record Found!";
    
                                        }
                          ?>
                      </div>  <!-- End of HTML container with PHP-->
                </div>
            </div>
            </div>
</div>
 
</body>
</html>