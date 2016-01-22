
<?php
ini_set('display_errors', 'On');

//require_once("inc.__functions.php");
require_once( "inc.__config.php" );


load_2008();
//load_2009();
//load_2010();
//load_2011();
//load_2012();

function load_2008() {

$dir_path = '/home/mikhaili/CMS/PSPS_2008';

$dirs = array(
'#00100',
'#10040A',
'#10040B',
'#20000A',
'#20000B',
'#30000',
'#33010',
'#38100',
'#39000',
'#40490',
'#50010',
'#54000',
'#56405',
'#59000',
'#60000',
'#65091',
'#69000',
'#70010A',
'#70010B',
'#80048',
'#90281',
'#99201',
'#ALPHAA',
'#ALPHAB',
'#ERRANT1',
'#ERRANT2');


$year = '10';
$total_count = 0;
$n = 0;
foreach($dirs as $fname)
{
	$n += 1;
	$file = $dir_path . '/' . $fname . '/M1M1/@BFV2550/B08/' . $fname . '.txt';
	$new_file = $dir_path . '/PSPSFormattedAll/PSPS0' . $n . '_NEW.txt';
	

	
	$line_count = 0;
	$handle = fopen("$file", "r");
	$new_handle = fopen("$new_file", "w");
	
	
	
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			$line_count += 1;
			$total_count+= 1;
			//if ($line_count > 10 ) break;
			//echo $line . "\n\r";
			$new_line = format_line($line);
			fwrite($new_handle, $new_line);
			// process the line read.
		}

		fclose($handle);
		fclose($new_handle);
	} else {
		// error opening the file.
	} 
	
echo $line_count . ' Lines were inserted in file ' . $new_file . "\n\r";
//die();
}
echo $total_count . ' Lines were inserted in all files ';
}







function load_2009() {

$dir_path = '/home/mikhaili/CMS/PSPS_2009';
$year = '10';
$total_count = 0;
foreach(range(1, 25) as $n)
{
	if ( $n < 10 )
	{
		$file = $dir_path . '/XTR.PBAR.Q6.PSPS0' . $n . '/P#IDR/XTR/PBAR/Q6/PSPS0' . $n . '.txt';
		$new_file = $dir_path . '/PSPSFormattedAll/PSPS0' . $n . '_NEW.txt';
	}
	else
	{
		$file = $dir_path . '/XTR.PBAR.Q6.PSPS' . $n . '/P#IDR/XTR/PBAR/Q6/PSPS' . $n . '.txt';
		$new_file = $dir_path . '/PSPSFormattedAll/PSPS' . $n . '_NEW.txt';
	
	
	}

	
	$line_count = 0;
	$handle = fopen("$file", "r");
	$new_handle = fopen("$new_file", "w");
	
	
	
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			$line_count += 1;
			$total_count+= 1;
			//if ($line_count > 10 ) break;
			//echo $line . "\n\r";
			$new_line = format_line($line);
			fwrite($new_handle, $new_line);
			// process the line read.
		}

		fclose($handle);
		fclose($new_handle);
	} else {
		// error opening the file.
	} 
	
echo $line_count . ' Lines were inserted in file ' . $new_file . "\n\r";
//die();
}
echo $total_count . ' Lines were inserted in all files ';
}





function load_2010() {

$dir_path = '/home/mikhaili/CMS/PSPS_2010';
$year = '10';
$total_count = 0;
foreach(range(1, 25) as $n)
{
	if ( $n < 10 )
	{
		$file = $dir_path . '/PSPS0' . $n . '/PSPS0' . $n . '.txt';
		$new_file = $dir_path . '/PSPSFormattedAll/PSPS0' . $n . '_NEW.txt';
	}
	else
	{
		$file = $dir_path . '/PSPS' . $n . '/PSPS' . $n . '.txt';
		$new_file = $dir_path . '/PSPSFormattedAll/PSPS' . $n . '_NEW.txt';
	
	
	}

	
	$line_count = 0;
	$handle = fopen("$file", "r");
	$new_handle = fopen("$new_file", "w");
	
	
	
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			$line_count += 1;
			$total_count+= 1;
			//if ($line_count > 10 ) break;
			//echo $line . "\n\r";
			$new_line = format_line($line);
			fwrite($new_handle, $new_line);
			// process the line read.
		}

		fclose($handle);
		fclose($new_handle);
	} else {
		// error opening the file.
	} 
	
echo $line_count . ' Lines were inserted in file ' . $new_file . "\n\r";
//die();
}
echo $total_count . ' Lines were inserted in all files ';
}








function load_2011() {

$dir_path = '/home/mikhaili/CMS/PSPS_2011';
$year = '11';
$total_count = 0;
foreach(range(1, 25) as $n)
{
	if ( $n < 10 )
	{
		$file = $dir_path . '/PSPS0' . $n . '/PSPS0' . $n . '.txt';
		$new_file = $dir_path . '/PSPSFormattedAll/PSPS0' . $n . '_NEW.txt';
	}
	else
	{
		$file = $dir_path . '/PSPS' . $n . '/PSPS' . $n . '.txt';
		$new_file = $dir_path . '/PSPSFormattedAll/PSPS' . $n . '_NEW.txt';
	
	
	}

	
	$line_count = 0;
	$handle = fopen("$file", "r");
	$new_handle = fopen("$new_file", "w");
	
	
	
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			$line_count += 1;
			$total_count+= 1;
			//if ($line_count > 10 ) break;
			//echo $line . "\n\r";
			$new_line = format_line($line);
			fwrite($new_handle, $new_line);
			// process the line read.
		}

		fclose($handle);
		fclose($new_handle);
	} else {
		// error opening the file.
	} 
	
echo $line_count . ' Lines were inserted in file ' . $new_file . "\n\r";
//die();
}
echo $total_count . ' Lines were inserted in all files ';
}






function load_2012() {

$dir_path = '/home/mikhaili/CMS/PSPS_2012/PSPS_2012';
$new_dir_path = '/home/mikhaili/CMS/PSPS_2012';
$year = '12';
$total_count = 0;
foreach(range(1, 25) as $n)
{
	if ( $n < 10 )
	{
		$file = $dir_path . '/PSPS0' . $n . '/PSPS0' . $n . '.txt';
		$new_file = $new_dir_path . '/PSPSFormattedAll/PSPS0' . $n . '_NEW.txt';
	}
	else
	{
		$file = $dir_path . '/PSPS' . $n . '/PSPS' . $n . '.txt';
		$new_file = $new_dir_path . '/PSPSFormattedAll/PSPS' . $n . '_NEW.txt';
	
	
	}
    //echo $new_file;
	//die();
	
	$line_count = 0;
	$handle = fopen("$file", "r");
	$new_handle = fopen("$new_file", "w");
	
	
	
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			$line_count += 1;
			$total_count+= 1;
			//if ($line_count > 10 ) break;
			//echo $line . "\n\r";
			$new_line = format_line($line);
			fwrite($new_handle, $new_line);
			// process the line read.
		}

		fclose($handle);
		fclose($new_handle);
	} else {
		// error opening the file.
	} 
	
echo $line_count . ' Lines were inserted in file ' . $new_file . "\n\r";
//die();
}
echo $total_count . ' Lines were inserted in all files ';
}




function load_2013() {

$dir_path = '/home/mikhaili/CMS/PSPS_2013';
$year = '13';
$total_count = 0;
foreach(range(1, 25) as $n)
{
	if ( $n < 10 )
	{
		$file = $dir_path . '/PSPS0' . $n . '/PSPS0' . $n . '.txt';
		$new_file = $dir_path . '/PSPSFormattedAll/PSPS0' . $n . '_NEW.txt';
	}
	else
	{
		$file = $dir_path . '/PSPS' . $n . '/PSPS' . $n . '.txt';
		$new_file = $dir_path . '/PSPSFormattedAll/PSPS' . $n . '_NEW.txt';
	
	
	}

	
	$line_count = 0;
	$handle = fopen("$file", "r");
	$new_handle = fopen("$new_file", "w");
	
	
	
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			$line_count += 1;
			$total_count+= 1;
			//if ($line_count > 10 ) break;
			//echo $line . "\n\r";
			$new_line = format_line($line);
			fwrite($new_handle, $new_line);
			// process the line read.
		}

		fclose($handle);
		fclose($new_handle);
	} else {
		// error opening the file.
	} 
	
echo $line_count . ' Lines were inserted in file ' . $new_file . "\n\r";
//die();
}
echo $total_count . ' Lines were inserted in all files ';
}







function load_2014() {

$dir_path = '/home/mikhaili/CMS/PSPS_2014';
$year = '14';
$total_count = 0;
foreach(range(1, 25) as $n)
{
	if ( $n < 10 )
	{
		$file = $dir_path . '/PSPS0' . $n . '/PSPS0' . $n . '.txt';
		$new_file = $dir_path . '/PSPSFormattedAll/PSPS0' . $n . '_NEW.txt';
	}
	else
	{
		$file = $dir_path . '/PSPS' . $n . '/PSPS' . $n . '.txt';
		$new_file = $dir_path . '/PSPSFormattedAll/PSPS' . $n . '_NEW.txt';
	
	
	}

	
	
	
	$line_count = 0;
	$handle = fopen("$file", "r");
	$new_handle = fopen("$new_file", "w");
	
	
	
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			$line_count += 1;
			$total_count+= 1;
			//if ($line_count > 10 ) break;
			//echo $line . "\n\r";
			$new_line = format_line($line);
			fwrite($new_handle, $new_line);
			// process the line read.
		}

		fclose($handle);
		fclose($new_handle);
	} else {
		// error opening the file.
	} 
	
echo $line_count . ' Lines were inserted in file ' . $new_file . "\n\r";
//die();
}
echo $total_count . ' Lines were inserted in all files ';
}

function format_line($line)
{
	$delimiter = ';';
	
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
	
	
	
	if (!isset($HCPCS_Code))                  $HCPCS_Code                   = '';
	if (!isset($HCPCS_Initial_Modifier_Code)) $HCPCS_Initial_Modifier_Code  = '';
	if (!isset($Provider_Specialty_Code))     $Provider_Specialty_Code      = '';
	if (!isset($Carrier_Number))              $Carrier_Number               = '';
	if (!isset($Pricing_Locality_Code))       $Pricing_Locality_Code        = '';
	if (!isset($Type_of_Service_Code))        $Type_of_Service_Code         = '';
	if (!isset($Place_of_Service_Code))       $Place_of_Service_Code        = '';
	if (!isset($HCPCS_Second_Modifier_Code))  $HCPCS_Second_Modifier_Code   = '';
	if (!isset($Submitted_Service_Count))     $Submitted_Service_Count      = 0;
	if (!isset($Submitted_Charge_Amount))     $Submitted_Charge_Amount      = 0;
	if (!isset($Allowed_Charge_Amount))       $Allowed_Charge_Amount        = 0;
	if (!isset($Denied_Services_Count))       $Denied_Services_Count        = 0;
	if (!isset($Denied_Charge_Amount))        $Denied_Charge_Amount         = 0;
	if (!isset($Assigned_Services_Count))     $Assigned_Services_Count      = 0;
	if (!isset($NCH_Payment_Amount))          $NCH_Payment_Amount           = 0;
	if (!isset($HCPCS_ASC_Indicator_Code))    $HCPCS_ASC_Indicator_Code     = '';
	if (!isset($Error_Indicator_Code))        $Error_Indicator_Code         = '';
	if (!isset($Berenson_Eggers_Type_of_Service_Code))  $Berenson_Eggers_Type_of_Service_Code = '';
	
	
	
	
    $formatted_line = 
    $HCPCS_Code . $delimiter .
	$HCPCS_Initial_Modifier_Code . $delimiter .
	$Provider_Specialty_Code . $delimiter .
	$Carrier_Number . $delimiter .
	$Pricing_Locality_Code . $delimiter .
	$Type_of_Service_Code . $delimiter .
	$Place_of_Service_Code . $delimiter .
	$HCPCS_Second_Modifier_Code . $delimiter .
	$Submitted_Service_Count . $delimiter .
	$Submitted_Charge_Amount . $delimiter .
	$Allowed_Charge_Amount . $delimiter .
	$Denied_Services_Count . $delimiter .
	$Denied_Charge_Amount . $delimiter .
	$Assigned_Services_Count . $delimiter .
	$NCH_Payment_Amount . $delimiter .
	$HCPCS_ASC_Indicator_Code . $delimiter .
	$Error_Indicator_Code . $delimiter .
	$Berenson_Eggers_Type_of_Service_Code . "\n";
    
    
    
    return $formatted_line;
        
	
}





 ?>
