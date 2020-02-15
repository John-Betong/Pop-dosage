<?php 
declare(strict_types=1);
# echo error_reporting();
# echo ini_get('display_errors');
#  die;
$title      = 'Form JB Input';
$pagetitle  = 'Form JB Input';
$spForum    = 'https://www.sitepoint.com/community/t/verbose-problem-i-would-like-simplifying-because-there-are-lots-more-script-to-follow/347088/9';

$labels = ['Breakfast', 'Lunch', 'Dinner'];
$labels = [
  'Before_Breakfast', 
  'After_Breakfast', 
 # 'Before_Lunch', 
 # 'After_Lunch', 
 # 'Before_Dinner',
 # 'After_Dinner',
 # 'Odd_Balls'
];
$doses  = ['drug', 'dose', 'time'];

?><!DOCTYPE HTML><html  lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1">
<title> <?= $title ?> </title>
<link rel="stylesheet" href="incs/style-001.css" media="screen">
</head>
<body>
  <?php require 'incs/_logo.php'; ?>  

  <div class="w88 mga bgs">
    <?php 
      if(LOCALHOST) :
        echo 'rsync -avz /var/www/this-is-a-test-to-see-if-it-works.tk/public_html/pop-dosage/ -e ssh root@139.162.244.63:/var/www/this-is-a-test-to-see-if-it-works.tk/public_html/pop-dosage/';

        fred($_SESSION, '$_SESSION');
        fred($_POST, '$_POST'); 
      endif;  
    ?>
  </div>
  <p> <br> </p>

</body>
</html>