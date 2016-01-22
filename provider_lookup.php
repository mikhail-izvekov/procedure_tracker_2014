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




echo "<h2>Provider Info</h2>";

$npi = '';
if (array_key_exists('npi', $_REQUEST)) $npi = $_REQUEST['npi'];

$filter =  "<form method='post' action='provider_lookup.php'>";
$filter .= "<h4>Enter NPI code ( ex: 1003017286 ... 1003803495 ) </h4>";
$filter .= "<input type='text' name='npi' value=$npi >";
$filter .= "<br><br><input type='submit' name='submit'  >";
$filter .= "</form>";

echo $filter;

if (!array_key_exists('npi', $_REQUEST))  die();

if ( $npi == ''  or !is_numeric(preg_replace('/[,]/', '', $npi)))
{
	echo "<br><br><h4 class='error'>NPI Code must be a number!</h4>";
	die();
}


$npiinfo = getNPIdetails($_REQUEST['npi']);

$table_header = "<div id='itsthetable'><table>";
$table_header .= '<thead><tr class="noExl"><th colspan="2" align="right"><div id="export-to-excel"><img alt="" src="img/excel.png" width="32" height="32"></div></th></tr></thead>';

echo $table_header;

foreach ($npiinfo as $info)
{
	
IF ($info['entity_type_code'] == 0) //????
{
echo '<h4>Details for NPI code ' . $_REQUEST['npi'] .' are missing in our database</h4>';	
die();
}
	
IF ($info['entity_type_code'] == 1) //physician
	{
	$tbody = '<tr class="odd"><th scope="row" align="right">NPI</th><td>' . $info['npi'] .'</td>';
	$tbody .= '<tr class="odd"><th scope="row" align="right">Provider Type</th><td><h4>PHYSICIAN</h4></td>';
	$tbody .= '<tr class="odd"><th scope="row" align="right">Replacement NPI</th><td>' . $info['replacement_npi'] .'</td>';
	$tbody .= '<tr class="odd"><th scope="row" align="right">Employer Identification Number</th><td>' . $info['employer_identification_number'] .'</td>';
	//$tbody .= '<tr ><th scope="row" align="right">Organization Name</th><td>' . $info['provider_organization_name'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Last Name</th><td>' . $info['provider_last_name'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">First Name</th><td>' . $info['provider_first_name'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Middle Name</th><td>' . $info['provider_middle_name'] .'</td>';
	//$tbody .= '<tr class="odd"><th scope="row" align="right">Other Organization Name</th><td>' . $info['provider_other_organization_name'] .'</td>';
	$tbody .= '<tr class="odd"><th scope="row" align="right">Business Address</th><td>' . $info['provider_first_line_business_mailing_address'] .'</td>';

	if (!empty($info['provider_second_line_business_mailing_address']))
	$tbody .= '<tr><th scope="row" align="right">Address Line 2</th><td>' . $info['provider_second_line_business_mailing_address'] .'</td>';

	$tbody .= '<tr><th scope="row" align="right">City</th><td>' . $info['provider_business_mailing_address_city_name'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">State</th><td>' . $info['provider_business_mailing_address_state_name'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Postal Code</th><td>' . $info['provider_business_mailing_address_postal_code'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Country</th><td>' . $info['provider_business_mailing_address_country_code'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Telephone</th><td>' . $info['provider_business_mailing_address_telephone_number'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Fax</th><td>' . $info['provider_business_mailing_address_fax_number'] .'</td>';
	$tbody .= '<tr class="odd"><th scope="row" align="right">Practice Location Address</th><td>' . $info['provider_first_line_business_practice_location_address'] .'</td>';

	if (!empty($info['provider_second_line_business_practice_location_address']))
	$tbody .= '<tr><th scope="row" align="right">Address Line 2</th><td>' . $info['provider_second_line_business_practice_location_address'] .'</td>';

	$tbody .= '<tr><th scope="row" align="right">City</th><td>' . $info['provider_business_practice_location_address_city_name'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">State</th><td>' . $info['provider_business_practice_location_address_state_name'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Postal Code</th><td>' . $info['provider_business_practice_location_address_postal_code'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Country</th><td>' . $info['provider_business_practice_location_address_country_code'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Phone</th><td>' . $info['provider_business_practice_location_address_telephone_number'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Fax</th><td>' . $info['provider_business_practice_location_address_fax_number'] .'</td>';
	$tbody .= '<tr class="odd"><th scope="row" align="right">Last Updated</th><td>' . $info['last_update_date'] .'</td>';
	$tbody .= '<tr class="odd"><th scope="row" align="right">Deactivation Reason Code</th><td>' . $info['npi_deactivation_reason_code'] .'</td>';
	}
ELSE IF ($info['entity_type_code'] == 2) //Hospital
	{
	$tbody = '<tr class="odd"><th scope="row" align="right">NPI</th><td>' . $info['npi'] .'</td>';
	$tbody .= '<tr class="odd"><th scope="row" align="right">Provider Type</th><td><h4>HOSPITAL</h4></td>';
	$tbody .= '<tr><th scope="row" align="right">Replacement NPI</th><td>' . $info['replacement_npi'] .'</td>';
	//$tbody .= '<tr class="odd"><th scope="row" align="right">Employer Identification Number</th><td>' . $info['employer_identification_number'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Organization Name</th><td>' . $info['provider_organization_name'] .'</td>';
	//$tbody .= '<tr><th scope="row" align="right">Last Name</th><td>' . $info['provider_last_name'] .'</td>';
	//$tbody .= '<tr><th scope="row" align="right">First Name</th><td>' . $info['provider_first_name'] .'</td>';
	//$tbody .= '<tr><th scope="row" align="right">Middle Name</th><td>' . $info['provider_middle_name'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Other Organization Name</th><td>' . $info['provider_other_organization_name'] .'</td>';
	$tbody .= '<tr class="odd"><th scope="row" align="right">Business Address</th><td>' . $info['provider_first_line_business_mailing_address'] .'</td>';

	if (!empty($info['provider_second_line_business_mailing_address']))
	$tbody .= '<tr><th scope="row" align="right">Address Line 2</th><td>' . $info['provider_second_line_business_mailing_address'] .'</td>';

	$tbody .= '<tr><th scope="row" align="right">City</th><td>' . $info['provider_business_mailing_address_city_name'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">State</th><td>' . $info['provider_business_mailing_address_state_name'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Postal Code</th><td>' . $info['provider_business_mailing_address_postal_code'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Country</th><td>' . $info['provider_business_mailing_address_country_code'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Telephone</th><td>' . $info['provider_business_mailing_address_telephone_number'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Fax</th><td>' . $info['provider_business_mailing_address_fax_number'] .'</td>';
	$tbody .= '<tr class="odd"><th scope="row" align="right">Practice Location Address</th><td>' . $info['provider_first_line_business_practice_location_address'] .'</td>';

	if (!empty($info['provider_second_line_business_practice_location_address']))
	$tbody .= '<tr><th scope="row" align="right">Address Line 2</th><td>' . $info['provider_second_line_business_practice_location_address'] .'</td>';

	$tbody .= '<tr><th scope="row" align="right">City</th><td>' . $info['provider_business_practice_location_address_city_name'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">State</th><td>' . $info['provider_business_practice_location_address_state_name'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Postal Code</th><td>' . $info['provider_business_practice_location_address_postal_code'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Country</th><td>' . $info['provider_business_practice_location_address_country_code'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Phone</th><td>' . $info['provider_business_practice_location_address_telephone_number'] .'</td>';
	$tbody .= '<tr><th scope="row" align="right">Fax</th><td>' . $info['provider_business_practice_location_address_fax_number'] .'</td>';
	$tbody .= '<tr class="odd"><th scope="row" align="right">Last Updated</th><td>' . $info['last_update_date'] .'</td>';
	$tbody .= '<tr class="odd"><th scope="row" align="right">Deactivation Reason Code</th><td>' . $info['npi_deactivation_reason_code'] .'</td>';
	}



}
if (!empty($info['npi']))
echo $tbody;
else
echo '<h4>The NPI code ' . $_REQUEST['npi'] .' is missing in our database</h4>'; 

?>

	</table>
</div>	
<script>
$("#export-to-excel").click(function(){
$("#itsthetable").table2excel({
 // exclude CSS class
exclude: ".noExl",
   name: "provider_profile"
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
