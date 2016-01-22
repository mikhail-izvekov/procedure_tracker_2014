
-- in patients

LOAD DATA INFILE 'E:/xampp/htdocs/CMS_LDS_2013/inp_saf_lds_100_a/inp_claimsj_lds_100_2013.csv' 
INTO TABLE inpatient_base
FIELDS TERMINATED BY ',';

LOAD DATA INFILE 'E:/xampp/htdocs/CMS_LDS_2013/inp_saf_lds_100_b/inp_revenuej_lds_100_2013.csv' 
INTO TABLE inpatient_rev
FIELDS TERMINATED BY ',';



-- out patients

LOAD DATA INFILE 'E:/xampp/htdocs/CMS_LDS_2013/out_saf_lds_5_2013/out_claimsj_lds_5_2013.csv' 
INTO TABLE outpatient_base
FIELDS TERMINATED BY ',';

LOAD DATA INFILE 'E:/xampp/htdocs/CMS_LDS_2013/out_saf_lds_5_2013/out_revenuej_lds_5_2013.csv' 
INTO TABLE outpatient_rev
FIELDS TERMINATED BY ',';


-- carriers

LOAD DATA INFILE 'E:/xampp/htdocs/CMS_LDS_2013/car_saf_lds_5_2013/car_claimsj_lds_5_2013.csv' 
INTO TABLE carrier_base
FIELDS TERMINATED BY ',';

LOAD DATA INFILE 'E:/xampp/htdocs/CMS_LDS_2013/car_saf_lds_5_2013/car_linej_lds_5_2013.csv' 
INTO TABLE carrier_rev
FIELDS TERMINATED BY ',';










