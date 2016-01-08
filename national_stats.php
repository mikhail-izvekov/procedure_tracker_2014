
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
//require_once("inc.__functions.php");
//require_once( "inc.__config.php" );
require_once( 'class.__scan.php' );
require_once( 'class.__forceUTF8.php' );

use \ForceUTF8\Encoding;

$icd_code       = 5155;
$year           = 13;
/******************PROCESS SUBMITTED FORM***********************/
if (array_key_exists('icd_code', $_REQUEST)) 
{
	$icd_code      = $_REQUEST['icd_code'];
	$icd_code = preg_replace('/\s+/', '', $icd_code);
	$icd_code = preg_replace('/[.]/', '', $icd_code); 
	
}

if (array_key_exists('year', $_REQUEST)) 
{
	$year = $_REQUEST['year'];
}	

echo "<h2>National ICD Procedure Statistics </h2>";
/******************END PROCESS SUBMITTED FORM***********************/
$years = array('2013', '2012', '2011', '2010', '2009', '2008', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000', '1999', '1998', '1997');


$options = '';
foreach ( $years as $yyyy )
{
	
	if ( substr($yyyy, 2, 2) == $year )
		$options .= '<option value="' . substr($yyyy, 2, 2) . '" selected="selected">' . $yyyy . '</option>';
	else
		$options .= '<option value="' . substr($yyyy, 2, 2) . '" >' . $yyyy . '</option>';
	
	
}


$filter =  "<form method='post' action='national_stats.php'>";
$filter .= "<h4>Enter ICD Procedure Code  (ex: 8152-8155... 8152,8153,8154... 8164)</h4>";
$filter .= "<input type='text' name='icd_code' value=$icd_code >";
$filter .= "<h4>Choose the Year</h4>";
$filter .= "<select name='year'>";
$filter .= $options;
$filter .= "</select><br><br><input type='submit' name='submit'  >";
$filter .= "</form>";


echo $filter . "<br><br>";

if (!array_key_exists('submit', $_REQUEST)) die();

//print_r($_REQUEST);
//die();

$scan = new scan();
$scan->url = 'http://hcupnet.ahrq.gov/';
$scan->getContent();



$tempDOM = new DOMDocument();
$content = mb_convert_encoding( $scan->content, 'HTML-ENTITIES', 'UTF-8' );
@$tempDOM->loadHTML('<?xml encoding="UTF-8">' . $scan->content );
// dirty fix
foreach ($tempDOM->childNodes as $item)
	if ($item->nodeType == XML_PI_NODE)
		$tempDOM->removeChild($item); // remove hack
$tempDOM->encoding = 'UTF-8'; // insert proper
$link_xpath = new DOMXPath($tempDOM);

$link_url = '';

$link_node = $link_xpath->query("//a[contains(@href,'National')]")->item(0);
if ($link_node) 
{

		$link_url = $link_node->getAttribute('href');	

}
else die("Failed at 1");


$id_pos     = strpos($link_url, "Id=") + 3;
$id_end_pos = strpos($link_url, "&Form");
$id = substr($link_url, $id_pos , $id_end_pos - $id_pos);


$scan->get_header_only = 1; // to returns header only

//  1)  National Statistics on All Stays ->
$scan->cookie_string = '_gat_UA-63800229-1=1;_ga=GA1.3.1795650695.1452029438;_gat_GSA_ENOR0=1';
$scan->url = 'http://hcupnet.ahrq.gov/HCUPnet.app/HCUPnet.jsp?Id=' . $id . '&Form=MAINSEL&JS=Y&Action=%3E%3ENext%3E%3E&_MAINSEL=National%20Statistics';
$scan->getContent();



// 2)      Researcher, medical professional

$scan->url = 'http://hcupnet.ahrq.gov/HCUPnet.app/HCUPnet.jsp?Id=' . $id . '&Form=SelLAY&JS=Y&Action=%3E%3ENext%3E%3E&_LAY=Researcher'; 
$scan->getContent();




//  3)      Statistics on specific diagnoses or procedures

$scan->url = 'http://hcupnet.ahrq.gov/HCUPnet.app/HCUPnet.jsp?Id=' . $id . '&Form=SelQUERYTYPE&JS=Y&Action=%3E%3ENext%3E%3E&_QUERYTYPE=DxPr';
$scan->getContent();




// 4)      Select year
$scan->url = 'http://hcupnet.ahrq.gov/HCUPnet.app/HCUPnet.jsp?Id=' . $id . '&Form=SelDB&JS=Y&Action=%3E%3ENext%3E%3E&_DB=NIS' . $year;
$scan->getContent();



//  5)      Specific procedures by ICD-9-CM (last option)

$scan->url = 'http://hcupnet.ahrq.gov/HCUPnet.app/HCUPnet.jsp?Id=' . $id . '&Form=SelDXPR&JS=Y&Action=%3E%3ENext%3E%3E&_DXPR=PR1';
$scan->getContent();







//   6)      All-listed procedures

$scan->url = 'http://hcupnet.ahrq.gov/HCUPnet.app/HCUPnet.jsp?Id=' . $id . '&Form=SelALLLISTED&JS=Y&Action=%3E%3ENext%3E%3E&_ALLLISTED=Yes';
$scan->getContent();




//  7)      All discharges

$scan->url = 'http://hcupnet.ahrq.gov/HCUPnet.app/HCUPnet.jsp?Id=' . $id . '&Form=SelRSTR&JS=Y&Action=%3E%3ENext%3E%3E&_RSTR=';
$scan->getContent();






// 8)      Enter in codes and choose if you want separated or aggregate



$scan->url = 'http://hcupnet.ahrq.gov/HCUPnet.jsp';

$temp_post_vars[] = ['Form'=>'SelSPECDXPR'];
$temp_post_vars[] = ['Id'=>$id]; 
$temp_post_vars[] = ['JS'=>'Y']; 
$temp_post_vars[] = ['_PR1'=>$icd_code];
$temp_post_vars[] = ['_Chkcombined'=>''];
$temp_post_vars[] = ['Go to the Next Screen.x'=>'56'];
$temp_post_vars[] = ['Go to the Next Screen.y'=>'12'];

$post_vars = [];

foreach( $temp_post_vars as $temp_post_var )
{
	$post_vars[array_keys($temp_post_var)[0]] = array_values($temp_post_var)[0];
}
$scan->post_vars = http_build_query($post_vars);
$scan->getContent();





//  Select: All patients in all hospitals, Patient age & Payer

unset($scan->post_vars);
unset($post_vars);
unset($temp_post_vars);


$temp_post_vars[] = ['Form'=>'SelPAT'];
$temp_post_vars[] = ['Id'=>$id];  
$temp_post_vars[] = ['JS'=>'Y'];
$temp_post_vars[] = ['_InPatChar'=>'Yes'];
$temp_post_vars[] = ['_InHospChar'=>'Yes'];
$temp_post_vars[] = ['_PatChar'=>''];
$temp_post_vars[] = ['_PatChar'=>'AGE'];
$temp_post_vars[] = ['_PatChar'=>'PAY1'];
$temp_post_vars[] = ['Go to the Next Screen.x'=>'68'];
$temp_post_vars[] = ['Go to the Next Screen.y'=>'13'];

$post_vars = [];

foreach( $temp_post_vars as $temp_post_var )
{
	$post_vars[array_keys($temp_post_var)[0]] = array_values($temp_post_var)[0];
}
$scan->post_vars = http_build_query($post_vars);
$scan->getContent();



// 10)  licence agreement

$scan->url = 'http://hcupnet.ahrq.gov/HCUPnet.jsp?Id=' . $id . '&Form=DispTab&JS=Y&Action=Accept';
unset($scan->get_header_only);
unset($scan->post_vars);
$scan->getContent();



if (strlen($scan->content) < 35000 ) die("<h4 class='error'>No data found for the supplied ICD code</h4>");

$data_begining = strpos($scan->content, '<table summary=', 35000);
$data_end      = strpos($scan->content, '<p class="footnotetext');
$data_len  = $data_end  - $data_begining;
$data_html = substr($scan->content, $data_begining, $data_len);
echo $data_html;







