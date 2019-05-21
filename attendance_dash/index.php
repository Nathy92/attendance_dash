<?php include("data.php"); 
$pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'); 


?>
<html>
	<head>
		<!--Links-->
		<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title></title>
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!-- Search function library -->
         
                  
	</head>
	<body >
       
        
		<div class="container"><!--start container-->
		<h2><div class="well text-center">Attendance Dashboard</div></h2>
		</div><!--End container-->
		
		<div class="panel panel-default"><!--Start panel panel-default-->
			
			<div class="panel-heading"><!--Start panel-heading-->
				<h2>
				
				<div class="row">
					<div class="col-md-6">Welcome:.... <br> StaffID:....</div>
					<div class="col-md-6">
						<form class="navbar-form navbar-right" role="search" >
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Search..." name="search_text" id="search_text">
							</div>
							<button type="submit" class="btn btn-success">Submit</button>
						</form>
					</div>
				</div>
				
				
				</h2>
			</div><!--End panel-heading-->
			<br>
			
			<div class="panel-body"><!--Start panel-body-->
				<form action="" method="post">         <!--Start form-->
			<!--	<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Date</th>
								<th scope="col">Staff ID</th>
								<th scope="col">Time-In</th>
								<th scope="col">Status</th>
                                <th scope="col">Method</th>
							</tr>
						</thead>
						<tbody>
                         
                       

                  <?php 
                      if($pageRefreshed != 1){
                              while($result=mysqli_fetch_array($db))
                    {
                       echo '<tr>
                                <th scope="row">'.$result["Date"].'</th>
								<td>'.$result["Emp_id"].'</td>
								<td>'.$result["Time"].'</td>
								<td>'.$result["Status"].'</td>
                                <td>'.$result["Access_method"].'</td>
                            
                        
                        </tr>';
                    
                    }
                        
                        }
                       mysqli_close($conn);
                          
                  ?>-->

                    <div id="result"></div>
                            
					        
						</tbody>
					</table><!--End table-->
				</form><!--End form-->
			</div><!--End panel-body-->
		</div><!--End panel panel-default-->
		
		<!--Script links-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap/bootstrap.min.js"></script>
		
	</body>
</html>


<script>  
$(document).ready(function(){
  
  $("#search_text").keyup(function(){
        load_data();
 // THE SEARCH FUNCTIONALITY WRITTEN IN JAVASCRIPT (jquery)

 

 function load_data(query)
 {
  $.ajax({
   url:"search.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
      
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
});
 
</script>  
						<!--	<tr>
								<th scope="row">1</th>
								<td>TN Mark</td>
								<td>07:00</td>
								<td>16:00</td>
                                <td>15:00</td>
							</tr> -->