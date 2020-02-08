<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Created by PhpStorm.
 * Page: shahroz.khan
 * Date: 23/10/2018
 * Time: 4:23 PM
 */
class MPages extends CI_Model
{
    function getPages()
    {
        $this->db->select('*');
        $this->db->from('Pages');
        $this->db->where('Pages.isActive', 1);
        $this->db->order_by('Pages.sort_no');
        $query = $this->db->get();
        return $query->result();
    }

    function checkPageURL($Page)
    {
        $this->db->select('idPages,page_name,page_url');
        $this->db->from('Pages');
        $this->db->where('page_url', $Page);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    function getPageById($idPage)
    {
        $this->db->select('*');
        $this->db->from('Pages');
        $this->db->where('isActive', 1);
        $this->db->where('idPages', $idPage);
        $query = $this->db->get();
        return $query->result();
    }

}