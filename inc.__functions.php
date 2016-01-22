<?php 


error_reporting(E_ALL);
ini_set('display_errors', 'On');


/*
 * PROCEDURE TRACKER FUNCTION REPOSITORY
 *
 * Author: Mikhail Izvekov
 * Difficulty: Severely annoying for many days
 *
 */


 
function getGlobalCPTStats($cpt_codes, $service_code_breakdown,  $year, $db)
{
  
  // formatting cpt code from 0001F,0001A,00004 to '0001F','0001A','00004' to use with sql IN clause
   $cpt_code_array = explode("," , $cpt_codes);
   $cpt_code = NULL;
   foreach ($cpt_code_array as $cpt_code_part)
   {
	if ( $cpt_code == NULL )
		$cpt_code = "'$cpt_code_part'";
	else
		$cpt_code .= ",'$cpt_code_part'";
	}
    
	$service_code_breakdown_column = 'null';
    if ($service_code_breakdown == 1)      $service_code_breakdown_column      = 'Place_of_Service_Code';
    
    $sql_statement = "
    SELECT 
		HCPCS_Code,
		$service_code_breakdown_column,
		sum(submitted_service_count),
		sum(submitted_charge_amount),
		sum(allowed_charge_amount),
		sum(denied_services_count),
		sum(denied_charge_amount),
		sum(assigned_services_count),
		sum(nch_payment_amount)
    FROM supplier_procedure_summary_$year
	WHERE HCPCS_Code IN ($cpt_code)
	GROUP BY HCPCS_Code, $service_code_breakdown_column";
						
	
   	$count  = 1;
	$row    = [];
    $result = [];
        
	if( !$sql_execute = $db->query($sql_statement) )
		{
			return false;
		}
		
	while( $r = $sql_execute->fetch(PDO::FETCH_NUM) )
   {
	
		$row['cpt_code']                = $r[0];
		$row['service_code_breakdown']  = $r[1];
		$row['submitted_service_count'] = $r[2];
		$row['submitted_charge_amount'] = $r[3];
		$row['allowed_charge_amount']   = $r[4];
		$row['denied_services_count']   = $r[5];
		$row['denied_charge_amount']    = $r[6];
		$row['assigned_services_count'] = $r[7];
		$row['nch_payment_amount']      = $r[8];
		
		$result[$count] = $row;
		$count = $count + 1;  
	}
return 	$result;
} 
 
 
     
 
 
function getCPTDiagnosCount($db, $cpt_codes, $state_breakdown = 0,  $city_breakdown = 0, $place_type_breakdown = 0 , $per_breakdown = 0)
{
  

  // formatting cpt code from 0001F,0001A,00004 to '0001F','0001A','00004' to use with sql IN clause
   $cpt_code_array = explode("," , $cpt_codes);
   
   $cpt_code = NULL;
   
   foreach ($cpt_code_array as $cpt_code_part)
   {
	if ( $cpt_code == NULL )
		$cpt_code = "'$cpt_code_part'";
	else
		$cpt_code .= ",'$cpt_code_part'";
	   
	   
   }
    


    
    $state_column = 'null';
    $city_column  = 'null';
    $place_type_column = 'null';
    $hospital_column = 'null';
    $per_column = 'null';
   
    
    if ($state_breakdown == 1)      $state_column      = 'STATE';
    if ($city_breakdown  == 1)      $city_column       = 'CITY';
    if ($place_type_breakdown == 1) $place_type_column = 'PLCSRVC';
    if ($per_breakdown == 1)        $per_column        = 'PRF_NPI';
    
    
    
    
    
   
    
		$sql_statement = "SELECT LINE_ICD_DGNS_CD, $state_column, $city_column, $place_type_column,  $per_column,  count(*)
							FROM claim_cpt_codes
						   WHERE LINE_ICD_DGNS_CD IN ($cpt_code)
						GROUP BY LINE_ICD_DGNS_CD, $state_column, $city_column, $place_type_column,  $per_column";
						
						
				
       
          
                
                    

   	$count  = 1;
	$row    = [];
    $result = [];
        
	if( !$sql_execute = $db->query($sql_statement) )
		{
			return false;
		}
		
	while( $r = $sql_execute->fetch(PDO::FETCH_NUM) )
   {
	
		$row['cpt_code']         = $r[0];
		$row['state']            = $r[1];
		$row['city']             = $r[2];
		$row['pls']              = $r[3];
		$row['per_npi']          = $r[4];
		$row['cpt_count']        = $r[5];
		
				
		$result[$count] = $row;
	
			  
	$count = $count + 1;  
	}
return 	$result;
} 
     
     
function getCPTProcedureCount($db, $cpt_codes, $state_breakdown = 0,  $city_breakdown = 0, $place_type_breakdown = 0 , $per_breakdown = 0)
{
    

    
    // formatting cpt code from 0001F,0001A,00004 to '0001F','0001A','00004' to use with sql IN clause
   $cpt_code_array = explode("," , $cpt_codes);
   
   $cpt_code = NULL;
   
   foreach ($cpt_code_array as $cpt_code_part)
   {
	if ( $cpt_code == NULL )
		$cpt_code = "'$cpt_code_part'";
	else
		$cpt_code .= ",'$cpt_code_part'";
	   
	   
   }
    
    
    
    $state_column = 'null';
    $city_column  = 'null';
    $place_type_column = 'null';
    $hospital_column = 'null';
    $per_column = 'null';
   
    
    if ($state_breakdown == 1)      $state_column      = 'STATE';
    if ($city_breakdown  == 1)      $city_column       = 'CITY';
    if ($place_type_breakdown == 1) $place_type_column = 'PLCSRVC';
    if ($per_breakdown == 1)        $per_column        = 'PRF_NPI';
    
    
    
    
    
   
    
		$sql_statement = "SELECT HCPCS_CD, $state_column, $city_column, $place_type_column,  $per_column,  count(*)
							FROM claim_cpt_codes
						   WHERE HCPCS_CD IN ($cpt_code)
						GROUP BY HCPCS_CD, $state_column, $city_column, $place_type_column,  $per_column";
						
						
				
                    
                    

   	$count  = 1;
	$row    = [];
    $result = [];
        
	if( !$sql_execute = $db->query($sql_statement) )
		{
			return false;
		}
		
	while( $r = $sql_execute->fetch(PDO::FETCH_NUM) )
   {
	
		$row['cpt_code']         = $r[0];
		$row['state']            = $r[1];
		$row['city']             = $r[2];
		$row['pls']              = $r[3];
		$row['per_npi']          = $r[4];
		$row['cpt_count']        = $r[5];
		
				
		$result[$count] = $row;
	
			  
	$count = $count + 1;  
	}
return 	$result;
}    
     
     

function getICDProcedureCount($icd_codes, $state_breakdown = 0,  $city_breakdown = 0, $inout_breakdown = 0, $hospital_breakdown= 0, $at_breakdown = 0, $op_breakdown = 0)
{
    $db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DBNAME . ';charset=UTF8', MYSQL_USERNAME, MYSQL_PASSWORD);

   // formatting cpt code from 0001F,0001A,00004 to '0001F','0001A','00004' to use with sql IN clause
   $icd_code_array = explode("," , $icd_codes);
   
   $icd_code = NULL;
   
   foreach ($icd_code_array as $icd_code_part)
   {
	if ( $icd_code == NULL )
		$icd_code = "'$icd_code_part'";
	else
		$icd_code .= ",'$icd_code_part'";
	   
	   
   }
    
    
    
    
    $state_column = 'null';
    $city_column  = 'null';
    $inout_column = 'null';
    $hospital_column = 'null';
    $at_column = 'null';
    $op_column = 'null';
    
    if ($state_breakdown == 1) $state_column = 'state';
    if ($city_breakdown  == 1) $city_column  = 'city';
    if ($inout_breakdown == 1) $inout_column = 'in_out_patient';
    if ($hospital_breakdown == 1) $hospital_column = 'orgnpinum';
    if ($at_breakdown == 1) $at_column = 'at_npi';
    if ($op_breakdown == 1) $op_column = 'op_npi';
    
    
    
    
   
    
		$sql_statement = "SELECT icd_prcdr_cd, $state_column, $city_column, $inout_column, $hospital_column, $at_column, $op_column,  count(*)
							FROM claim_icd_codes
						   WHERE icd_prcdr_cd IN ($icd_code)
						GROUP BY icd_prcdr_cd, $state_column, $city_column, $inout_column, $hospital_column, $at_column, $op_column ";
						
						
				
       
          
                
                    

   	$count  = 1;
	$row    = [];
    $result = [];
        
	if( !$sql_execute = $db->query($sql_statement) )
		{
			return false;
		}
		
	while( $r = $sql_execute->fetch(PDO::FETCH_NUM) )
   {
	
		$row['icd_code']         = $r[0];
		$row['state']            = $r[1];
		$row['city']             = $r[2];
		$row['inout']            = $r[3];
		$row['hospital']         = $r[4];
		$row['at_npi']           = $r[5];
		$row['op_npi']           = $r[6];
		$row['icd_count']        = $r[7];
		
				
		$result[$count] = $row;
	
			  
	$count = $count + 1;  
	}
return 	$result;
}


function getINICDProcedureCount2013($icd_codes, $state_breakdown = 0,  $city_breakdown = 0, $inout_breakdown = 0, $hospital_breakdown= 0, $at_breakdown = 0, $op_breakdown = 0)
{
    $db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . INOUTCARR2013 . ';charset=UTF8', MYSQL_USERNAME, MYSQL_PASSWORD);

   // formatting cpt code from 0001F,0001A,00004 to '0001F','0001A','00004' to use with sql IN clause
   $icd_code_array = explode("," , $icd_codes);
   
   $icd_code = NULL;
   
   foreach ($icd_code_array as $icd_code_part)
   {
	if ( $icd_code == NULL )
		$icd_code = "'$icd_code_part'";
	else
		$icd_code .= ",'$icd_code_part'";
	   
	   
   }
    
    
    
    
    $state_column = 'null';
    $city_column  = 'null';
    $inout_column = 'null';
    $hospital_column = 'null';
    $at_column = 'null';
    $op_column = 'null';
    
    if ($state_breakdown == 1) $state_column = 'state';
    if ($city_breakdown  == 1) $city_column  = 'city';
    if ($inout_breakdown == 1) $inout_column = 'in_out_patient';
    if ($hospital_breakdown == 1) $hospital_column = 'orgnpinum';
    if ($at_breakdown == 1) $at_column = 'at_npi';
    if ($op_breakdown == 1) $op_column = 'op_npi';
    
    
    
    
   
    
		$sql_statement = "SELECT icd_prcdr_cd, $state_column, $city_column, $inout_column, $hospital_column, $at_column, $op_column,  count(*)
							FROM claim_icd_codes
						   WHERE icd_prcdr_cd IN ($icd_code)
						     AND in_out_patient = 'IN'
						GROUP BY icd_prcdr_cd, $state_column, $city_column, $inout_column, $hospital_column, $at_column, $op_column ";
						
						
				
       
          
                
                    

   	$count  = 1;
	$row    = [];
    $result = [];
        
	if( !$sql_execute = $db->query($sql_statement) )
		{
			return false;
		}
		
	while( $r = $sql_execute->fetch(PDO::FETCH_NUM) )
   {
	
		$row['icd_code']         = $r[0];
		$row['state']            = $r[1];
		$row['city']             = $r[2];
		$row['inout']            = $r[3];
		$row['hospital']         = $r[4];
		$row['at_npi']           = $r[5];
		$row['op_npi']           = $r[6];
		$row['icd_count']        = $r[7];
		
				
		$result[$count] = $row;
	
			  
	$count = $count + 1;  
	}
return 	$result;
}






function getICDDiagnosisCount($icd_codes, $state_breakdown = 0,  $city_breakdown = 0, $inout_breakdown = 0, $hospital_breakdown= 0, $at_breakdown = 0, $op_breakdown = 0)
{
    $db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DBNAME . ';charset=UTF8', MYSQL_USERNAME, MYSQL_PASSWORD);


// formatting cpt code from 0001F,0001A,00004 to '0001F','0001A','00004' to use with sql IN clause
   $icd_code_array = explode("," , $icd_codes);
   
   $icd_code = NULL;
   
   foreach ($icd_code_array as $icd_code_part)
   {
	if ( $icd_code == NULL )
		$icd_code = "'$icd_code_part'";
	else
		$icd_code .= ",'$icd_code_part'";
	   
	   
   }
   
    $state_column = 'null';
    $city_column  = 'null';
    $inout_column = 'null';
    $hospital_column = 'null';
    $at_column = 'null';
    $op_column = 'null';
    
    if ($state_breakdown == 1) $state_column = 'state';
    if ($city_breakdown  == 1) $city_column  = 'city';
    if ($inout_breakdown == 1) $inout_column = 'in_out_patient';
    if ($hospital_breakdown == 1) $hospital_column = 'orgnpinum';
    if ($at_breakdown == 1) $at_column = 'at_npi';
    if ($op_breakdown == 1) $op_column = 'op_npi';

		$sql_statement = "SELECT icd_dgns_cd, $state_column, $city_column, $inout_column, $hospital_column, $at_column, $op_column,  count(*)
							FROM claim_icd_dgns_codes
						   WHERE icd_dgns_cd IN ($icd_code)
						GROUP BY icd_dgns_cd, $state_column, $city_column, $inout_column, $hospital_column, $at_column, $op_column ";
						

   	$count  = 1;
	$row    = [];
    $result = [];
        
	if( !$sql_execute = $db->query($sql_statement) )
		{
			return false;
		}
		
	while( $r = $sql_execute->fetch(PDO::FETCH_NUM) )
   {
	
		$row['icd_code']         = $r[0];
		$row['state']            = $r[1];
		$row['city']             = $r[2];
		$row['inout']            = $r[3];
		$row['hospital']         = $r[4];
		$row['at_npi']           = $r[5];
		$row['op_npi']           = $r[6];
		$row['icd_count']        = $r[7];
		
				
		$result[$count] = $row;
	
			  
	$count = $count + 1;  
	}
return 	$result;
}

function getIN_ICDDiagnosis2013($icd_codes, $state_breakdown = 0,  $city_breakdown = 0, $inout_breakdown = 0, $hospital_breakdown= 0, $at_breakdown = 0, $op_breakdown = 0)
{
    $db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . INOUTCARR2013 . ';charset=UTF8', MYSQL_USERNAME, MYSQL_PASSWORD);


// formatting cpt code from 0001F,0001A,00004 to '0001F','0001A','00004' to use with sql IN clause
   $icd_code_array = explode("," , $icd_codes);
   
   $icd_code = NULL;
   
   foreach ($icd_code_array as $icd_code_part)
   {
	if ( $icd_code == NULL )
		$icd_code = "'$icd_code_part'";
	else
		$icd_code .= ",'$icd_code_part'";
	   
	   
   }
   
    $state_column = 'null';
    $city_column  = 'null';
    $inout_column = 'null';
    $hospital_column = 'null';
    $at_column = 'null';
    $op_column = 'null';
    
    if ($state_breakdown == 1) $state_column = 'state';
    if ($city_breakdown  == 1) $city_column  = 'city';
    if ($inout_breakdown == 1) $inout_column = 'in_out_patient';
    if ($hospital_breakdown == 1) $hospital_column = 'orgnpinum';
    if ($at_breakdown == 1) $at_column = 'at_npi';
    if ($op_breakdown == 1) $op_column = 'op_npi';

		$sql_statement = "SELECT icd_dgns_cd, $state_column, $city_column, $inout_column, $hospital_column, $at_column, $op_column,  count(*)
							FROM claim_icd_dgns_codes
						   WHERE icd_dgns_cd IN ($icd_code)
						     AND in_out_patient = 'IN'
						GROUP BY icd_dgns_cd, $state_column, $city_column, $inout_column, $hospital_column, $at_column, $op_column ";
						

   	$count  = 1;
	$row    = [];
    $result = [];
        
	if( !$sql_execute = $db->query($sql_statement) )
		{
			return false;
		}
		
	while( $r = $sql_execute->fetch(PDO::FETCH_NUM) )
   {
	
		$row['icd_code']         = $r[0];
		$row['state']            = $r[1];
		$row['city']             = $r[2];
		$row['inout']            = $r[3];
		$row['hospital']         = $r[4];
		$row['at_npi']           = $r[5];
		$row['op_npi']           = $r[6];
		$row['icd_count']        = $r[7];
		
				
		$result[$count] = $row;
	
			  
	$count = $count + 1;  
	}
return 	$result;
}





function getICD_Stats_perPhysician($icd_codes)
{
	  $db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DBNAME . ';charset=UTF8', MYSQL_USERNAME, MYSQL_PASSWORD);

   // formatting cpt code from 0001F,0001A,00004 to '0001F','0001A','00004' to use with sql IN clause
   $icd_code_array = explode("," , $icd_codes);
   
   $icd_code = NULL;
   
   foreach ($icd_code_array as $icd_code_part)
   {
	if ( $icd_code == NULL )
		$icd_code = "'$icd_code_part'";
	else
		$icd_code .= ",'$icd_code_part'";
	   
	   
   }

	
	
	
	$sql_statement = "
	SELECT op_stats.op_npi,
	       nppes.entity_type_code,
	       nppes.replacement_npi,
	       nppes.employer_identification_number,
	       nppes.provider_organization_name,
	       nppes.provider_last_name,
	       nppes.provider_first_name,
	       nppes.provider_middle_name,
	       nppes.provider_other_organization_name,
	       nppes.provider_first_line_business_mailing_address,
	       nppes.provider_second_line_business_mailing_address,
	       nppes.provider_business_mailing_address_city_name,
	       nppes.provider_business_mailing_address_state_name,
	       nppes.provider_business_mailing_address_postal_code,
	       nppes.provider_business_mailing_address_country_code,
	       nppes.provider_business_mailing_address_telephone_number,
	       nppes.provider_business_mailing_address_fax_number,
	       nppes.provider_first_line_business_practice_location_address,
	       nppes.provider_second_line_business_practice_location_address,
	       nppes.provider_business_practice_location_address_city_name,
	       nppes.provider_business_practice_location_address_state_name,
	       nppes.provider_business_practice_location_address_postal_code,
	       nppes.provider_business_practice_location_address_country_code,
	       nppes.provider_business_practice_location_address_telephone_number,
	       nppes.provider_business_practice_location_address_fax_number,
	       nppes.last_update_date,
	       nppes.npi_deactivation_reason_code,
	       op_stats.claim_count
	FROM 
	    (SELECT op_npi, count(*) as claim_count
		 FROM claim_icd_codes
	    WHERE icd_prcdr_cd IN ($icd_code)
		GROUP BY op_npi ) op_stats
		left join nppes on op_stats.op_npi = nppes.npi
	
	";
   //echo $sql_statement;
   //die();
    
	$count  = 1;
	$row    = [];
    $result = [];
        
	if( !$sql_execute = $db->query($sql_statement) )
		{
			return false;
		}
		
	while( $r = $sql_execute->fetch(PDO::FETCH_NUM) )
   {
	
		$row['npi']                            = $r[0];
		$row['entity_type_code']               = $r[1];
		$row['replacement_npi']                = $r[2];
		$row['employer_identification_number'] = $r[3];
		$row['provider_organization_name']     = $r[4];
		$row['provider_last_name']             = $r[5];
		$row['provider_first_name']            = $r[6];
		$row['provider_middle_name']           = $r[7];
		$row['provider_other_organization_name'] = $r[8];
		
		
		$row['provider_first_line_business_mailing_address']                 = $r[9];
		$row['provider_second_line_business_mailing_address']                = $r[10];
		$row['provider_business_mailing_address_city_name']                  = $r[11];
		$row['provider_business_mailing_address_state_name']                 = $r[12];
		$row['provider_business_mailing_address_postal_code']                = $r[13];
		$row['provider_business_mailing_address_country_code']               = $r[14];
		$row['provider_business_mailing_address_telephone_number']           = $r[15];
		$row['provider_business_mailing_address_fax_number']                 = $r[16];
		$row['provider_first_line_business_practice_location_address']       = $r[17];
		$row['provider_second_line_business_practice_location_address']      = $r[18];
		$row['provider_business_practice_location_address_city_name']        = $r[19];
		$row['provider_business_practice_location_address_state_name']       = $r[20];
		$row['provider_business_practice_location_address_postal_code']      = $r[21];
		$row['provider_business_practice_location_address_country_code']     = $r[22];
		$row['provider_business_practice_location_address_telephone_number'] = $r[23];
		$row['provider_business_practice_location_address_fax_number']       = $r[24];
		$row['last_update_date']                                             = $r[25];
		$row['npi_deactivation_reason_code']                                 = $r[26];
		$row['icd_count']                                                  = $r[27];
				
		$result[$count] = $row;
	
			  
	$count = $count + 1;  
	}
return 	$result;

}

function getIN_ICD_Stats_perPhysician2013($icd_codes)
{
	  $db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . INOUTCARR2013 . ';charset=UTF8', MYSQL_USERNAME, MYSQL_PASSWORD);

   // formatting cpt code from 0001F,0001A,00004 to '0001F','0001A','00004' to use with sql IN clause
   $icd_code_array = explode("," , $icd_codes);
   
   $icd_code = NULL;
   
   foreach ($icd_code_array as $icd_code_part)
   {
	if ( $icd_code == NULL )
		$icd_code = "'$icd_code_part'";
	else
		$icd_code .= ",'$icd_code_part'";
	   
	   
   }

	
	
	
	$sql_statement = "
	SELECT op_stats.op_npi,
	       nppes.entity_type_code,
	       nppes.replacement_npi,
	       nppes.employer_identification_number,
	       nppes.provider_organization_name,
	       nppes.provider_last_name,
	       nppes.provider_first_name,
	       nppes.provider_middle_name,
	       nppes.provider_other_organization_name,
	       nppes.provider_first_line_business_mailing_address,
	       nppes.provider_second_line_business_mailing_address,
	       nppes.provider_business_mailing_address_city_name,
	       nppes.provider_business_mailing_address_state_name,
	       nppes.provider_business_mailing_address_postal_code,
	       nppes.provider_business_mailing_address_country_code,
	       nppes.provider_business_mailing_address_telephone_number,
	       nppes.provider_business_mailing_address_fax_number,
	       nppes.provider_first_line_business_practice_location_address,
	       nppes.provider_second_line_business_practice_location_address,
	       nppes.provider_business_practice_location_address_city_name,
	       nppes.provider_business_practice_location_address_state_name,
	       nppes.provider_business_practice_location_address_postal_code,
	       nppes.provider_business_practice_location_address_country_code,
	       nppes.provider_business_practice_location_address_telephone_number,
	       nppes.provider_business_practice_location_address_fax_number,
	       nppes.last_update_date,
	       nppes.npi_deactivation_reason_code,
	       op_stats.claim_count
	FROM 
	    (SELECT op_npi, count(*) as claim_count
		 FROM claim_icd_codes
	    WHERE icd_prcdr_cd IN ($icd_code)
	    AND in_out_patient = 'IN'
		GROUP BY op_npi ) op_stats
		left join procedure_tracker_2014.nppes on op_stats.op_npi = nppes.npi
	
	";
   //echo $sql_statement;
   //die();
    
	$count  = 1;
	$row    = [];
    $result = [];
        
	if( !$sql_execute = $db->query($sql_statement) )
		{
			return false;
		}
		
	while( $r = $sql_execute->fetch(PDO::FETCH_NUM) )
   {
	
		$row['npi']                            = $r[0];
		$row['entity_type_code']               = $r[1];
		$row['replacement_npi']                = $r[2];
		$row['employer_identification_number'] = $r[3];
		$row['provider_organization_name']     = $r[4];
		$row['provider_last_name']             = $r[5];
		$row['provider_first_name']            = $r[6];
		$row['provider_middle_name']           = $r[7];
		$row['provider_other_organization_name'] = $r[8];
		
		
		$row['provider_first_line_business_mailing_address']                 = $r[9];
		$row['provider_second_line_business_mailing_address']                = $r[10];
		$row['provider_business_mailing_address_city_name']                  = $r[11];
		$row['provider_business_mailing_address_state_name']                 = $r[12];
		$row['provider_business_mailing_address_postal_code']                = $r[13];
		$row['provider_business_mailing_address_country_code']               = $r[14];
		$row['provider_business_mailing_address_telephone_number']           = $r[15];
		$row['provider_business_mailing_address_fax_number']                 = $r[16];
		$row['provider_first_line_business_practice_location_address']       = $r[17];
		$row['provider_second_line_business_practice_location_address']      = $r[18];
		$row['provider_business_practice_location_address_city_name']        = $r[19];
		$row['provider_business_practice_location_address_state_name']       = $r[20];
		$row['provider_business_practice_location_address_postal_code']      = $r[21];
		$row['provider_business_practice_location_address_country_code']     = $r[22];
		$row['provider_business_practice_location_address_telephone_number'] = $r[23];
		$row['provider_business_practice_location_address_fax_number']       = $r[24];
		$row['last_update_date']                                             = $r[25];
		$row['npi_deactivation_reason_code']                                 = $r[26];
		$row['icd_count']                                                  = $r[27];
				
		$result[$count] = $row;
	
			  
	$count = $count + 1;  
	}
return 	$result;

}




function getICD_Stats_perHospital($icd_codes)
{
	  $db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DBNAME . ';charset=UTF8', MYSQL_USERNAME, MYSQL_PASSWORD);

   // formatting cpt code from 0001F,0001A,00004 to '0001F','0001A','00004' to use with sql IN clause
   $icd_code_array = explode("," , $icd_codes);
   
   $icd_code = NULL;
   
   foreach ($icd_code_array as $icd_code_part)
   {
	if ( $icd_code == NULL )
		$icd_code = "'$icd_code_part'";
	else
		$icd_code .= ",'$icd_code_part'";
	   
	   
   }

	
	
	
	$sql_statement = "
	SELECT op_stats.ORGNPINUM,
	       nppes.entity_type_code,
	       nppes.replacement_npi,
	       nppes.employer_identification_number,
	       nppes.provider_organization_name,
	       nppes.provider_last_name,
	       nppes.provider_first_name,
	       nppes.provider_middle_name,
	       nppes.provider_other_organization_name,
	       nppes.provider_first_line_business_mailing_address,
	       nppes.provider_second_line_business_mailing_address,
	       nppes.provider_business_mailing_address_city_name,
	       nppes.provider_business_mailing_address_state_name,
	       nppes.provider_business_mailing_address_postal_code,
	       nppes.provider_business_mailing_address_country_code,
	       nppes.provider_business_mailing_address_telephone_number,
	       nppes.provider_business_mailing_address_fax_number,
	       nppes.provider_first_line_business_practice_location_address,
	       nppes.provider_second_line_business_practice_location_address,
	       nppes.provider_business_practice_location_address_city_name,
	       nppes.provider_business_practice_location_address_state_name,
	       nppes.provider_business_practice_location_address_postal_code,
	       nppes.provider_business_practice_location_address_country_code,
	       nppes.provider_business_practice_location_address_telephone_number,
	       nppes.provider_business_practice_location_address_fax_number,
	       nppes.last_update_date,
	       nppes.npi_deactivation_reason_code,
	       op_stats.claim_count
	FROM 
	    (SELECT ORGNPINUM, count(*) as claim_count
		 FROM claim_icd_codes
	    WHERE icd_prcdr_cd IN ($icd_code)
		GROUP BY ORGNPINUM ) op_stats
		left join nppes on op_stats.ORGNPINUM = nppes.npi
	
	";
   //echo $sql_statement;
   //die();
    
	$count  = 1;
	$row    = [];
    $result = [];
        
	if( !$sql_execute = $db->query($sql_statement) )
		{
			return false;
		}
		
	while( $r = $sql_execute->fetch(PDO::FETCH_NUM) )
   {
	
		$row['npi']                            = $r[0];
		$row['entity_type_code']               = $r[1];
		$row['replacement_npi']                = $r[2];
		$row['employer_identification_number'] = $r[3];
		$row['provider_organization_name']     = $r[4];
		$row['provider_last_name']             = $r[5];
		$row['provider_first_name']            = $r[6];
		$row['provider_middle_name']           = $r[7];
		$row['provider_other_organization_name'] = $r[8];
		
		
		$row['provider_first_line_business_mailing_address']                 = $r[9];
		$row['provider_second_line_business_mailing_address']                = $r[10];
		$row['provider_business_mailing_address_city_name']                  = $r[11];
		$row['provider_business_mailing_address_state_name']                 = $r[12];
		$row['provider_business_mailing_address_postal_code']                = $r[13];
		$row['provider_business_mailing_address_country_code']               = $r[14];
		$row['provider_business_mailing_address_telephone_number']           = $r[15];
		$row['provider_business_mailing_address_fax_number']                 = $r[16];
		$row['provider_first_line_business_practice_location_address']       = $r[17];
		$row['provider_second_line_business_practice_location_address']      = $r[18];
		$row['provider_business_practice_location_address_city_name']        = $r[19];
		$row['provider_business_practice_location_address_state_name']       = $r[20];
		$row['provider_business_practice_location_address_postal_code']      = $r[21];
		$row['provider_business_practice_location_address_country_code']     = $r[22];
		$row['provider_business_practice_location_address_telephone_number'] = $r[23];
		$row['provider_business_practice_location_address_fax_number']       = $r[24];
		$row['last_update_date']                                             = $r[25];
		$row['npi_deactivation_reason_code']                                 = $r[26];
		$row['icd_count']                                                  = $r[27];
				
		$result[$count] = $row;
	
			  
	$count = $count + 1;  
	}
return 	$result;

}


function getIN_ICD_Stats_perHospital2013($icd_codes)
{
	  $db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . INOUTCARR2013 . ';charset=UTF8', MYSQL_USERNAME, MYSQL_PASSWORD);

   // formatting cpt code from 0001F,0001A,00004 to '0001F','0001A','00004' to use with sql IN clause
   $icd_code_array = explode("," , $icd_codes);
   
   $icd_code = NULL;
   
   foreach ($icd_code_array as $icd_code_part)
   {
	if ( $icd_code == NULL )
		$icd_code = "'$icd_code_part'";
	else
		$icd_code .= ",'$icd_code_part'";
	   
	   
   }

	
	
	
	$sql_statement = "
	SELECT op_stats.ORGNPINUM,
	       nppes.entity_type_code,
	       nppes.replacement_npi,
	       nppes.employer_identification_number,
	       nppes.provider_organization_name,
	       nppes.provider_last_name,
	       nppes.provider_first_name,
	       nppes.provider_middle_name,
	       nppes.provider_other_organization_name,
	       nppes.provider_first_line_business_mailing_address,
	       nppes.provider_second_line_business_mailing_address,
	       nppes.provider_business_mailing_address_city_name,
	       nppes.provider_business_mailing_address_state_name,
	       nppes.provider_business_mailing_address_postal_code,
	       nppes.provider_business_mailing_address_country_code,
	       nppes.provider_business_mailing_address_telephone_number,
	       nppes.provider_business_mailing_address_fax_number,
	       nppes.provider_first_line_business_practice_location_address,
	       nppes.provider_second_line_business_practice_location_address,
	       nppes.provider_business_practice_location_address_city_name,
	       nppes.provider_business_practice_location_address_state_name,
	       nppes.provider_business_practice_location_address_postal_code,
	       nppes.provider_business_practice_location_address_country_code,
	       nppes.provider_business_practice_location_address_telephone_number,
	       nppes.provider_business_practice_location_address_fax_number,
	       nppes.last_update_date,
	       nppes.npi_deactivation_reason_code,
	       op_stats.claim_count
	FROM 
	    (SELECT ORGNPINUM, count(*) as claim_count
		 FROM claim_icd_codes
	    WHERE icd_prcdr_cd IN ($icd_code)
	      AND in_out_patient = 'IN'
		GROUP BY ORGNPINUM ) op_stats
		left join procedure_tracker_2014.nppes on op_stats.ORGNPINUM = nppes.npi
	
	";
   //echo $sql_statement;
   //die();
    
	$count  = 1;
	$row    = [];
    $result = [];
        
	if( !$sql_execute = $db->query($sql_statement) )
		{
			return false;
		}
		
	while( $r = $sql_execute->fetch(PDO::FETCH_NUM) )
   {
	
		$row['npi']                            = $r[0];
		$row['entity_type_code']               = $r[1];
		$row['replacement_npi']                = $r[2];
		$row['employer_identification_number'] = $r[3];
		$row['provider_organization_name']     = $r[4];
		$row['provider_last_name']             = $r[5];
		$row['provider_first_name']            = $r[6];
		$row['provider_middle_name']           = $r[7];
		$row['provider_other_organization_name'] = $r[8];
		
		
		$row['provider_first_line_business_mailing_address']                 = $r[9];
		$row['provider_second_line_business_mailing_address']                = $r[10];
		$row['provider_business_mailing_address_city_name']                  = $r[11];
		$row['provider_business_mailing_address_state_name']                 = $r[12];
		$row['provider_business_mailing_address_postal_code']                = $r[13];
		$row['provider_business_mailing_address_country_code']               = $r[14];
		$row['provider_business_mailing_address_telephone_number']           = $r[15];
		$row['provider_business_mailing_address_fax_number']                 = $r[16];
		$row['provider_first_line_business_practice_location_address']       = $r[17];
		$row['provider_second_line_business_practice_location_address']      = $r[18];
		$row['provider_business_practice_location_address_city_name']        = $r[19];
		$row['provider_business_practice_location_address_state_name']       = $r[20];
		$row['provider_business_practice_location_address_postal_code']      = $r[21];
		$row['provider_business_practice_location_address_country_code']     = $r[22];
		$row['provider_business_practice_location_address_telephone_number'] = $r[23];
		$row['provider_business_practice_location_address_fax_number']       = $r[24];
		$row['last_update_date']                                             = $r[25];
		$row['npi_deactivation_reason_code']                                 = $r[26];
		$row['icd_count']                                                  = $r[27];
				
		$result[$count] = $row;
	
			  
	$count = $count + 1;  
	}
return 	$result;

}



function getNPIdetails($npi)
{
	$db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DBNAME . ';charset=UTF8', MYSQL_USERNAME, MYSQL_PASSWORD);


	
	
	
	$sql_statement = "
	SELECT npi,
	       entity_type_code,
	       replacement_npi,
	       employer_identification_number,
	       provider_organization_name,
	       provider_last_name,
	       provider_first_name,
	       provider_middle_name,
	       provider_other_organization_name,
	       provider_first_line_business_mailing_address,
	       provider_second_line_business_mailing_address,
	       provider_business_mailing_address_city_name,
	       provider_business_mailing_address_state_name,
	       provider_business_mailing_address_postal_code,
	       provider_business_mailing_address_country_code,
	       provider_business_mailing_address_telephone_number,
	       provider_business_mailing_address_fax_number,
	       provider_first_line_business_practice_location_address,
	       provider_second_line_business_practice_location_address,
	       provider_business_practice_location_address_city_name,
	       provider_business_practice_location_address_state_name,
	       provider_business_practice_location_address_postal_code,
	       provider_business_practice_location_address_country_code,
	       provider_business_practice_location_address_telephone_number,
	       provider_business_practice_location_address_fax_number,
	       last_update_date,
	       npi_deactivation_reason_code
	FROM 
		nppes
	WHERE 
	    npi = $npi
	";
   
    
	$count  = 1;
	$row    = [];
    $result = [];
        
	if( !$sql_execute = $db->query($sql_statement) )
		{
			return false;
		}
		
	while( $r = $sql_execute->fetch(PDO::FETCH_NUM) )
   {
	
		$row['npi']                            = $r[0];
		$row['entity_type_code']               = $r[1];
		$row['replacement_npi']                = $r[2];
		$row['employer_identification_number'] = $r[3];
		$row['provider_organization_name']     = $r[4];
		$row['provider_last_name']             = $r[5];
		$row['provider_first_name']            = $r[6];
		$row['provider_middle_name']           = $r[7];
		$row['provider_other_organization_name'] = $r[8];
		
		
		$row['provider_first_line_business_mailing_address']                 = $r[9];
		$row['provider_second_line_business_mailing_address']                = $r[10];
		$row['provider_business_mailing_address_city_name']                  = $r[11];
		$row['provider_business_mailing_address_state_name']                 = $r[12];
		$row['provider_business_mailing_address_postal_code']                = $r[13];
		$row['provider_business_mailing_address_country_code']               = $r[14];
		$row['provider_business_mailing_address_telephone_number']           = $r[15];
		$row['provider_business_mailing_address_fax_number']                 = $r[16];
		$row['provider_first_line_business_practice_location_address']       = $r[17];
		$row['provider_second_line_business_practice_location_address']      = $r[18];
		$row['provider_business_practice_location_address_city_name']        = $r[19];
		$row['provider_business_practice_location_address_state_name']       = $r[20];
		$row['provider_business_practice_location_address_postal_code']      = $r[21];
		$row['provider_business_practice_location_address_country_code']     = $r[22];
		$row['provider_business_practice_location_address_telephone_number'] = $r[23];
		$row['provider_business_practice_location_address_fax_number']       = $r[24];
		$row['last_update_date']                                             = $r[25];
		$row['npi_deactivation_reason_code']                                 = $r[26];
				
		$result[$count] = $row;
	
			  
	$count = $count + 1;  
	}
return 	$result;

}



function save_review_dates($db, $link_saved_policy_id, $last_review_date, $next_review_date, $effective_date, $revised_date = null)
{
  $db->beginTransaction();
    // echo "sql: " . "UPDATE link_saved_policy SET last_review_date = $last_review_date, next_review_date = $next_review_date, effective_date = $effective_date  WHERE link_saved_policy_id = $link_saved_policy_id \n\r";
    $sql_exec = $db->exec( "UPDATE link_saved_policy SET last_review_date = $last_review_date, next_review_date = $next_review_date, effective_date = $effective_date, last_revised_date = $revised_date   WHERE link_saved_policy_id = $link_saved_policy_id");
    $db->commit();
    
};
