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


$colspan = 2;
/******************PROCESS SUBMITTED FORM***********************/
if (array_key_exists('icd_code', $_REQUEST)) 
{
	$icd_code      = $_REQUEST['icd_code'];
	$icd_code = preg_replace('/\s+/', '', $icd_code);
	$icd_code = preg_replace('/[.]/', '', $icd_code); 
	
}

echo "<h2>Inpatient ICD Procedure Summary Per Hospital 2013</h2>";
/******************END PROCESS SUBMITTED FORM***********************/


$filter =  "<form method='post' action='icd_in_hospital_stats_2013.php'>";
$filter .= "<h4>Enter ICD Procedure Code   (ex: 8152,8153,8154... 8164)</h4>";
$filter .= "<input type='text' name='icd_code' value=$icd_code >";
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

$table_header = "<tr><th scope='col'>NPI</th>";
//$table_header .= "<th scope='col'>Provider Type</th>";
$table_header .= "<th scope='col'>Replacement NPI</th>";
//$table_header .= "<th scope='col'>Employer Identification Number</th>";
$table_header .= "<th scope='col'>Organization</th>";
//table_header .= "<th scope='col'>Last Name</th>";
//$table_header .= "<th scope='col'>First Name</th>";
//$table_header .= "<th scope='col'>Middle Name</th>";
$table_header .= "<th scope='col'>Other Organization</th>";
$table_header .= "<th scope='col'>Business Address</th>";
$table_header .= "<th scope='col'>City</th>";
$table_header .= "<th scope='col'>State</th>";
$table_header .= "<th scope='col'>Postal Code</th>";
$table_header .= "<th scope='col'>Country</th>";
$table_header .= "<th scope='col'>Telephone</th>";
$table_header .= "<th scope='col'>Fax</th>";
$table_header .= "<th scope='col'>Practice Location Address</th>";
$table_header .= "<th scope='col'>City</th>";
$table_header .= "<th scope='col'>State</th>";
$table_header .= "<th scope='col'>Postal Code</th>";
$table_header .= "<th scope='col'>Country</th>";
$table_header .= "<th scope='col'>Telephone</th>";
$table_header .= "<th scope='col'>Fax</th>";
$table_header .= "<th scope='col'>Last Updated</th>";
$table_header .= "<th scope='col'>Deactivation Reason Code</th>";

$table_header .="<th scope='col'>Procedure Count</th></tr></thead><tbody>";






//echo '<thead><tr><td colspan="' .$colspan. '" align="right"><button id="export-to-excel">Export to Excel</button></td></tr></thead>';
echo '<thead><tr class="noExl"><th colspan="23" align="right"><div id="export-to-excel"><img alt="" src="img/excel.png" width="32" height="32"></div></th></tr>';
echo $table_header;


$icd_counts = getIN_ICD_Stats_perHospital2013($icd_code);

$records_count = 0;
$total_icd_count = 0;
$class = '';

foreach ($icd_counts as $info)
{
	if ($records_count % 2 == 1) $class = 'odd';
	else $class = 'not_odd';
	
	$record = '<tr class="$class"><td>' . $info['npi'] .'</td>';
	//$record .= '<td><h4>PHYSICIAN</h4></td>';
	$record .= '<td>' . $info['replacement_npi'] .'</td>';
	//$record .= '<td>' . $info['employer_identification_number'] .'</td>';
	$record .= '<td>' . $info['provider_organization_name'] .'</td>';
	//$record .= '<td>' . $info['provider_last_name'] .'</td>';
	//$record .= '<td>' . $info['provider_first_name'] .'</td>';
	//$record .= '<td>' . $info['provider_middle_name'] .'</td>';
	$record .= '<td>' . $info['provider_other_organization_name'] .'</td>';
	$record .= '<td>' . $info['provider_first_line_business_mailing_address'] . ' ' . $info['provider_second_line_business_mailing_address'] . '</td>';
	$record .= '<td>' . $info['provider_business_mailing_address_city_name'] .'</td>';
	$record .= '<td>' . $info['provider_business_mailing_address_state_name'] .'</td>';
	$record .= '<td>' . $info['provider_business_mailing_address_postal_code'] .'</td>';
	$record .= '<td>' . $info['provider_business_mailing_address_country_code'] .'</td>';
	$record .= '<td>' . $info['provider_business_mailing_address_telephone_number'] .'</td>';
	$record .= '<td>' . $info['provider_business_mailing_address_fax_number'] .'</td>';
	$record .= '<td>' . $info['provider_first_line_business_practice_location_address'] . ' ' . $info['provider_second_line_business_practice_location_address'] .'</td>';
	$record .= '<td>' . $info['provider_business_practice_location_address_city_name'] .'</td>';
	$record .= '<td>' . $info['provider_business_practice_location_address_state_name'] .'</td>';
	$record .= '<td>' . $info['provider_business_practice_location_address_postal_code'] .'</td>';
	$record .= '<td>' . $info['provider_business_practice_location_address_country_code'] .'</td>';
	$record .= '<td>' . $info['provider_business_practice_location_address_telephone_number'] .'</td>';
	$record .= '<td>' . $info['provider_business_practice_location_address_fax_number'] .'</td>';
	$record .= '<td>' . $info['last_update_date'] .'</td>';
	$record .= '<td>' . $info['npi_deactivation_reason_code'] .'</td>';
	$record .= '<td>' . $info['icd_count'] .'</td></tr>';
	

	echo $record;
	
	$records_count += 1;
	$total_icd_count += $info['icd_count'];
	
	
}

echo "</tbody>";
//if ($state_breakdown == 1 or $city_breakdown  == 1 )
//echo "<tfoot><tr><th scope='row'>Total</th><td colspan='$colspan' align='right'>$total_icd_count </td></tr></tfoot><tbody>";
echo "</table></div>";


if ($records_count > 1 )
echo "<br><br>Records:&nbsp;$records_count &nbsp;&nbsp;Total procedure count:&nbsp;$total_icd_count";

?>

	</table>
</div>
<script>
$("#export-to-excel").click(function(){
$("#itsthetable").table2excel({
 // exclude CSS class
exclude: ".noExl",
   name: "ICD_Procedure_Stats"
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
