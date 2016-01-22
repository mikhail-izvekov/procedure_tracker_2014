insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD1	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD1 is not null
	
and    i.ICD_DGNS_CD1 <> '';


insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD2	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD2 is not null
	
and    i.ICD_DGNS_CD2 <> '';





insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD3	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD3 is not null
	
and    i.ICD_DGNS_CD3 <> '';





insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD4	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD4 is not null
	
and    i.ICD_DGNS_CD4 <> '';






insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD5	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD5 is not null
	
and    i.ICD_DGNS_CD5 <> '';





insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD6	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD6 is not null
	
and    i.ICD_DGNS_CD6 <> '';








insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD7	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD7 is not null
	
and    i.ICD_DGNS_CD7 <> '';






insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD8	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD8 is not null
	
and    i.ICD_DGNS_CD8 <> '';





insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD9	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD9 is not null
	
and    i.ICD_DGNS_CD9 <> '';






insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD10	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD10 is not null
	
and    i.ICD_DGNS_CD10 <> '';




insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD11	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD11 is not null
	
and    i.ICD_DGNS_CD11 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD12	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD12 is not null
	
and    i.ICD_DGNS_CD12 <> '';




insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD13	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD13 is not null
	
and    i.ICD_DGNS_CD13 <> '';


insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD14	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD14 is not null
	
and    i.ICD_DGNS_CD14 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD15	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD15 is not null
	
and    i.ICD_DGNS_CD15 <> '';




insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD16	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD16 is not null
	
and    i.ICD_DGNS_CD16 <> '';





insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD17	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD17 is not null
	
and    i.ICD_DGNS_CD17 <> '';





insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD18	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD18 is not null
	
and    i.ICD_DGNS_CD18 <> '';





insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD19	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD19 is not null
	
and    i.ICD_DGNS_CD19 <> '';





insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD20
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD20 is not null
	
and    i.ICD_DGNS_CD20 <> '';





insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD21	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD21 is not null
	
and    i.ICD_DGNS_CD21 <> '';





insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD22	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD22 is not null
	
and    i.ICD_DGNS_CD22 <> '';




insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD23	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD23 is not null
	
and    i.ICD_DGNS_CD23 <> '';





insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD24	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD24 is not null
	
and    i.ICD_DGNS_CD24 <> '';




insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'IN',

        n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD25	
from   inpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD25 is not null
	
and    i.ICD_DGNS_CD25 <> '';



-- inserting out-patients


insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD1
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD1 is not null
	
and    i.ICD_DGNS_CD1 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD2
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD2 is not null
	
and    i.ICD_DGNS_CD2 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD3
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD3 is not null
	
and    i.ICD_DGNS_CD3 <> '';


insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD4
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD4 is not null
	
and    i.ICD_DGNS_CD4 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD5
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD5 is not null
	
and    i.ICD_DGNS_CD5 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD6
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD6 is not null
	
and    i.ICD_DGNS_CD6 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD7
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD7 is not null
	
and    i.ICD_DGNS_CD7 <> '';


insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD8
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD8 is not null
	
and    i.ICD_DGNS_CD8 <> '';


insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD9
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD9 is not null
	
and    i.ICD_DGNS_CD9 <> '';


insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD10
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD10 is not null
	
and    i.ICD_DGNS_CD10 <> '';




insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD11
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD11 is not null
	
and    i.ICD_DGNS_CD11 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD12
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD12 is not null
	
and    i.ICD_DGNS_CD12 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD13
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD13 is not null
	
and    i.ICD_DGNS_CD13 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD14
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD14 is not null
	
and    i.ICD_DGNS_CD14 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD15
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD15 is not null
	
and    i.ICD_DGNS_CD15 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD16
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD16 is not null
	
and    i.ICD_DGNS_CD16 <> '';


insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD17
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD17 is not null
	
and    i.ICD_DGNS_CD17 <> '';


insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD18	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD18 is not null
	
and    i.ICD_DGNS_CD18 <> '';


insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD19
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD19 is not null
	
and    i.ICD_DGNS_CD19 <> '';


insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD20
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD20 is not null
	
and    i.ICD_DGNS_CD20 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD21
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD21 is not null
	
and    i.ICD_DGNS_CD21 <> '';


insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD22
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD22 is not null
	
and    i.ICD_DGNS_CD22 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD23
	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD23 is not null
	
and    i.ICD_DGNS_CD23 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD24	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD24 is not null
	
and    i.ICD_DGNS_CD24 <> '';



insert claim_icd_dgns_codes(
			
	CLAIMNO,
			
	ORGNPINUM,
			
	AT_NPI,
			
	OP_NPI,
			
	STATE,
            
	IN_OUT_PATIENT,
			
	CITY,
			
	ICD_DGNS_CD)
		
select 
		   
	i.claimno,
		   
	i.orgnpinm,
		   
	i.at_npi, 
		   
	i.op_npi,
           
	n.Provider_Business_Practice_Location_Address_State_Name,
		   
	'OUT',
           n.Provider_Business_Practice_Location_Address_City_Name,
		   
	i.ICD_DGNS_CD25	
from   outpatient_base i 
	
join   procedure_tracker_2014.nppes n on i.orgnpinm = n.npi
	
where  i.ICD_DGNS_CD25 is not null
	
and    i.ICD_DGNS_CD25 <> '';














