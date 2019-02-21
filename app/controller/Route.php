<?php


class Route 
{

            
       
    public function __construct($url)
    {
        
        $this->_Route($url);
    }
    
    //// ___________  route____
    private  function _Route($url)
    {
     
        $class_name = "public";
        if($url[0] != "")
        {
            $class_name = $url[0];
        }
        
        $file = "app/controller/".$class_name."_Controller.php";
        $classs = $class_name."_Controller";
        
        require_once($file);



        if(file_exists($file) && class_exists($classs))
        {
            $nurl = array_slice($url,1);
            new $classs($nurl);
            
            
                
        }
        else
        {   
            echo "404" ;
        }
		
    }
    

    
    
     
    //// ___________ key generator____
    private function key($length = 10) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) 
        {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

            
           

          
    

    
    
    //// ___________ Encryption____
    protected function Encryption( $string, $action = 'e' ) 
    {
        // you may change these values to your own
        $secret_key = 'my_simple_secret_key';
        $secret_iv = 'my_simple_secret_iv';
        
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
        
        if( $action == 'e' ) 
        {
            $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        }
        else if( $action == 'd' )
        {
            $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        }
        
        return $output;
    }
    
    
    
    




            
     
     
 
       

}









?>