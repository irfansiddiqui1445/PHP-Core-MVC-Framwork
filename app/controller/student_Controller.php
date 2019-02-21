<?php
require_once('app/model/db.class.php');
class student_Controller extends DB
{
    private $viewpath = "app/view/student/";
    
    public function __construct($param = null)
    {
        
        
        if(method_exists($this,$param[0]))
        {
            
            $method_name = $param[0];
            $method_param = array_slice($param,1);
            $this->$method_name($method_param);
        }
        else
        {
            echo "404";
        
        }
    }


    public function home($param=null)
    {
        echo "inside student home";
    }

    private function view($param)
    {
        include $this->viewpath.$param.".php";
    }
    
}

?>