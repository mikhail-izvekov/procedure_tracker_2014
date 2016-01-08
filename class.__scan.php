<?php

require_once( 'class.__utility.php' );

class Scan extends Utility
{
    public function __construct()
    {
        parent::__construct();
        $this->cookie_string = '';
    }
    
      public function getContent()
    {
        $url = $this->url;
        $url = str_replace( " ", "%20", $url );
        $cookie_file = dirname(__FILE__) . DIRECTORY_SEPARATOR . "tmp" . DIRECTORY_SEPARATOR . explode('/', $this->url )[2] . '.txt';
        
        $ch = curl_init();

        $secure_connection = strpos( $this->url, 'https' ) !== false
            ? TRUE
            : FALSE;
        
        
        isset($this->get_header_only) && !empty($this->get_header_only)
            ? curl_setopt($ch, CURLOPT_HEADER, true)
            : null;    
        
            
            
        isset( $headers ) && !empty( $headers )
            ? curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers )
            : null;
        
        curl_setopt( $ch, CURLOPT_ENCODING, '');            
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, $this->returntransfer );
        
        $this->insurer_directory_type == 2 //GOVERNMENT directory
            ? curl_setopt( $ch, CURLOPT_USERAGENT, 'curl/7.19.7 (i386-redhat-linux-gnu) libcurl/7.19.7 NSS/3.15.3 zlib/1.2.3 libidn/1.18 libssh2/1.4.2')
            : curl_setopt( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0');    
        
        curl_setopt( $ch, CURLOPT_HEADER, false );
        curl_setopt( $ch, CURLINFO_HEADER_OUT, true );
        curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
        
        isset($this->referer) && !empty($this->referer)
            ? curl_setopt($ch, CURLOPT_REFERER, $this->referer)
            : null;

        if( $this->is_cookie_loop == false )
        {
            curl_setopt( $ch, CURLOPT_COOKIESESSION, false );
            curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie_file );
        }
        else
        {
            curl_setopt( $ch, CURLOPT_COOKIESESSION, true );
            curl_setopt( $ch, CURLOPT_COOKIEFILE, $cookie_file );
        }
        // Originaly, this was commented out - MI
        $this->cookie_string != ''
            ? curl_setopt( $ch, CURLOPT_COOKIE, $this->cookie_string )
            : null;
        

            curl_setopt( $ch, CURLOPT_VERBOSE, TRUE);
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
            curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt( $ch, CURLOPT_CAINFO, SERVER_ROOT . DIRECTORY_SEPARATOR . 'certs/ca-bundle.crt' );

        
        //if( $this->is_insurer_directory == false && $timestamp = $this->getLatestPolicyTimestamp() )
        //{
        //    $this->msg[__METHOD__]['__status'][] =  "Timestamp Proccessed for " . $this->link_type . "# " . $this->id . "!";
        //    curl_setopt( $ch, CURLOPT_TIMEVALUE, $timestamp );
        //    curl_setopt( $ch, CURLOPT_TIMECONDITION, CURL_TIMECOND_IFMODSINCE );
        //}
        
        if( isset( $this->post_vars ) && !empty($this->post_vars) )
        {
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $this->post_vars );
        }
        
        $verbose = fopen('php://temp', 'rw+');
        curl_setopt( $ch, CURLOPT_STDERR, $verbose );
        
        $errors = curl_error( $ch );
        $content = curl_exec( $ch );
        $this->content = $content;
        $response = curl_getinfo( $ch );

        $this->response = $response;
        $this->http_code = $response['http_code'];
        //$this->setHttpStatus();
        
        if ($content === FALSE)
        {
            printf("cUrl error (#%d): %s<br>\n", curl_errno($ch),
            htmlspecialchars(curl_error($ch)));
            
            if( !empty( $errors ) )
            {
                rewind($verbose);
                $verboseLog = stream_get_contents($verbose);
                $this->msg[__METHOD__]['__fatal'][] = "Verbose information:\n<pre>" . htmlspecialchars($verboseLog) . "</pre>\n";
            }    
        }
        
        $this->content_type = $response['content_type'];
        
        curl_close( $ch );
        
        unset( $ch );
        return false;
    }
 
 
       public function getTmpContent($url)  // replica of getContent() function that stores content in 
                                        // $this->tmp_content. FOR DOMINO directory I need two instances of content
    {
        
        $url = str_replace( " ", "%20", $url );
        $cookie_file = dirname(__FILE__) . DIRECTORY_SEPARATOR . "tmp" . DIRECTORY_SEPARATOR . explode('/', $this->url )[2] . '.txt';
        
        $ch = curl_init();

        $secure_connection = strpos( $this->url, 'https' ) !== false
            ? TRUE
            : FALSE;
            
        isset( $headers ) && !empty( $headers )
            ? curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers )
            : null;
        
        curl_setopt( $ch, CURLOPT_ENCODING, '');            
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, $this->returntransfer );
        
        $this->insurer_directory_type == 2 //GOVERNMENT directory
            ? curl_setopt( $ch, CURLOPT_USERAGENT, 'curl/7.19.7 (i386-redhat-linux-gnu) libcurl/7.19.7 NSS/3.15.3 zlib/1.2.3 libidn/1.18 libssh2/1.4.2')
            : curl_setopt( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0');    
        
        curl_setopt( $ch, CURLOPT_HEADER, false );
        curl_setopt( $ch, CURLINFO_HEADER_OUT, true );
        curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
        
        isset($this->referer) && !empty($this->referer)
            ? curl_setopt($ch, CURLOPT_REFERER, $this->referer)
            : null;

        if( $this->is_cookie_loop == false )
        {
            curl_setopt( $ch, CURLOPT_COOKIESESSION, false );
            curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie_file );
        }
        else
        {
            curl_setopt( $ch, CURLOPT_COOKIESESSION, true );
            curl_setopt( $ch, CURLOPT_COOKIEFILE, $cookie_file );
        }
        
        //$this->cookie_string != ''
        //    ? curl_setopt( $ch, CURLOPT_COOKIE, $this->cookie_string )
        //    : null;
        //

            curl_setopt( $ch, CURLOPT_VERBOSE, TRUE);
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
            curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt( $ch, CURLOPT_CAINFO, SERVER_ROOT . DIRECTORY_SEPARATOR . 'certs/ca-bundle.crt' );

        
        //if( $this->is_insurer_directory == false && $timestamp = $this->getLatestPolicyTimestamp() )
        //{
        //    $this->msg[__METHOD__]['__status'][] =  "Timestamp Proccessed for " . $this->link_type . "# " . $this->id . "!";
        //    curl_setopt( $ch, CURLOPT_TIMEVALUE, $timestamp );
        //    curl_setopt( $ch, CURLOPT_TIMECONDITION, CURL_TIMECOND_IFMODSINCE );
        //}
        
        if( isset( $this->post_vars ) && !empty($this->post_vars) )
        {
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $this->post_vars );
        }
        
        $verbose = fopen('php://temp', 'rw+');
        curl_setopt( $ch, CURLOPT_STDERR, $verbose );
        
        $errors = curl_error( $ch );
        $content = curl_exec( $ch );
        $this->tmp_content = $content;
        $response = curl_getinfo( $ch );

        $this->response = $response;
        $this->http_code = $response['http_code'];
        $this->setHttpStatus();
        
        if ($content === FALSE)
        {
            printf("cUrl error (#%d): %s<br>\n", curl_errno($ch),
            htmlspecialchars(curl_error($ch)));
            
            if( !empty( $errors ) )
            {
                rewind($verbose);
                $verboseLog = stream_get_contents($verbose);
                $this->msg[__METHOD__]['__fatal'][] = "Verbose information:\n<pre>" . htmlspecialchars($verboseLog) . "</pre>\n";
            }    
        }
        
        $this->content_type = $response['content_type'];
        
        curl_close( $ch );
        
        unset( $ch );
        return false;
    }
 
      
    public function getLatestPolicyTimestamp()
    {        
        if( isset( $this->{$this->active_id} ) && !empty($this->{$this->active_id}) )
        {
            $link_id = $this->{$this->active_id};
            $sql_statement = "SELECT link_saved_policy_timestamp FROM link_saved_policy WHERE link_id = $link_id ORDER BY link_saved_policy_timestamp DESC LIMIT 0,1";
            
            $this->db->prepare($sql_statement);
            $timestamp = $this->db->fetchOneResult();
            
            return strtotime($timestamp);
        }
        else
        {
            $this->msg[__METHOD__]['__warning'][] = "Timestamp not processes for insurer_directories!";
            return false;
        }
    }
    
    private function setHttpStatus()
    {
        /*
         * Deactivate the link if http_code isn't 200 OK
         */
        
        substr( $this->http_code, 0,1 ) == 2
            ? $link_active = 1
            : $link_active = 0;
            
        $sql_statement  = "UPDATE "
                        . $this->link_type
                        . " SET "
                        . $this->link_type
                        . "_http_code="
                        . $this->http_code
                        .", "
                        . $this->link_type
                        . "_active=$link_active WHERE "
                        . $this->active_id
                        . " = "
                        . $this->{$this->active_id};
                        
        $this->prepare( $sql_statement );
        $result = $this->execute();
        
        return $result; 
    }
    
    
       public function getJsonContent()
    {
																															 
		$ch = curl_init($this->url);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		$this->cookie_string != ''
            ? curl_setopt( $ch, CURLOPT_COOKIE, $this->cookie_string )
            : null;                                                                     
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
			'Content-Length: ' . strlen($this->data_string))                                                                       
		);                                                                                                                   
                                                                                                                     
        $errors = curl_error( $ch );
        $content = curl_exec( $ch );
        $this->content = $content;
        $response = curl_getinfo( $ch );

        $this->response = $response;
        $this->http_code = $response['http_code'];
        $this->setHttpStatus();
        
        if ($content === FALSE)
        {
            printf("cUrl error (#%d): %s<br>\n", curl_errno($ch),
            htmlspecialchars(curl_error($ch)));
            
            if( !empty( $errors ) )
            {
                rewind($verbose);
                $verboseLog = stream_get_contents($verbose);
                $this->msg[__METHOD__]['__fatal'][] = "Verbose information:\n<pre>" . htmlspecialchars($verboseLog) . "</pre>\n";
            }    
        }
        
        $this->content_type = $response['content_type'];
        
        curl_close( $ch );
        
        unset( $ch );
        return false;
    }
    
    
    
    public  $url;
    protected $headers;
    protected $referer;
    public  $data_string;
    private $is_cookie_loop;
    private $content_type;
    private $http_code;
    private $response;
    private $sucure_connection;
    public  $is_government_directory;
    public  $insurer_directory_type;
    public  $content;
    public  $tmp_content;
    public  $cookie_string;
    public  $get_header_only;

}



