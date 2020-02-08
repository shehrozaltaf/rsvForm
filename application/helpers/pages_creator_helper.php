<?php

function create_new_page($page_name, $class_name, $controller_name)
{

    // Create Controller
    $controller = fopen(APPPATH . 'controllers/' . $controller_name . '.php', "a")
    or die("Unable to open file!");

    $controller_content = "<?php if (!defined('BASEPATH')) {
            exit('No direct script access allowed');
        }

  class $class_name extends CI_Controller  {

       public function __construct()
        {
            parent::__construct();   
        }
        
        public function index()
        { 
        ";
    $controller_content .= '$this->load->view("include/header");' . "\n";
    $controller_content .= '$this->load->view("include/nav");' . "\n";
    $controller_content .= '$this->load->view("' . $page_name . '");' . "\n";
    $controller_content .= '$this->load->view("include/footer");' . "\n";
    $controller_content .= " 
        }
    }";
    fwrite($controller, $controller_content);
    fclose($controller);


    // Create Model
    $model = fopen(APPPATH . 'models/M' . $class_name . '.php', "a")
    or die("Unable to open file!");

    $model_content = "<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

   class M" . $class_name . " extends CI_Model
  {
      function __construct()
      {
        // Call the Model constructor
        parent::__construct();
      }

  }";
    fwrite($model, $model_content);
    fclose($model);


    // Create View Page
    $page = fopen(APPPATH . 'views/' . $page_name . '.php', "a") or die("Unable to    
  open file!");

    $page_content = '';
    fwrite($page, $page_content);
    fclose($page);
}