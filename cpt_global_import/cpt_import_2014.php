
<?php
ini_set('display_errors', 'On');

//require_once("inc.__functions.php");
require_once( "inc.__config.php" );


load_2014();


function load_2014() {

$dir_path = '/home/mikhaili/CMS/PSPS_2014';
$db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DBNAME . ';charset=UTF8', MYSQL_USERNAME, MYSQL_PASSWORD);
$year = '14';
$total_count = 0;
foreach(range(1, 25) as $n)
{
	if ( $n < 10 )
		$file = $dir_path . '/PSPS0' . $n . '/PSPS0' . $n . '.txt';
	else
		$file = $dir_path . '/PSPS' . $n . '/PSPS' . $n . '.txt';
	
	
	$line_count = 0;
	$handle = fopen("$file", "r");
	
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			$line_count += 1;
			$total_count+= 1;
			//if ($line_count > 10 ) break;
			//echo $line . "\n\r";
			insert_line($line, $db, $year );
			// process the line read.
		}

		fclose($handle);
	} else {
		// error opening the file.
	} 
	
echo $line_count . ' Lines were inserted by file ' . $file . "\n\r";
}
echo $total_count . ' Lines were inserted by all files ';
}

function insert_line($line, $db, $year )
{
	
	$HCPCS_Code                   =  trim(substr($line, 0, 5));
	$HCPCS_Initial_Modifier_Code  =  trim(substr($line, 5, 2));
	$Provider_Specialty_Code      =  trim(substr($line, 7, 2));
	$Carrier_Number               =  trim(substr($line, 9, 5));
	$Pricing_Locality_Code        =  trim(substr($line,14, 2));
	$Type_of_Service_Code         =  trim(substr($line,16, 1));
	$Place_of_Service_Code        =  trim(substr($line,17, 2));
	$HCPCS_Second_Modifier_Code   =  trim(substr($line,19, 2));
	$Submitted_Service_Count      =  substr($line,21,14);
	$Submitted_Charge_Amount      =  substr($line,35,13);
	$Allowed_Charge_Amount        =  substr($line,48,13);
	$Denied_Services_Count        =  substr($line,61,14);
	$Denied_Charge_Amount         =  substr($line,75,13);
	$Assigned_Services_Count      =  substr($line,88,14);
	$NCH_Payment_Amount           =  substr($line,102,13);
	$HCPCS_ASC_Indicator_Code     =  trim(substr($line,115, 1));
	$Error_Indicator_Code         =  trim(substr($line,116, 2));
	$Berenson_Eggers_Type_of_Service_Code  =  trim(trim(substr($line,118, 3)), '~');	
	
	
try {	
	
	$sql_stmt = "
insert into supplier_procedure_summary_$year
(	
	HCPCS_Code,
	HCPCS_Initial_Modifier_Code,
	Provider_Specialty_Code,
	Carrier_Number,
	Pricing_Locality_Code,
	Type_of_Service_Code,
	Place_of_Service_Code,
	HCPCS_Second_Modifier_Code,
	Submitted_Service_Count,
	Submitted_Charge_Amount,
	Allowed_Charge_Amount,
	Denied_Services_Count,
	Denied_Charge_Amount,
	Assigned_Services_Count,
	NCH_Payment_Amount,
	HCPCS_ASC_Indicator_Code,
	Error_Indicator_Code,
	Berenson_Eggers_Type_of_Service_Code
)	
values
(	
	'$HCPCS_Code',
	'$HCPCS_Initial_Modifier_Code',
	'$Provider_Specialty_Code',
	'$Carrier_Number',
	'$Pricing_Locality_Code',
	'$Type_of_Service_Code',
	'$Place_of_Service_Code',
	'$HCPCS_Second_Modifier_Code',
	 $Submitted_Service_Count,
	 $Submitted_Charge_Amount,
	 $Allowed_Charge_Amount,
	 $Denied_Services_Count,
	 $Denied_Charge_Amount,
	 $Assigned_Services_Count,
	 $NCH_Payment_Amount,
	'$HCPCS_ASC_Indicator_Code',
	$Error_Indicator_Code,
	'$Berenson_Eggers_Type_of_Service_Code'
)";	

$sql_exec = $db->exec( $sql_stmt );

if (!$sql_exec) echo $sql_stmt . "\n\r";



	} catch (Exception $e) {
    echo 'SQL Failed: ',  $e->getMessage(), "\r\n" , $sql_stmt, "\r\n";
}
	
	
}





 ?>
