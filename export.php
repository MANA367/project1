<?php
include './inc/conn.php';

header('Content-Type:text/csv');
header('Content-Disposition:attachment; filename=users.csv');

$output=fopen("php://output","w");
fputcsv($output,['First Name','Last Name','Email']);

$sql="SELECT * FROM users";
$r=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($r)){
fputcsv($output,$row);
}
fclose($output);
exit;
?>
