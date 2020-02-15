<?php 
declare(strict_types=1);
# echo error_reporting();
# echo ini_get('display_errors');
#  die;
$title      = 'JB-Text Area ';
$pagetitle  = 'JB-Text Area ';
$spForum    = 'https://www.sitepoint.com/community/t/verbose-problem-i-would-like-simplifying-because-there-are-lots-more-script-to-follow/347088/9';

$meals = [
  'Before_Breakfast', 
  'After_Breakfast', 
  'Before_Lunch', 
  'After_Lunch', 
  'Before_Dinner',
  'After_Dinner',
  'Oddballs'
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

  <form action="?" method="post">
    <div class="w88 mga bgs bdr bd1">
      <?php
        foreach($meals as $key => $meal):
          echo '<dl><dt>' .$meal .'</dt>';  

          for($i2=0; $i2<3; $i2++) :
            $tmp  = $_POST[$meal .'-'.$i2] 
                  ?? '';
            $TMP2 = $meal .'-' .$i2;              
            echo $qqq = <<< ____EOT
              <dd>
                <textarea name="$TMP2">$tmp</textarea>
                   <br>              
              </dd>
____EOT;
            endfor;  
          echo '</dl>';
        endforeach 
      ?>
      <input class="fsl" type="submit" value="Submit ">
    </div>  
  </form> 
  <p> <br> </p>

<div class="tac"> 

<h2> Dosage Chart </h2>
  
<div class="dib tal XXXw88 XXXmga bga bd1"> 
  <?php 
    // RENDER DATA
    $item = 0;
    foreach($_POST as $key => $value) :
      # print_r($value);
# echo '<br>XXX';      
      if($value):
        $xxx = explode('-', $value);
        $lastX = $xxx[0];
      endif;  
# print_r($value);
      $short = strstr($key, '-', TRUE);
      if(isset($last) && $last===$short):
        // 
      else:
        echo '<br><br><i class="fsl">' .$short .'</i>';
        $last = $short;  
      endif;  

      $final = substr($key,  -1);
      # 
      if( empty($value) || 'View'===$value ):
        //
      else:
        echo '<h5 class="ooo pa3">' .$value .' &nbsp; </h5>';
      endif;
    endforeach;    
  ?> 
</div>
</div>

</body>
</html>