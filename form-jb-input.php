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

  <?php # fred('$_POST', $_POST); ?>
    <form class="" action="?" method="post">
      <div class="w88 mga bd1 bdr bgs">
        <?php
          foreach($labels as $key => $label):
            echo '<h2>' .$label .'</h2>';  
            echo '<table class="w88 mga">';
            echo '<tr><th> Drug </th><th> Dose </th><th> time </th></tr>';
              for($i2=0; $i2<3; $i2++) :
                if($i2):
                  //
                else:
                  //
                endif;  
                echo '<tr>';
                  foreach(['drug', 'dose', 'time'] as $idx => $data) : 
                    $tmp = $_POST[$label .'-' .$data .'-' .$i2] 
                          ?? '';
                     # <label><?= $data ? ></label>
                    ?>
                      <td>
                        <input 
                          type  = "text" 
                          name  = "<?= $label .'-' .$data .'-' .$i2 ?>" 
                          value = "<?= $tmp ?>"
                         >
                       </td>  
                     <?php  
                  endforeach;
                echo '</tr>';
              endfor;  
            echo '</table>';
        endforeach ?>

        <p class="tac fsl">
          <input class="bgA w05" type="submit" value=" Submit ">
        </p>  
      </div>  
    </form> 

    <p> <br> </p>

<h2> Dosage Chart: </h2>
  <div class=" w88 mga XXXbga XXXbd1 tac"> 
    <div class="dib">
      <?php 
if(01):      
        // RENDER DATA
        $item = 0;

        foreach($_POST as $key => $value) :
          $meal = strstr($key, '-', TRUE);

          # RESET and ONLY ONE MEAL 
            if(isset($last) && $last===$meal):
              $item ++;
              $item = $item %3;
            else:
              $last = $meal;  
              $item = 0;
              ECHO '<h3 class="ooo tal dib bga"> ' .$meal .'</h3>' ."\n";
            endif;  

          if( empty($value) ):
            //
          else:
            ECHO '<h5 class="tal ooo pa3">' .$value .'</h5>';
          endif;
            ECHO $item >= 2 ? '<br>' ."\n" : NULL; // LAST ITEM
        endforeach;    
endif;
      ?> 
    </div>  
  </div>

<p> <br> </p>
<?php # fred('$_POST', $_POST); ?>

<?php 
$arr1 = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);
$arr1 = $_POST;
$fff = ABR. 'array.json';
file_put_contents($fff, json_encode($arr1));
# array.json => {"a":1,"b":2,"c":3,"d":4,"e":5}
$arr2 = json_decode( file_get_contents($fff), TRUE);
#$arr1 === $arr2 # => true
fred($arr2);
?>

</body>
</html>