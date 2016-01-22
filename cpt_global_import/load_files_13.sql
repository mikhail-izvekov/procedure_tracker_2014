

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS01_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS02_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS03_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS04_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS05_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS06_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS07_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS08_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS09_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS10_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS11_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS12_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';
LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS13_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS14_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS15_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS16_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS17_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';


LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS18_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';


LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS19_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS20_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS21_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS22_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS23_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS24_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';

LOAD DATA INFILE 'E:/xampp/htdocs/cpt_global_load/PSPS25_NEW.txt' 
INTO TABLE supplier_procedure_summary_13
FIELDS TERMINATED BY ';';



CREATE INDEX hcpcs_code_13_idx ON supplier_procedure_summary_13 (hcpcs_code);

