<?php
declare(strict_types=1);
# error_reporting(-1);
# ini_set('display_errors', '1');
session_start(); 

  $pagetitle  = "Daily Medication Chart";
  $pagename   = "drummon-001.php";
  $medicationtimes = array(
   'before_breakfast' => 'Before Breakfast'
  ,'after_breakfast' => 'After Breakfast'
  ,'before_lunch' => 'Before Lunch'
  ,'after_lunch' => 'After Lunch'
  ,'before_dinner' => 'Before Dinner'
  ,'after_dinner' => 'After Dinner'
  ,'bed_time' => 'Bed Time'
  ,'odd_balls' => 'Odd Balls'); 
  
  $fields = array('Drug','Dose','Time');
                
  //////////////////////////////////////////////////// 
  ////////////////////////////////////////////////////
  //Clear
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clear'])):
    unset($_SESSION['rowstoshow']);
  endif;
  //////////////////////////////////////
  ////////////////////////////////////// 
  //SAMPLE DATA  
  
  $data['patient_info']['patient_id'] = '245578';
  $data['patient_info']['patient_name'] = 'Sam Sample';  
  
  $data['medications']['before_breakfast']['record_id'][1] = '24';
  $data['medications']['before_breakfast']['Drug'][1] = 'Madopar 250mg';
  $data['medications']['before_breakfast']['Time'][1] = 'Before breakfast and before dinner';
  $data['medications']['before_breakfast']['Dose'][1] = '1/4 tablet TWO times per day'; 
  
  $data['medications']['after_breakfast']['record_id'][1] = '25';
  $data['medications']['after_breakfast']['Drug'][1] = 'Azilect 1mg';
  $data['medications']['after_breakfast']['Time'][1] = 'After breakfast';
  $data['medications']['after_breakfast']['Dose'][1] = 'One tablet per day';
                                          
  $data['medications']['after_breakfast']['record_id'][2] = '26';
  $data['medications']['after_breakfast']['Drug'][2] = 'Sifrol 0.25 mg';
  $data['medications']['after_breakfast']['Time'][2] = 'After breakfast and after dinner';
  $data['medications']['after_breakfast']['Dose'][2] = 'One tablet TWO times per day';
          
  $data['medications']['before_dinner']['record_id'][1] = '27';
  $data['medications']['before_dinner']['Drug'][1] = 'Madopar 250mg';
  $data['medications']['before_dinner']['Time'][1] = 'Before breakfast and before dinner';
  $data['medications']['before_dinner']['Dose'][1] = '1/4 tablet TWO times per day';  
                                          
  $data['medications']['after_dinner']['record_id'][1] = '28';
  $data['medications']['after_dinner']['Drug'][1] = 'Sifrol 0.25 mg';
  $data['medications']['after_dinner']['Time'][1] = 'After breakfast and after dinner';
  $data['medications']['after_dinner']['Dose'][1] = 'One tablet TWO times per day';
            
  $data['medications']['after_dinner']['record_id'][2] = '28';
  $data['medications']['after_dinner']['Drug'][2] = 'Zimmex 10 mg';
  $data['medications']['after_dinner']['Time'][2] = 'After dinner';
  $data['medications']['after_dinner']['Dose'][2] = 'One tablet per day';
     
  $data['medications']['bed_time']['record_id'][1] = '29';
  $data['medications']['bed_time']['Drug'][1] = 'Alprazolam 0.5 mg';
  $data['medications']['bed_time']['Time'][1] = 'Before bedtime - may cause drowsiness';
  $data['medications']['bed_time']['Dose'][1] = 'One tablet per day';
                                    
  $data['medications']['bed_time']['record_id'][2] = '30';
  $data['medications']['bed_time']['Drug'][2] = 'Cetirizine (Alerest) 10 mg';
  $data['medications']['bed_time']['Time'][2] = 'Before bedtime - antihistamine';
  $data['medications']['bed_time']['Dose'][2] = 'One tablet per day';
                  
  $data['medications']['odd_balls']['record_id'][1] = '31';
  $data['medications']['odd_balls']['Drug'][1] = 'Seretide Accuhaler 50/250 mg inhaler';
  $data['medications']['odd_balls']['Time'][1] = '';
  $data['medications']['odd_balls']['Dose'][1] = 'Every twelve hours, gargle after use - One puff';
   
  // END Sample Data
  
  // query for data 
  
  // A few Sample rows of data from query
/*
  $rowdata = array( 
    0 => array(
       'patient_id' => '2455784'
      ,'patient_name' => 'Sam Sample' 
      ,'record_id' => '24'
      ,'medication_time' => 'before_breakfast'
      ,'Drug' => 'Madopar 250mg'
      ,'Time' => 'Before breakfast and before dinner'
      ,'Dose' => '1/4 tablet TWO times per day'),
    1 => array(
       'patient_id' => '2455784'
      ,'patient_name' => 'Sam Sample' 
      ,'record_id' => '25'
      ,'medication_time' => 'after_breakfast'
      ,'Drug' => 'Azilect 1mg'
      ,'Time' => 'After breakfast'
      ,'Dose' => 'One tablet per day')
  ); 
  
  //Build array from result sample

  $data = array();
  $med_time_cnt = array();
  foreach($rowdata as $row){
  //while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
  
    $med_time_cnt[$row['medication_time']] = (!array_key_exists($row['medication_time'],$med_time_cnt) ? 1 : $med_time_cnt[$row['medication_time']]+1);
    
    $data['patient_info']['patient_id'] = $row['patient_id'];
    $data['patient_info']['patient_name'] = $row['patient_name'];  
    
    $data['medications'][$row['medication_time']]['record_id'][$med_time_cnt[$row['medication_time']]] = $row['record_id'];
    $data['medications'][$row['medication_time']]['Drug'][$med_time_cnt[$row['medication_time']]] = $row['Drug'];
    $data['medications'][$row['medication_time']]['Time'][$med_time_cnt[$row['medication_time']]] = $row['Time'];
    $data['medications'][$row['medication_time']]['Dose'][$med_time_cnt[$row['medication_time']]] = $row['Dose']; 
  
  }          
*/
  
/*  
echo "<pre>";
print_r($data); 
echo "</pre>";
*/  
//////////////////////////////////////////////////// 
////////////////////////////////////////////////////
//Set rows to show from data
if(empty($_SESSION['rowstoshow']) && !empty($data['medications'])):
  foreach($medicationtimes as $medtime => $medtimedisplay): 
    $_SESSION['rowstoshow'][$medtime] = (!empty($data['medications'][$medtime]['record_id']) ? count($data['medications'][$medtime]['record_id']) : 0);
  endforeach;
endif; 
/*
echo "<pre>";
print_r($_SESSION['rowstoshow']); 
echo "</pre>";
*/
//////////////////////////////////////////////////// 
////////////////////////////////////////////////////
//Insert/Update 
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['savedata'])):  


  /*
  echo "<pre>";
  print_r($_POST); 
  echo "</pre>"; 
  */             
endif;
//////////////////////////////////////////////////// 
////////////////////////////////////////////////////     
       
if(empty($_SESSION['rowstoshow']) && empty($data)):
  $_SESSION['rowstoshow'] = array();
  foreach($medicationtimes as $medtime => $medtimedisplay):
    $_SESSION['rowstoshow'][$medtime] = 0;
  endforeach;
endif;

//////////////////////////////////////////////////// 
////////////////////////////////////////////////////
                   
if(isset($_POST['add_med_row'])):
  $timekeys = array_keys($_POST['add_med_row']);
  $timekey = $timekeys[0];
  $_SESSION['rowstoshow'][$timekey]++;
endif;

if(isset($_POST['remove_med_row'])): 
  $timekeys = array_keys($_POST['remove_med_row']);
  $timekey = $timekeys[0];
  if(!empty($_SESSION['rowstoshow'][$timekey])):
    $_SESSION['rowstoshow'][$timekey]--;
  endif;
endif;
      
//////////////////////////////////////////////////// 
//////////////////////////////////////////////////// 
/*
echo "<pre>";
print_r($_SESSION['rowstoshow']); 
echo "</pre>";
*/
//////////////////////////////////////////////////// 
////////////////////////////////////////////////////
?>
<!DOCTYPE HTML><html  lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1">
<title><?php echo $pagetitle;?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!--
<link rel="stylesheet" href="style-001.css" media="screen">
-->
<style>
.logo {
    position: fixed; left: 0; top: 0; 
    background-color: #eeef; color: #000; 
    width: 100%;
    text-align: center;
    border-bottom: solid 2px #888;
}   
.bd1 {border: solid 1px #ccc;}
.bga {background-color: #eef; color: #000;}
.bgs {background-color: snow; color: #333;}
.fll {float: left;} .flr{float:right;}
.fsl {font-size: large;}
.mga {margin: 0 auto;}
.p42 {padding: 0.42em;}
.tac {text-align: center;} .tar {text-align: right;}
.w88 {width: 88%; max-width: 888px;}  
  
.sm-btn{padding: 1px 2px; margin:0 10px; float:right;}
.left{float:left;}  
.right{float:right;}  
.heading{width:140px; float:left;}
.insertdata {
  background-color:#FFFFFF;
  color:#000000;  
  font-family: Arial;
  font-size: 15px;
  width:1150px;
  margin:1px auto;
  overflow:hidden;
  padding:0;
  border:1px solid #A4BADD; 
  -moz-border-radius: 6px 6px 6px 6px;
  -webkit-border-radius: 6px 6px 6px 6px;
  border-radius: 6px 6px 6px 6px;
}
.insertdata table{
  width:100%;
}
.insertdata th{
  background-color:#E8E8E8;
  color:#000000;
  font-size: 18px;
  line-height: 26px;
  font-weight:bold;
  text-align:left;
  white-space:nowrap;
  padding:4px 6px;  
  border-bottom:1px solid #A4BADD;
}
.insertdata td{
  color:#000000;
  background-color:#FFFFFF;
  font-weight:normal;
  font-size: 15px;
  white-space:nowrap;
  padding:3px 6px; 
  border-bottom:1px solid #EDF1F9;
}  
.insertdata .subheading td{ 
  color:#5A5A5A;
  background-color:#F8F8F8;
  font-size: 15px;
  text-align:center;
  font-weight:bold;
  white-space:nowrap;
  padding:3px 6px;
}

.insertdata input[type="text"]{
  width:100%;
  height:36px;
  margin:0 auto; 
  border: 1px solid #cccccc;
  border-radius: 6px; 
}
</style>

</head>
<body>
  <?php require '_logo.php'; ?>  

<?php
echo '<form action="'.$pagename.'" method="post">'."\r";
  echo '<div class="insertdata">'."\r";  
    
    $patient_id = (!empty($data['patient_info']['patient_id']) ? $data['patient_info']['patient_id'] : ''); 
    $patient_name = (!empty($data['patient_info']['patient_name']) ? $data['patient_info']['patient_name'] : '');  
    
    echo '<input type="hidden" name="patient_id" value="'.$patient_id.'">'."\r";  
    echo '<h2>&nbsp;<i>Patient:</i> '.$patient_name.'</h2>'."\r"; 
    
    $cols = count($fields)+1;  
    
    echo '<table>'."\r";
    foreach($medicationtimes as $medtime => $medtimedisplay):
        echo '<tr>
          <th colspan="'.$cols.'"><div class="heading">'.$medtimedisplay.'</div>
            <input type="submit" class="btn btn-primary sm-btn" name="add_med_row['.$medtime.']" value="Add Row" />
            <input type="submit" class="btn btn-primary sm-btn" name="remove_med_row['.$medtime.']" value="Remove Row" />
          </th>
        </tr>'."\r";
          
        if(!empty($_SESSION['rowstoshow'][$medtime])):

          echo '<tr class="subheading">'."\r"; 
            echo '<td style="width:50px;">&nbsp;</td>'."\r";  
            foreach($fields as $field): 
              echo '<td>'.$field.'</td>'."\r";  
            endforeach;   
          echo '</tr>'."\r";
        
          for($l=1;$l<=$_SESSION['rowstoshow'][$medtime];$l++): 
          
            
            $record_id = (!empty($data['medications'][$medtime]['record_id'][$l]) ? $data['medications'][$medtime]['record_id'][$l] : '');
            echo '<tr>'."\r"; 
            
              echo '<td style="width:50px;">'
                    . $l
                    . '&nbsp;<input type="hidden" name="'
                    . $medtime .'[record_id]['.$l.']" value="'.$record_id.'" /></td>'
                    ."\r"
                    ;
              # echo '<td style="width:50px;">'.$l.'&nbsp;<input type="hidden" name="'.$medtime.'[\'record_id\']['.$l.']" value="'.$record_id.'" /></td>'."\r"; 
              foreach($fields as $field):
              
                $datavalue = (!empty($data['medications'][$medtime][$field][$l]) ? $data['medications'][$medtime][$field][$l] : '');
                $inputvalue = (!empty($_POST[$medtime][$field][$l]) ? $_POST[$medtime][$field][$l] : $datavalue); 
                                
                echo '<td><input type="text" name="'.$medtime.'['.$field.']['.$l.']" value="'.$inputvalue.'" /></td>'."\r"; 
              endforeach;  
            echo '</tr>'."\r";      
          endfor;   
        endif;  
          
    endforeach; 
      echo '<tr>
        <th colspan="'.$cols.'">                         
          <input type="submit" class="btn btn-primary sm-btn right" name="savedata" value="Save"> 
          <input type="submit" class="btn btn-primary sm-btn left" name="clear" value="Clear">
        </th>
      </tr>'."\r";  
    
    echo '</table> '."\r";
  echo '</div> '."\r";  
echo '</form> '."\r";
?>
</body>
</html>