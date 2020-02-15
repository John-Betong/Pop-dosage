<?php 
declare(strict_types=1);
# echo error_reporting();
# echo ini_get('display_errors');
#  die;
$pagetitle  = 'Daily Medication Chart';
$spForum    = 'https://www.sitepoint.com/community/t/verbose-problem-i-would-like-simplifying-because-there-are-lots-more-script-to-follow/347088/9';

?><!DOCTYPE HTML><html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1">
<title> Daily Medication </title>
<link rel="stylesheet" href="incs/style-001.css" media="screen">
</head>
<body>
  <?php require 'incs/_logo.php'; ?>  

 <table id="chart">
  <caption>Courtesy of Coothead </caption>
  <thead>
   <tr>
    <th>
     Drug
    </th>
    <th>
     Meal Time
    </th>
    <th>
     Dosage
    </th>
   </tr>
  </thead>
  <tbody>
   <tr>
    <td>
     Madopar 250mg
    </td>
    <td>
     Before breakfast and before dinner
    </td>
    <td>
     <span>&#188;</span> tablet TWO times per day
    </td>
   </tr><tr>
    <td>
     Azilect 1mg
    </td>
    <td>
     After breakfast
    </td>
    <td>
     One tablet per day
    </td>
   </tr><tr>
    <td>
     Sifrol 0.25 mg
    </td>
    <td>
     After breakfast and after dinner
    </td>
    <td>
     One tablet TWO times per day
    </td>
   </tr><tr>
    <td>
     Zimmex 10 mg
    </td>
    <td>
     After dinner
    </td>
    <td>
     One tablet per day
    </td>
   </tr><tr>
    <td>
     Alprazolam 0.5 mg
    </td>
    <td>
     Before bedtime - may cause drowsiness
    </td>
    <td>
     One tablet per day
    </td>
   </tr><tr>
    <td>
     Cetirizine (Alerest) 10 mg
    </td>
    <td>
     Before bedtime - antihistamine
    </td>
    <td>
     One tablet per day
    </td>
   </tr><tr>
    <td>
     Seretide Accuhaler 50/250 mg. inhaler
    </td>
    <td>
     Every twelve hours, gargle after use
    </td>
    <td>
     One puff
    </td>
   </tr>
  </tbody>
 </table>

</body>
</html>

