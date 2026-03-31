<?php
include './inc/conn.php';
include './inc/form.php';

$sql="SELECT * FROM users ORDER BY id DESC";
$result=mysqli_query($conn,$sql);
$users=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>mana_project_pro</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
<link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div class="container mt-5">
<div class="box">

<h1 class="text-center"> مانع حمد المكاييل</h1>

<!-- عداد -->
<div class="text-center mb-4">
<h4>الوقت المتبقي للسحب</h4>
<h2 id="countdown"></h2>
</div>

<div class="form-box">

<form method="POST">

<label>الاسم الأول</label>
<input name="firstName" class="form-control">

<label>الاسم الأخير</label>
<input name="lastName" class="form-control">

<label>الإيميل</label>
<input name="email" class="form-control">

<button class="btn btn-primary mt-3 w-100">تسجيل</button>

</form>
</div>

<a href="winner.php" class="btn btn-success">سحب فائز</a>
<a href="export.php" class="btn btn-dark">تصدير Excel</a>

<hr>

<?php foreach($users as $u): ?>
<div class="bg-white p-2 mb-2">
<?= $u['firstName']." ".$u['lastName'] ?>
<br>
<?= $u['email'] ?>
<br>
<a href="delete.php?id=<?= $u['id'] ?>" class="btn btn-danger btn-sm">حذف</a>
</div>
<?php endforeach; ?>

</div>
</div>

<script>
var countDownDate=new Date().getTime()+86400000;
var x=setInterval(function(){
var now=new Date().getTime();
var d=countDownDate-now;
var h=Math.floor((d%(1000*60*60*24))/(1000*60*60));
var m=Math.floor((d%(1000*60*60))/(1000*60));
var s=Math.floor((d%(1000*60))/1000);
document.getElementById("countdown").innerHTML=h+"h "+m+"m "+s+"s";
},1000);
</script>

</body>
</html>
