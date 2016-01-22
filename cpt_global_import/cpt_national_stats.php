
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../js/jquery.table2excel.js"></script>

<link rel="stylesheet" href="../css/itunetab.css">
<div id="logo" style="float:left;">
<img alt="" src="../img/idata-icon-clear.png" width="32" height="32">
</div>
<div id="menu" style="float:right;">
<a href="../index.html">Menu</a>
</div>
<div id="content" class="content">
<?php
ini_set('display_errors', 'On');
$groupswithaccess="ADMIN";
require_once("../inc.__functions.php");
require_once( "inc.__config.php" );


use \ForceUTF8\Encoding;

$cpt_code       = '';
$year           = 14;
$service_code_checked = '';
$service_code_breakdown = 0;


/******************PROCESS SUBMITTED FORM***********************/
if (array_key_exists('cpt_code', $_REQUEST)) 
{
	$cpt_code      = $_REQUEST['cpt_code'];
	$cpt_code = preg_replace('/\s+/', '', $cpt_code);
	$cpt_code = preg_replace('/[.]/', '', $cpt_code); 
	
}

if (array_key_exists('service_code_breakdown', $_REQUEST)) 
{
	$service_code_checked = "checked='checked'";
	$service_code_breakdown = 1;
}

if (array_key_exists('year', $_REQUEST)) 
{
	$year = $_REQUEST['year'];
}	

echo "<h2>National CPT Procedure Statistics </h2>";
/******************END PROCESS SUBMITTED FORM***********************/
$years = array('2014','2013', '2012', '2011', '2010', '2009', '2008');


$options = '';
foreach ( $years as $yyyy )
{
	
	if ( substr($yyyy, 2, 2) == $year )
		$options .= '<option value="' . substr($yyyy, 2, 2) . '" selected="selected">' . $yyyy . '</option>';
	else
		$options .= '<option value="' . substr($yyyy, 2, 2) . '" >' . $yyyy . '</option>';
	
	
}


$filter =  "<form method='post' action='cpt_national_stats.php'>";
$filter .= "<h4>Enter CPT Procedure Code  (ex:  0012F,00148,0015F... 0015F)</h4>";
$filter .= "<input type='text' name='cpt_code' value=$cpt_code >";
$filter .= "<h4>Breakdown procedure statistics</h4>";
$filter .= "<input type='checkbox'       name='service_code_breakdown'    $service_code_checked    >&nbsp;By Place of Service Code";
$filter .= "<h4>Choose the Year</h4>";
$filter .= "<select name='year'>";
$filter .= $options;
$filter .= "</select><br><br><input type='submit' name='submit'  >";
$filter .= "</form>";


echo $filter . "<br><br>";

if (!array_key_exists('submit', $_REQUEST)) die();

//print_r($_REQUEST);
//die();


$db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DBNAME . ';charset=UTF8', MYSQL_USERNAME, MYSQL_PASSWORD);


echo "<div id='itsthetable'><table id='code_count_table'>";
$table_header = "<tr><th scope='col'>CPT Code</th>";

$colspan = 8;
if ($service_code_breakdown == 1) 
{
	$table_header .="<th scope='col'>Place of Service</th>";
	$colspan += 1;
}




echo '<thead><tr class="noExl"><th colspan="' .$colspan. '" align="right"><div id="export-to-excel"><img alt="" src="../img/excel.png" width="32" height="32"></div></th></tr>';
$table_header .="<th>Submitted Service<br/>Count</th><th>Submitted Charge<br/>Amount </th><th>Allowed Charge<br/>Amount</th><th>Denied Services<br/>Count</th><th>Denied Charge<br/>Amount</th><th>Assigned Services<br/>Count</th><th>NCH Payment<br/>Amount</th></tr></thead>";


echo $table_header;


$cpt_stats = getGlobalCPTStats($cpt_code, $service_code_breakdown,  $year, $db);

$submitted_service_count_sum = 0; 
$submitted_charge_amount_sum = 0;
$allowed_charge_amount_sum   = 0;
$denied_services_count_sum   = 0;
$denied_charge_amount_sum    = 0;
$assigned_services_count_sum = 0;
$nch_payment_amount_sum      = 0;

$class = '';
$records_count = 0;
foreach ($cpt_stats as $cpt)
{
	
	$records_count % 2 == 0 ? $class = "class='odd'":  $class = ''; 
	$record = "<tr $class><th scope='row'>".$cpt['cpt_code'].'</th>';
	if ($service_code_breakdown == 1) $record .= '<td>'.$cpt['service_code_breakdown'].'</td>';
	$record .= '<td>'.$cpt['submitted_service_count'].'</td>';
	$record .= '<td>'.$cpt['submitted_charge_amount'].'</td>';
	$record .= '<td>'.$cpt['allowed_charge_amount'].'</td>';
	$record .= '<td>'.$cpt['denied_services_count'].'</td>';
	$record .= '<td>'.$cpt['denied_charge_amount'].'</td>';
	$record .= '<td>'.$cpt['assigned_services_count'].'</td>';
	$record .= '<td>'.$cpt['nch_payment_amount'].'</td></tr>';	
	echo $record;
	
	$records_count += 1;
	
	$submitted_service_count_sum += $cpt['submitted_service_count']; 
	$submitted_charge_amount_sum += $cpt['submitted_charge_amount'];
	$allowed_charge_amount_sum   += $cpt['allowed_charge_amount'];
	$denied_services_count_sum   += $cpt['denied_services_count'];
	$denied_charge_amount_sum    += $cpt['denied_charge_amount'];
	$assigned_services_count_sum += $cpt['assigned_services_count'];
	$nch_payment_amount_sum      += $cpt['nch_payment_amount'];
	
	
	
	
	
}

echo "</tbody>";
//if ($state_breakdown == 1 or $city_breakdown  == 1 )
//echo "<tfoot><tr><th scope='row'>Total</th><td colspan='$colspan' align='right'>$total_cpt_count </td></tr></tfoot><tbody>";
echo "</table></div>";


if ($records_count > 1)
echo "<br><br>Records:&nbsp;$records_count";

?>


<script>
$("#export-to-excel").click(function(){
$("#itsthetable").table2excel({
 // exclude CSS class
exclude: ".noExl",
   name: "CPT_Diagnosis_Stats"
});
});
</script>








</div>
