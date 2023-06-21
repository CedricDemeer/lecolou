<?php
$template = 'homepage';
$title = 'Acceuil';

?>
<?php require('include/head.php'); ?>
<?php require('class/helloasso.php'); 
$helloasso = new helloasso();
?>

<?php include('include/header.php'); ?>


<div class="main-content bg-pink-400 dark:bg-pink-900 dark:text-white text-white">
  <div class=" container mx-auto ">
    <!--<img src="./images/Logo_Ecolou.svg" alt="logo de l'écolou des petits petons" class="max-w-xs  md:max-w-md xl:max-w-xl mx-auto">-->
  </div>      
  <div class=" container mx-auto border-double border-4 border-white rounded-md my-4">
    <h1>coucou</h1>
  </div> 
    
    
        
</div>
    

<?php include('include/footer.php');?>

<script src="js/ecolou.js"></script>
    
</body>
</html>