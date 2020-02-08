<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MLogin extends CI_Model
{
    public $Modal;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom');
        $this->Modal = new Custom();
    }

    function validate($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $user);
        /*$this->db->where('Password', $pass);*/
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }
}