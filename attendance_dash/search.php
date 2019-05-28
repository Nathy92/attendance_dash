<?php
//fetch.php
$conn = mysqli_connect("localhost", "root", "", "access");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM attend 
  WHERE Emp_id LIKE '%".$search."%'
 OR DATE LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM attend ORDER BY Emp_id
 ";
}
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
								<td ><a href="profile.php?value_key='.$row["Emp_id"].'" class="btn btn-info">'.$row["Emp_id"].'</a></td>                
								<td>'.$row["Time"].'</td>
								<td>'.$row["Status"].'</td>
                                <td>'.$row["Access_method"].'</a></td>
                            
                        
                        </tr>';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
?>