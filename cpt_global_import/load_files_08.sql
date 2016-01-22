
LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS01_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS02_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS03_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS04_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS05_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS06_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS07_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS08_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS09_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS010_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS011_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS012_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';
LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS013_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS014_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS015_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS016_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS017_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS018_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS019_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS020_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS021_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS022_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS023_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS024_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS025_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS026_NEW.txt' 
INTO TABLE supplier_procedure_summary_08
FIELDS TERMINATED BY ';';

CREATE INDEX hcpcs_code_08_idx ON supplier_procedure_summary_08 (hcpcs_code);

