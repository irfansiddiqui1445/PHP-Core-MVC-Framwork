<?php
require_once('app/model/db.class.php');
class public_Controller extends DB
{   
    private $viewpath = "app/view/public/";

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
            $this->home();
        
        }
    }

    public function home($param = null)
    {
        $this->view("home");
    }
    
    public function about($param = null)
    {
        $this->view("about");
    }

    public function contact($param = null)
    {
        $this->view("contact");
    }

    private function view($param)
    {
        include $this->viewpath.$param.".php";
    }
}

?>