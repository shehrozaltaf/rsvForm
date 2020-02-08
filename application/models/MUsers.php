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
        $this->db->select('users.idUser,	users.UserName,	users.full_name,	users.designation,	users.id_org,	users.idGroup,	`group`.GroupName');
        $this->db->from('Users');
        $this->db->join('`group`', 'users.idGroup = `group`.idGroup', 'left');
        $this->db->where('users.isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function checkUsername($user)
    {
        $this->db->select('idUser,UserName,full_name');
        $this->db->from('users');
        $this->db->where('UserName', $user);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    function getUserById($idUser){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('isActive', 1);
        $this->db->where('idUser', $idUser);
        $query = $this->db->get();
        return $query->result();
    }

}