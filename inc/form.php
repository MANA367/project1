<?php
$error='';

if($_SERVER['REQUEST_METHOD']==='POST'){

$firstName=trim($_POST['firstName']??'');
$lastName=trim($_POST['lastName']??'');
$email=trim($_POST['email']??'');

if($firstName==''||$lastName==''||$email==''){
$error="يرجى تعبئة جميع الحقول";
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
$error="إيميل غير صحيح";
}else{


$check=mysqli_prepare($conn,"SELECT id FROM users WHERE email=?");
mysqli_stmt_bind_param($check,"s",$email);
mysqli_stmt_execute($check);
mysqli_stmt_store_result($check);

if(mysqli_stmt_num_rows($check)>0){
$error="هذا الإيميل مسجل مسبقاً";
}else{

$stmt=mysqli_prepare($conn,"INSERT INTO users(firstName,lastName,email) VALUES(?,?,?)");
mysqli_stmt_bind_param($stmt,"sss",$firstName,$lastName,$email);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("Location:index.php");
exit;

}
}
}
?>
