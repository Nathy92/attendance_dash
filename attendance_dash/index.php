<?php 
$conn = mysqli_connect("localhost", "root", "", "access");
$output = '';

?>
<html>
	<head>
		<!--Links-->
		<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css"> <!-- Main User interface function -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
        
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css"/>
        
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
                <!--Start drop filter part-->
					<div class="col-xs-4">
                    <select class="form-control" name="" id="">
                        <option value="">-- Select Option --</option>
                        <option value="">Top 1</option>
                        <option value="">Top 2</option>
                        <option value="">Top 3</option>
                        <option value="">Top 4</option>
                        <option value="">Top 5</option>
                        <option value="">Top 6</option>
                        <option value="">Top 7</option>
                        <option value="">Top 8</option>
                        <option value="">Top 9</option>
                        <option value="">Top 10</option>
                        <?php

                        ?>
                    </select>
                    <br>
                    <br>

                    <div id="table-container">
                        <?php
                             


                        ?>
                    </div>
                    </div>
                <!--End filter part-->
               
                <!--Start calendar container-->
                                    <div id="calender_container" class="col-lg-4">     
                                    <!--   Date User Interface -->
                                    <div class="col-md-2">
                                    <input type="text" name="From" id="From" class="form-control" placeholder="From Date"/>
                                    </div>
                                    <div class="col-md-2">
                                    <input type="text" name="to" id="to" class="form-control" placeholder="To Date"/>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="button" name="range" id="range" value="Search" class="btn btn-success"/>
                                    </div>
                                    <div class="clearfix"></div>
                                    </div> 
                <!--End calendar container-->
                    
                    <!--Start left search bar-->
					<div class="col-xs-4"> <!--  Search User Interface         -->
                        <form class="navbar-form navbar-right" role="search" >
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Search..." name="search_text" id="search_text">
							</div>
							<button type="submit" class="btn btn-success">Search</button>
						</form>
					</div>
                    <!--End search bar-->
				</div>
				
				
				</h2>
			</div><!--End panel-heading-->
			<br>
			
			<div class="panel-body" ><!--Start panel-body-->
				<form action="" method="post">         <!--Start form-->
			<div id="result">
 <?php
                       $query = "
                        SELECT * FROM attend ORDER BY Emp_id
                        ";
                        $result = mysqli_query($conn, $query);
                     if(mysqli_num_rows($result) > 0)
                        {
                        $output .= '<table class="table">          <!--Start table-->
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Staff ID</th>
                                        <th scope="col">Time-In</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Method</th>
                                    </tr>
                                    ';
                          while($row = mysqli_fetch_array($result))
                        {
                        $output .=     '<tr>
                                        <th scope="row">'.$row["Date"].'</th>
                                        <td ><a href="profile.php?value_key='.$row["Emp_id"].'" class="btn btn-info">'.$row["Emp_id"].'</a></td>                
                                        <td>'.$row["Time"].'</td>
                                        <td>'.$row["Status"].'</td>
                                        <td>'.$row["Access_method"].'</td>


                                </tr>';
                        }
                        echo $output;
                        }
                        else
                        {
                        echo 'Data Not Found';
                            
                        } 
                
                       mysqli_close($conn);
                          
?>
                
                    </div>

                    <!--<div id="result"></div>-->
                            
					        
					
					<!--End table-->
				</form><!--End form-->
			</div><!--End panel-body-->
		</div><!--End panel panel-default-->
		
		<!--Script links-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap/bootstrap.min.js"></script>
		
	</body>
</html>

<script src="js/jquery-ui.js"></script>
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
 



$(document).ready(function(){
	$.datepicker.setDefaults({
		dateFormat: 'yy-mm-dd'
	});
	$(function(){
		$("#From").datepicker();
		$("#to").datepicker();
	});
	$('#range').click(function(){
		var From = $('#From').val();
		var to = $('#to').val();
		if(From != '' && to != '')
		{
			$.ajax({
				url:"range.php",
				method:"POST",
				data:{From:From, to:to},
				success:function(data)
				{
					$('#result').html(data);
				}
			});
		}
		else
		{
			alert("Please Select the Date");
		}
	});
});
</script>
						