<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MDashboard extends CI_Model
{
    public $Modal;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->Modal = new Custom();
    }

}

?>