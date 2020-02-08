<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MForm extends CI_Model
{
    function getForms()
    {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }

    function checkDssId($childlist)
    {
        $this->db->select('*');
        $this->db->from('childlist');
        $this->db->where("dssid Like '" . $childlist . "%' ");
        $query = $this->db->get();
        return $query->result();
    }

}