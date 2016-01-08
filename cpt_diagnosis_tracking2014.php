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

$cpt_code      = null;
$state_checked = null;
$city_checked  = null;
$per_checked = null;
$pls_checked = null;



$city_breakdown = 0;
$state_breakdown = 0;
$per_breakdown = 0;
$pls_breakdown = 0;






$colspan = 2;
/******************PROCESS SUBMITTED FORM***********************/
if (array_key_exists('cpt_code', $_REQUEST)) 
{
	$cpt_code      = $_REQUEST['cpt_code'];
	$cpt_code = preg_replace('/\s+/', '', $cpt_code);
	$cpt_code = preg_replace('/[.]/', '', $cpt_code); 
	
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



if (array_key_exists('per_breakdown', $_REQUEST))  
{
	$per_checked   = "checked='checked'";
	$per_breakdown = 1;
}	

if (array_key_exists('pls_breakdown', $_REQUEST))  
{
	$pls_checked    = "checked='checked'";
	$pls_breakdown  = 1;
}		

echo "<h2>CPT Diagnosis Tracker 2014</h2>";
/******************END PROCESS SUBMITTED FORM***********************/


$filter =  "<form method='post' action='cpt_diagnosis_tracking2014.php'>";
$filter .= "<h4>Enter ICD Diagnosis Code (ex: 0022,0023,0024... 00329)</h4>";
$filter .= "<input type='text' name='cpt_code' value=$cpt_code >";
$filter .= "<h4>Breakdown procedure count</h4>";
$filter .= "<input type='checkbox'       name='state_breakdown'    $state_checked    >&nbsp;By State";
$filter .= "<br><input type='checkbox'   name='city_breakdown'     $city_checked     >&nbsp;By City";
$filter .= "<br><input type='checkbox'   name='pls_breakdown'      $pls_checked      >&nbsp;By Place of Service Code";
$filter .= "<br><input type='checkbox'   name='per_breakdown'      $per_checked      >&nbsp;By Performing Physician";
$filter .= "<br><br><input type='submit' name='submit'  >";
$filter .= "</form>";


echo $filter;

if (!array_key_exists('submit', $_REQUEST)) die();
if ( $cpt_code == ''  or !is_numeric(preg_replace('/[,]/', '', $cpt_code)))
{
	echo "<br><br><h4 class='error'>ICD Code must be a number!</h4>";
	die();
}

//setCount(percent, columnIndex)
$radiobutton = '<br>
<input type="radio" name="percent" checked="checked" value="5"  onClick="setCount(5,'.$colspan .')" /> 5% Database
<br>
<input type="radio" name="percent" value="100" onClick="setCount(20,'.$colspan .')"/> 100% Estimation
<br>';

echo $radiobutton;



echo "<div id='itsthetable'><table id='code_count_table'>";
$table_header = "<tr><th scope='col'>CPT Code</th>";
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

if ($pls_breakdown == 1) 
{
	$table_header .="<th scope='col'>Place of Service Code</th>";
	$colspan += 1;
}


if ($per_breakdown == 1) 
{
	$table_header .="<th scope='col'>Performing Physician</th>";
	$colspan += 1;
}




echo '<thead><tr class="noExl"><th colspan="' .$colspan. '" align="right"><div id="export-to-excel"><img alt="" src="img/excel.png" width="32" height="32"></div></th></tr>';
$table_header .="<th scope='col'>Diagnosis Count</th></tr></thead>";


echo $table_header;


$cpt_counts = getCPTDiagnosCount($cpt_code, $state_breakdown,  $city_breakdown, $pls_breakdown, $per_breakdown);

$records_count = 0;
$total_cpt_count = 0;
$class = '';

foreach ($cpt_counts as $cpt_count)
{
	$records_count % 2 == 0 ? $class = "class='odd'":  $class = ''; 
	$record = "<tr $class><th scope='row'>".$cpt_count['cpt_code'].'</th>';
	if ($state_breakdown == 1) $record .= '<td>'.$cpt_count['state'].'</td>';
	if ($city_breakdown == 1) $record  .= '<td>'.$cpt_count['city'].'</td>';
	if ($pls_breakdown == 1) $record .= '<td>'.$cpt_count['pls'].'</td>';	
	if ($per_breakdown == 1) $record .= '<td><a href="provider_lookup.php?npi='.$cpt_count['per_npi'].'">'.$cpt_count['per_npi'].'</a></td>';	
	
	
	$record .= '<td>'.$cpt_count['cpt_count'].'</td></tr>';	
	echo $record;
	
	$records_count += 1;
	$total_cpt_count += $cpt_count['cpt_count'];
	
	
}

echo "</tbody>";
//if ($state_breakdown == 1 or $city_breakdown  == 1 )
//echo "<tfoot><tr><th scope='row'>Total</th><td colspan='$colspan' align='right'>$total_cpt_count </td></tr></tfoot><tbody>";
echo "</table></div>";


if ($records_count > 1)
echo "<br><br>Records:&nbsp;$records_count &nbsp;&nbsp;Total diagnosis count:&nbsp;<span id='total_count'>$total_cpt_count</span>";

?>


<script>
$("#export-to-excel").click(function(){
$("#itsthetable").table2excel({
 // exclude CSS class
exclude: ".noExl",
   name: "CPT_Diagnosis_Stats"
});
});
function setCount(percent, columnCount){
var coefficient = 20;
var columnIndex = parseInt(columnCount - 1);
if ( percent == '5')  coefficient = 0.05;


var theTbl = document.getElementById("code_count_table");
var r=1;
var oldvalue = 0;
var total_count = 0;
var new_value = 0;
while(row=theTbl.rows[r++])
{
  if (document.getElementById("code_count_table").rows[r] === undefined) { break; }
  
  oldvalue = document.getElementById("code_count_table").rows[r].cells[columnIndex].firstChild.data;
  new_value = parseInt(oldvalue) * coefficient;
  total_count = total_count + new_value;
  document.getElementById("code_count_table").rows[r].cells[columnIndex].firstChild.data = new_value;
  
  
  //alert('Old value: ' + row.cells[columnIndex].firstChild.data);
  //alert('New value: ' + parseInt(row.cells[columnIndex].firstChild.data) * coefficient);
  
 
}


document.getElementById("total_count").innerHTML = total_count;
//for (var i = 0, row; row = theTbl.rows[i]; i++) 

//{
//	alert('I am inside the loop');
//    alert('Old value: ' + theTbl.rows[i].cells[columnIndex].firstChild.data);
//    alert('New value: ' + round(theTbl.rows[i].cells[columnIndex].firstChild.data) * coefficient);
//    theTbl.rows[i].cells[columnIndex].firstChild.data = round(theTbl.rows[i].cells[columnIndex].firstChild.data) * coefficient;
//   
//}
//
}

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
