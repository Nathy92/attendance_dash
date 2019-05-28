<?php
$conn = mysqli_connect("localhost", "root", "", "access");
$output = '';
if(isset($_GET["value_key"])){


$search = mysqli_real_escape_string($conn, $_GET["value_key"]);
$query = "
  SELECT * FROM attend 
  WHERE Emp_id LIKE '%".$search."%' ORDER by Time
  
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
  $output .=           '<tr>
                                <th scope="row">'.$row["Date"].'</th>
								<td ><a href="view.php?value_key='.$row["Emp_id"].'">'.$row["Emp_id"].'</a></td>                
								<td>'.$row["Time"].'</td>
								<td>'.$row["Status"].'</td>
                                <td>'.$row["Access_method"].'</td>
                            
                        
                        </tr>';
 }
 echo $output;
}
  
    
    
    
//echo "we are in";

}
else{ // Incase there id no value in the link

echo "No Record Found!";
    
}


?>