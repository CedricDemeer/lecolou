
<?php

$title = 'Acceuil';
require('base.php');
require('class/date.php');
?>


  
  <div class=" container mx-auto ">
    <div class="flex justify-center">
        <img src="<?= $helloasso->getInfoAsso()['banner'] ?>" alt="">
    </div>
    <div class="contenu grid grid-cols-1 md:grid-cols-2 ">
    <?php foreach ($helloasso->getEvents()["data"] as $event) : ?>
      <?php if($event['state'] === 'Public') : ?>
        <a href="<?= $event['url'] ?>" class="text-white" target="_blank">
        <div class="border-double border-4 border-white rounded-md my-5 mx-5 px-5  " >
          <div class="my-4"><h1 class="text-center"><?= $event['title'] ?></h1></div>
          <div>DATE : 
            <?= madate::getMaDate($event['startDate']); ?>
          </div>
          
            <div class="my-2"><img src="<?= $event['logo']['publicUrl'] ?>" alt="" class="w-full rounded-lg"></div>
            <div class="my-4"><p><?= $event['description'] ?></p></div>
          
           
          
        </div>     
        </a>   
      <?php endif; ?>
    <?php endforeach; ?>
    </div>   
  </div> 

  <?php require('base2.php'); ?>