<?php
include './inc/conn.php';
$sql="SELECT * FROM users ORDER BY RAND() LIMIT 1";
$r=mysqli_query($conn,$sql);
$w=mysqli_fetch_assoc($r);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>الفائز</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body class="text-center mt-5">

<h1>🎉 الفائز</h1>

<?php if($w): ?>
<h3><?= $w['firstName']." ".$w['lastName'] ?></h3>
<p><?= $w['email'] ?></p>
<?php else: ?>
<p>لا يوجد مسجلين</p>
<?php endif; ?>

<a href="index.php">رجوع</a>

</body>
</html>
