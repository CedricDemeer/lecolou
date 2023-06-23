<?php

$title = 'Acceuil';

?>
<?php require('base.php'); ?>


  <div class=" container mx-auto ">
    <img src="./images/Logo_Ecolou.svg" alt="logo de l'écolou des petits petons" class="max-w-xs  md:max-w-md xl:max-w-xl mx-auto">
    <div class="my-10">
      <h2 class="text-center"><?= ($dataAsso["description"]); ?></h2>
    </div>
  </div>

  <?php require('base2.php'); ?>