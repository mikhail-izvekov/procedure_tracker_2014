<?php

require_once( 'inc.__config.php' );

class Core
{
    public function __construct()
    {
        $this->returntransfer = true;
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT    => false,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );
        
        try
        {
            $this->db = new PDO($dsn, $this->user, $this->pass, $options);
        }
        catch(PDOException $e)
        {
            $this->error = $e->getMessage();
        }
    }
    public function prepare($query)
    {
        $this->prepare = $this->db->prepare($query);
    }
    
    public function bind($param, $value, $type = null)
    {
        if (is_null($type))
        {
            switch (true)
            {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->prepare->bindValue($param, $value, $type);
    }
    
    public function execute()
    {
        return $this->prepare->execute();
    }
    
    public function fetchAssocAllResults()
    {
        $this->execute();
        return $this->prepare->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function fetchAssocResult()
    {
        $this->execute();
        return $this->prepare->fetch(PDO::FETCH_ASSOC);
    }
    
    public function fetchNumAllResults()
    {
        $this->execute();
        return $this->prepare->fetchAll(PDO::FETCH_NUM);
    }
    
    public function fetchNumResult()
    {
        $this->execute();
        return $this->prepare->fetch(PDO::FETCH_NUM);
    }
    
    public function fetchOneResult()
    {
        $this->execute();
        return $this->prepare->fetchcolumn(0);
    }
    
    public function rowCount()
    {
        return $this->prepare->rowCount();
    }
    
    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
    
    public function beginTransaction()
    {
        return $this->db->beginTransaction();
    }
    
    public function commit()
    {
        return $this->db->commit();
    }

    public function rollBack()
    {
        return $this->db->rollBack();
    }
    
    public function debugDumpParams()
    {
        return $this->prepare->debugDumpParams();
    }
    public function stripExtra($xpath=null)
    {
        if( !empty($xpath) )
        {
           $tempDOM = new DOMDocument();
            @$tempDOM->loadHTML('<?xml encoding="UTF-8">' . $this->content);
            // dirty fix
            foreach ($tempDOM->childNodes as $item)
            {
                if ($item->nodeType == XML_PI_NODE)
                    $tempDOM->removeChild($item); // remove hack
            }
            $tempDOM->encoding = 'UTF-8'; // insert proper
            $tempXPath = new DOMXPath($tempDOM);
            
            $temp_content = $tempXPath->query($xpath)->item(0);

            $temp_content = $tempDOM->saveHTML($temp_content);
            
            $newTempDOM = new DOMDocument();
            
            @$newTempDOM->loadHTML('<?xml encoding="UTF-8">' . $temp_content );
            // dirty fix
            foreach ($newTempDOM->childNodes as $item)
            {
                if ($item->nodeType == XML_PI_NODE)
                    $newTempDOM->removeChild($item); // remove hack
            }
            $newTempDOM->encoding = 'UTF-8'; // insert proper
            
            $this->content = $newTempDOM->saveHTML();
            
            return true;
        }
        return false;
    }
    
    public function errorMsg( $error_message )
    {
        $this->msg[__METHOD__]['__fatal'][] = $msg;
            
            echo '<pre>';
            print_r( $this->msg );
            echo '</pre>';
            die(__LINE__);
    }
    
    public function tidy( $html )
    {
        is_array( $html )
            ? $html = join(',', $html )
            : null;
        
        $html = str_replace(['&#160;','&nbsp;'], [' ', ' '], $html );
        
        $config = [
           'indent'             => false,
           'char-encoding'      => 'utf8',
           'input-encoding'     => 'utf8',
           'output-encoding'    => 'utf8'];
        
        $tidy = new tidy;
        $tidy->parseString($html, $config);
        $tidy->cleanRepair();
        
        return $tidy;
    }
    
    private $host      = MYSQL_HOST;
    private $user      = MYSQL_USERNAME;
    private $pass      = MYSQL_PASSWORD;
    private $dbname    = MYSQL_DBNAME;
    private $db;
    private $error;
    private $prepare;
    protected $id; // insurer_id/insurer_directory_id/link_id
    private $msg; // Output message for logging/debugging.
}