<?php 
declare(strict_types=1);
# echo error_reporting();
# echo ini_get('display_errors');
#  die;
define('INDEX_PHP', TRUE); 

$pagetitle  = 'Daily Medication Chart';
$spForum    = 'https://www.sitepoint.com/community/t/verbose-problem-i-would-like-simplifying-because-there-are-lots-more-script-to-follow/347088/9';

# MENU
  $tmp = 'to get drug, time of day and dosage';
  $aLinks = [
    'chart-coothead'    => 'Chart using a table and ordered by time of day ',
    'chart-jb'          => 'Chart using document definition display by 
                            time of day',
    'form-jb-input'     => 'Form using 3xinputs ' .$tmp,
    'form-jb-textarea'  => 'form using single textarea ' .$tmp,
    'drummon-002'       => 'ver:002 - form using table ' .$tmp,
    'drummon-003'       => 'ver:003 - form using table ' .$tmp
  ];
  $links = '<div class="tal ">';
  foreach($aLinks as $link => $blurb):
    $links .= <<< ____EOT
      <dl>
        <dt>
          <a href="$link.php"> $link </a> 
       </dt>
       <dd> $blurb </dd>
      </dl>  
____EOT;
  endforeach;
  $links .= '</div>';

  $menu   = <<< ____EOT
    <div class="dib mga tac fsl">
      $links
    </div>    
____EOT;

?><!DOCTYPE HTML><html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1">
<title> Daily Medication </title>
<link rel="stylesheet" href="incs/style-001.css" media="screen">
</head>

<body>
  <?php require 'incs/_logo.php'; ?>

  <div class="tac ">  
    <?= $menu ?>
  </div>  
</body>
</html>

