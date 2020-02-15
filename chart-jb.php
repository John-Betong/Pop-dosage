<?php 
declare(strict_types=1);
# echo error_reporting();
# echo ini_get('display_errors');
#  die;
$title 			= 'Daily Medication Chart';
$pagetitle 	= 'Daily Medication Chart';
$spForum  	= 'https://www.sitepoint.com/community/t/verbose-problem-i-would-like-simplifying-because-there-are-lots-more-script-to-follow/347088/9';

$breakfastBefore 	= [
	['Madopar 250mg',  		'Before breakfast and before dinner', 	'¼ tablet TWO times per day'],
];

$breakfastAfter 	= [
	['Azilect 1mg' ,   		'After breakfast' , 'One tablet per day'],
	['Sifrol 0.25 mg', 		'After breakfast and after dinner', 	'One tablet TWO times per day'],
];

$lunchBefore 	= [
];

$lunchAfter 	= [
	];

$dinnerBefore 	= [
	['Madopar 250mg',  		'Before breakfast and before dinner', 	'¼ tablet TWO times per day'],
];

$dinnerAfter 	= [
	['Sifrol 0.25 mg', 		'After breakfast and after dinner', 	'One tablet TWO times per day'],
	['Zimmex 10 mg',   		'After dinner', 'One tablet per day'],
];	

$sleepBefore 	= [
	['Alprazolam 0.5 mg', 	'Before bedtime - may cause drowsiness', 'One tablet per day'],
	['Cetirizine (Alerest) 10 mg' , 'Before bedtime - antihistamine', 'One tablet per day'],
];		

$others	= [
	['Seretide Accuhaler 50/250 mg inhaler', '&nbsp;', 'Every twelve hours, gargle after use - One puff'],
];

//=========================================================
function showMeds
(
	string $title = '',
	array $meds 	= []
)
: string 
{
	$result = '<h2>' .$title .'</h2>';

	foreach($meds as $key => $med) :
		$result .= <<< ______EOT
			<dl class="w88 mga">
				<dt> {$med[0]} </dt>
				<dd> {$med[2]} </dd>
				<dd> {$med[1]} </dd>
			</dl>	
______EOT;
	endforeach;

	return $result;
}


?><!DOCTYPE HTML><html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1">
<title> <?= $title ?> </title>
<link rel="stylesheet" href="incs/style-001.css" media="screen">
</head>
<body>
	<?php require 'incs/_logo.php'; ?>  

	<div class="w88 mga bd1 bdr bgs"> 

	<?php
		echo showMeds('Wake up', $breakfastBefore);

		echo showMeds('Breakfast', $breakfastAfter); 

		echo showMeds('Lunch before', $lunchBefore);
		
		echo showMeds('Lunch', $lunchAfter); 

		echo showMeds('Dinner before', $dinnerBefore); 
	
		echo showMeds('diner after', $dinnerAfter) ;
	
		echo showMeds('Odd balls', $others);
	?>
</div>

<p> &nbsp;  </p>

<div class="w88 mga bgs bdr"> 
	<?= highlight_file(__file__, TRUE); ?> 
</div>
</body>
</html>

