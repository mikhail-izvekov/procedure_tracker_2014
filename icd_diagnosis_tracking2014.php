<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/jquery.table2excel.js"></script>

<link rel="stylesheet" href="css/itunetab.css">
<div id="logo" style="float:left;">
<img alt="" src="img/idata-icon-clear.png" width="32" height="32">
</div>
<div id="menu" style="float:right;">
<a href="index.html">Menu</a>
</div>
<div id="content" class="content">
<?php
ini_set('display_errors', 'On');
$groupswithaccess="ADMIN";
require_once("inc.__functions.php");
require_once( "inc.__config.php" );

$icd_code      = null;
$state_checked = null;
$city_checked  = null;
$inout_checked = null;
$op_checked    = null;
$at_checked    = null;
$hospital_checked = null;

$city_breakdown  = 0;
$state_breakdown = 0;
$inout_breakdown = 0;
$op_breakdown    = 0;
$at_breakdown    = 0;
$hospital_breakdown = 0;

$colspan = 2;
/******************PROCESS SUBMITTED FORM***********************/
if (array_key_exists('icd_code', $_REQUEST)) 
{
	$icd_code      = $_REQUEST['icd_code'];
	$icd_code = preg_replace('/\s+/', '', $icd_code);
	$icd_code = preg_replace('/[.]/', '', $icd_code); 
	
}

if (array_key_exists('state_breakdown', $_REQUEST)) 
{
	$state_checked = "checked='checked'";
	$state_breakdown = 1;
}	
if (array_key_exists('city_breakdown', $_REQUEST))  
{
	$city_checked  = "checked='checked'";
	$city_breakdown = 1;
}		

if (array_key_exists('inout_breakdown', $_REQUEST))  
{
	$inout_checked  = "checked='checked'";
	$inout_breakdown = 1;
}	

if (array_key_exists('at_breakdown', $_REQUEST))  
{
	$at_checked  = "checked='checked'";
	$at_breakdown = 1;
}	

if (array_key_exists('op_breakdown', $_REQUEST))  
{
	$op_checked  = "checked='checked'";
	$op_breakdown = 1;
}	

if (array_key_exists('hospital_breakdown', $_REQUEST))  
{
	$hospital_checked  = "checked='checked'";
	$hospital_breakdown = 1;
}	

echo "<h2>ICD Diagnosis Tracker 2014</h2>";
/******************END PROCESS SUBMITTED FORM***********************/


$filter =  "<form method='post' action='icd_diagnosis_tracking2014.php'>";
$filter .= "<h4>Enter ICD Diagnosis Code (ex: 00329)</h4>";
$filter .= "<input type='text' name='icd_code' value=$icd_code >";
$filter .= "<h4>Breakdown diagnosis count</h4>";
$filter .= "<input type='checkbox'       name='state_breakdown'    $state_checked    >&nbsp;By State";
$filter .= "<br><input type='checkbox'   name='city_breakdown'     $city_checked     >&nbsp;By City";
$filter .= "<br><input type='checkbox'   name='hospital_breakdown' $hospital_checked >&nbsp;By Hospital";
$filter .= "<br><input type='checkbox'   name='at_breakdown'       $at_checked       >&nbsp;By Attending Physician";
$filter .= "<br><input type='checkbox'   name='op_breakdown'       $op_checked       >&nbsp;By Operating Physician";
$filter .= "<br><input type='checkbox'   name='inout_breakdown'    $inout_checked    >&nbsp;By IN/OUT Patient";
$filter .= "<br><br><input type='submit' name='submit'  >";
$filter .= "</form>";


echo $filter;

if (!array_key_exists('submit', $_REQUEST)) die();
if ( $icd_code == ''  or !is_numeric(preg_replace('/[,]/', '', $icd_code)))
{
	echo "<br><br><h4 class='error'>ICD Code must be a number!</h4>";
	die();
}

echo "<div id='itsthetable'><table>";

$table_header = "<tr><th scope='col'>ICD Code</th>";
if ($state_breakdown == 1) 
{
	$table_header .="<th scope='col'>State</th>";
	$colspan += 1;
}
if ($city_breakdown  == 1) 
{
	$table_header .="<th scope='col'>City</th>";
	$colspan += 1;
}
if ($op_breakdown  == 1) 
{
	$table_header .="<th scope='cpl'>Operating Physician</th>";
	$colspan += 1;
}
if ($at_breakdown  == 1) 
{
	$table_header .="<th scope='col'>Attending Physician</th>";
	$colspan += 1;
}
if ($hospital_breakdown  == 1) 
{
	$table_header .="<th scope='col'>Hospital</th>";
	$colspan += 1;
}
if ($inout_breakdown == 1) 
{
	$table_header .="<th scope='col'>IN-OUT Patient</th>";
	$colspan += 1;
}
$table_header .="<th scope='col'>Diagnosis Count</th></tr></thead>";




//echo '<thead><tr><td colspan="' .$colspan. '" align="right"><button id="export-to-excel">Export to Excel</button></td></tr></thead>';
echo '<thead><tr class="noExl"><th colspan="' .$colspan. '" align="right"><div id="export-to-excel"><img alt="" src="img/excel.png" width="32" height="32"></div></th></tr>';
echo $table_header;


$icd_counts = getISDDiagnosisCount($icd_code, $state_breakdown,  $city_breakdown, $inout_breakdown, $hospital_breakdown, $at_breakdown, $op_breakdown );

$records_count = 0;
$total_icd_count = 0;
$class = '';

foreach ($icd_counts as $icd_count)
{
	$records_count % 2 == 0 ? $class = "class='odd'":  $class = ''; 
	$record = "<tr $class><th scope='row'>".$icd_count['icd_code'].'</th>';
	if ($state_breakdown == 1) $record .= '<td>'.$icd_count['state'].'</td>';
	if ($city_breakdown == 1) $record  .= '<td>'.$icd_count['city'].'</td>';
	if ($hospital_breakdown == 1) $record  .= '<td><a href="provider_lookup.php?npi='.$icd_count['hospital'].'">'.$icd_count['hospital'].'</a></td>'   ; 
	if ($at_breakdown == 1) $record    .= '<td><a href="provider_lookup.php?npi='.$icd_count['at_npi'].'">'.$icd_count['at_npi'].'</a></td>'   ; 
	if ($op_breakdown == 1) $record    .= '<td><a href="provider_lookup.php?npi='.$icd_count['op_npi'].'">'.$icd_count['op_npi'].'</a></td>'   ; 
	if ($inout_breakdown == 1) $record .= '<td>'.$icd_count['inout'].'</td>';	
	$record .= '<td>'.$icd_count['icd_count'].'</td></tr>';	
	echo $record;
	
	$records_count += 1;
	$total_icd_count += $icd_count['icd_count'];
	
	
}

echo "</tbody>";
//if ($state_breakdown == 1 or $city_breakdown  == 1 )
//echo "<tfoot><tr><th scope='row'>Total</th><td colspan='$colspan' align='right'>$total_icd_count </td></tr></tfoot><tbody>";
echo "</table></div>";


if ($records_count > 1 )
echo "<br><br>Records:&nbsp;$records_count &nbsp;&nbsp;Total diagnosis count:&nbsp;$total_icd_count";

?>

	</table>
</div>
<script>
$("#export-to-excel").click(function(){
$("#itsthetable").table2excel({
 // exclude CSS class
exclude: ".noExl",
   name: "ICD_Diagnosis_Stats"
});
});
</script>	

<?php
//echo "<pre>";
//echo 'Active view mode ' . $active_view_mode;
//print_r($subcategories);
//print_r ($_REQUEST);
//print_r ('SESSION');
//print_r ($_SESSION);
//echo "</pre>";
 ?>
