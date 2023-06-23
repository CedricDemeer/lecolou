
<?php require('include/head.php'); ?>
<?php require('class/helloasso.php'); 
$helloasso = new helloasso();
$dataAsso = $helloasso->getInfoAsso();
?>

<?php include('include/header.php'); ?>


<div class="main-content bg-pink-400 dark:bg-pink-900 dark:text-white text-white">
  