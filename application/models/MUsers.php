<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Created by PhpStorm.
 * User: shahroz.khan
 * Date: 23/10/2018
 * Time: 4:23 PM
 */
class MUsers extends CI_Model
{
    function getUsers()
    {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }

    function checkUsername($user)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $user);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

}