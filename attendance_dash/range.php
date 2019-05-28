<?php
// Range.php
if(isset($_POST["From"], $_POST["to"]))
{
	$conn = mysqli_connect("localhost", "root", "", "access");
	$result = '';
	$query = "SELECT * FROM attend WHERE Date BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
	$sql = mysqli_query($conn, $query);
	$result .= '<table class="table">          <!--Start table-->
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Staff ID</th>
                                        <th scope="col">Time-In</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Method</th>
                                    </tr>
                                    ';
	if(mysqli_num_rows($sql) > 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			$result .='
			<tr>
			<td>'.$row["Date"].'</td>
			<td ><a href="profile.php?value_key='.$row["Emp_id"].'" class="btn btn-info">'.$row["Emp_id"].'</a></td>       
			<td>'.$row["Time"].'</td>
			<td>'.$row["Status"].'</td>
			<td>'.$row["Access_method"].'</td>
			</tr>';
		}
	}
	else
	{
		$result .='
		<tr>
		<td colspan="5">No Records Found</td>
		</tr>';
	}
	$result .='</table>';
	echo $result;
}
?>