<?php

date_default_timezone_set('America/Vancouver');
ini_set('display_errors', 1);

    $web_root = 'http://192.168.1.63:2000';
    $server_root = '/var/www/proceduretracker.com';
    $shell_host = "192.168.1.63";
    $shell_port = '22';
    $shell_username = 'mikhaili';
    $shell_password = 'izvekov';
    


define("MYSQL_HOST", "192.168.1.101", true);
define("MYSQL_DBNAME", "procedure_tracker_2014", true);
define("INOUTCARR2013", "procedure_tracker_2013", true);
define("MYSQL_USERNAME", "reimburse_dev", true);
define("MYSQL_PASSWORD", "zxcvVCXZ11!!", true);



define("WEB_ROOT", $web_root, true);
define("SERVER_ROOT", $server_root, true);
define("SHELL_HOST", $shell_host, true);
define("SHELL_PORT", $shell_port, true);
define("SHELL_USERNAME", $shell_username, true);
define("SHELL_PASSWORD", $shell_password, true);
