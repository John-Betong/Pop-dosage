<?php
declare(strict_types=1);

session_start(); 

  $pagetitle  = "Daily Medication Chart";
  $pagesub    = "drummon-003.php";

  $pagename   = "drummon-003.php";
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
            
  $data['medications']['after_dinner']['record_id'][2] = '29';
  $data['medications']['after_dinner']['Drug'][2] = 'Zimmex 10 mg';
  $data['medications']['after_dinner']['Time'][2] = 'After dinner';
  $data['medications']['after_dinner']['Dose'][2] = 'One tablet per day';
     
  $data['medications']['bed_time']['record_id'][1] = '30';
  $data['medications']['bed_time']['Drug'][1] = 'Alprazolam 0.5 mg';
  $data['medications']['bed_time']['Time'][1] = 'Before bedtime - may cause drowsiness';
  $data['medications']['bed_time']['Dose'][1] = 'One tablet per day';
                                    
  $data['medications']['bed_time']['record_id'][2] = '31';
  $data['medications']['bed_time']['Drug'][2] = 'Cetirizine (Alerest) 10 mg';
  $data['medications']['bed_time']['Time'][2] = 'Before bedtime - antihistamine';
  $data['medications']['bed_time']['Dose'][2] = 'One tablet per day';
                  
  $data['medications']['odd_balls']['record_id'][1] = '32';
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
//Delete Record 
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_record'])):
  $sql_delete_record = "DELETE FROM patient_medications WHERE id = ?";
  $d_record_id = array_search('Remove',$_POST['remove_record']);  
  
  echo $sql_delete_record.'<br />'.$d_record_id.'<br /><br />';
   
  //$query_delete_record = $conn->prepare($sql_delete_record);    
  //$query_delete_record->bind_param("i", $med_record_id);    
  //$query_delete_record->execute();  
  
  
  unset($_SESSION['rowstoshow']); 
  header("refresh: 2; URL=".$pagename);       
endif;
//////////////////////////////////////////////////// 
////////////////////////////////////////////////////
//Insert/Update 
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['savedata'])):  
  /*
  echo "<pre>";
  print_r($_POST); 
  echo "</pre>";
  */
  
  $errors = array();
  $error_message = array();  
  
  $required_fields = array('Drug','Dose');
  
  if(empty($_POST['patient_id'])):
    $errors['patient_id'] = ' style="border-color:red;" title="Please select a Category"'; 
    $error_message[] = 'Patient selection is required'; 
  endif;
  
  foreach($medicationtimes as $medtime => $medtimedisplay):
    //only check  Med. times that has been posted.
    if(array_key_exists($medtime,$_POST)):
      //check required fields
      foreach($required_fields as $rfield): 
        foreach($_POST[$medtime][$rfield] as $k => $v):
          if(empty($_POST[$medtime][$rfield][$k])):
            $message = $rfield.' input field is required';  
            $errors[$medtime][$rfield][$k] = ' style="border-color:red;" title="'.$message.'"'; 
            $error_message[$message] = $message;  
          endif; 
        endforeach;
      endforeach;
    endif; 
  endforeach;  

  if(empty($errors)):  
  
     //Here we are checking for med records that might be removed
    foreach($medicationtimes as $medtime => $medtimedisplay):   
    
      if(!empty($data['medications']) && array_key_exists($medtime,$data['medications'])): 
      
        //Has No POST records for this med time
        if(!array_key_exists($medtime,$_POST)): 
          $sql_delete_meds = "DELETE FROM patient_medications WHERE patient_id = ? AND medication_time = ?";
          
          echo $sql_delete_meds.'<br />'.$_POST['patient_id'].', '.$medtime.'<br /><br />';
           
          //$query_delete_meds = $conn->prepare($sql_delete_meds);    
          //$query_delete_meds->bind_param("ss", $_POST['patient_id'], $medtime);     
          //$query_delete_meds->execute();  
        endif;
        
        //Has POST records for this med time.  Check for removed record
        if(array_key_exists($medtime,$_POST)):  
        
          $dif = array_diff($data['medications'][$medtime]['record_id'],$_POST[$medtime]['record_id']);
                 
          if(!empty($dif)): 
            foreach($dif as $med_record_id): 
              $sql_delete_med_record = "DELETE FROM patient_medications WHERE id = ?"; 
              
              echo $sql_delete_med_record.'<br />'.$med_record_id.'<br /><br />';
               
              //$query_delete_med_record = $conn->prepare($sql_delete_med_record);    
              //$query_delete_med_record->bind_param("i", $med_record_id);    
              //$query_delete_med_record->execute();
            endforeach;
          endif;
        endif;
      endif;
      //Insert or update
      if(array_key_exists($medtime,$_POST)): 
        foreach($_POST[$medtime]['record_id'] as $k => $v):
          if(empty($_POST[$medtime]['record_id'][$k])):
            $sql_insert_med_record = "INSERT INTO patient_medications (`patient_id`,`patient_name`,`medication_time`,`Drug`,`Time`,`Dose`) VALUES (?,?,?,?,?,?)"; 
            
            echo $sql_insert_med_record.'<br />'.$_POST['patient_id'].', '.$_POST['patient_name'].', '.$medtime.', '.$_POST[$medtime]['Drug'][$k].', '.$_POST[$medtime]['Time'][$k].', '.$_POST['Dose'].'<br /><br />';
            //$query_insert_med_record= $conn->prepare($sql_insert_med_record);   
            //$query_insert_med_record->bind_param("isssss", $_POST['patient_id'], $_POST['patient_name'], $_POST[$medtime], $_POST[$medtime]['Drug'][$k], $_POST[$medtime]['Time'][$k], $_POST['Dose']); 
                
            //$query_insert_med_record->execute(); 
          
          endif;   
          
          if(!empty($_POST[$medtime]['record_id'][$k])):
            $sql_update_med_record = "UPDATE patient_medications SET 
             `medication_time` = ?
            ,`Drug` = ?
            ,`Time` = ?
            ,`Dose` = ?
            WHERE id = ?";
                 
            echo $sql_update_med_record.'<br />'.$medtime.', '.$_POST[$medtime]['Drug'][$k].', '.$_POST[$medtime]['Time'][$k].', '.$_POST[$medtime]['Dose'][$k].', '.$_POST[$medtime]['record_id'][$k].'<br /><br />';
            
            //$query_update_med_record= $conn->prepare($sql_update_med_record);   
            //$query_update_med_record->bind_param("ssssi", $_POST[$medtime], $_POST[$medtime]['Drug'][$k], $_POST[$medtime]['Time'][$k], $_POST[$medtime]['Dose'][$k], $_POST[$medtime]['record_id'][$k]); 
                
            //$query_update_med_record->execute(); 
          
          endif;
        endforeach;
      endif;  
    endforeach;
  
    unset($_SESSION['rowstoshow']); 
    header("refresh: 4; URL=".$pagename);       
       
  endif;     
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
<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
-->
<link rel="stylesheet" href="incs/style-001.css" media="screen">

</head>
<body> 
  <?php require 'incs/_logo.php'; ?>  

  <?php
    if(!empty($error_message))
    {
      echo '<div class="message error">'
      .implode('<br />',$error_message)
      .'</div>';
    }  
  ?>
  
<?php
echo '<form action="'.$pagename.'" method="post">'."\r";
  echo '<div class="insertdata">'."\r";  
    
    $patient_id = (!empty($data['patient_info']['patient_id']) ? $data['patient_info']['patient_id'] : ''); 
    $patient_name = (!empty($data['patient_info']['patient_name']) ? $data['patient_info']['patient_name'] : '');
      
    $patient_id = (isset($_POST['patient_id']) ? $_POST['patient_id'] : $patient_id);
    $patient_name = (isset($_POST['patient_name']) ? $_POST['patient_name'] : $patient_name);   
    
    echo '<input type="hidden" name="patient_id" value="'.$patient_id.'">'."\r";  
    echo '<input type="hidden" name="patient_name" value="'.$patient_name.'">'."\r";  
    
    echo '<h2>&nbsp;<i>Patient:</i> '.$patient_name.'</h2>'."\r"; 
    
    $cols = count($fields)+2;  
    
    echo '<table>'."\r";
    foreach($medicationtimes as $medtime => $medtimedisplay): 
      $disabled = (empty($_SESSION['rowstoshow'][$medtime]) ? ' disabled' : '');
        echo '<tr>
          <th colspan="'.$cols.'"><div class="heading">'.$medtimedisplay.'</div>
            <input type="submit" class="btn btn-primary sm-btn" name="add_med_row['.$medtime.']" value="Add Row" />
            <input type="submit" class="btn btn-primary sm-btn" name="remove_med_row['.$medtime.']" value="Remove Row"'.$disabled.' />
          </th>
        </tr>'."\r";
          
        if(!empty($_SESSION['rowstoshow'][$medtime])):
                
          echo '<tr class="subheading">'."\r"; 
            echo '<td style="width:50px;">&nbsp;</td>'."\r";  
            foreach($fields as $field): 
              echo '<td>'.$field.'</td>'."\r";  
            endforeach;   
            echo '<td style="width:50px;">&nbsp;</td>'."\r";
          echo '</tr>'."\r";
        
          for($l=1;$l<=$_SESSION['rowstoshow'][$medtime];$l++): 
          
            
            $record_id = (!empty($data['medications'][$medtime]['record_id'][$l]) ? $data['medications'][$medtime]['record_id'][$l] : '');
            echo '<tr>'."\r"; 
              $record_field = "record_id";
              echo '<td style="width:50px;">'.$l.'&nbsp;<input type="hidden" name="'.$medtime.'['.$record_field.']['.$l.']" value="'.$record_id.'" /></td>'."\r"; 
              foreach($fields as $field):
              
                $datavalue = (!empty($data['medications'][$medtime][$field][$l]) ? $data['medications'][$medtime][$field][$l] : '');
                $inputvalue = (!empty($_POST[$medtime][$field][$l]) ? $_POST[$medtime][$field][$l] : $datavalue); 
                
                
                $input_error = (!empty($errors[$medtime][$field][$l]) ? $errors[$medtime][$field][$l] : '');
                $disable_remove_record = (empty($record_id) ? ' disabled' : '');
                                
                echo '<td><input type="text" name="'.$medtime.'['.$field.']['.$l.']" value="'.$inputvalue.'"'.$input_error.' /></td>'."\r"; 
              endforeach;  
              echo '<td><input type="submit" class="btn sm-btn bgA" name="remove_record['.$record_id.']" value="Remove"'.$disable_remove_record.' /></td>'."\r";  
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
<p> <br> <br> </p>

<?php if(count($_GET)): ?>
  <pre class="w88 mga tal bd1">
    <?php
      $src = $_GET['src'] && 'drummin'===$_GET['src'] ?? NULL;
      if($src) :
        highlight_file(__FILE__);
      else:  
        print_r($data); 
      endif;  
    ?>
  </pre>  
  <p> <br><br><br> </p>
<?php endif; ?>

</body>
</html>