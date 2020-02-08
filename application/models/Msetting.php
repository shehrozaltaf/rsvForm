<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Msetting extends CI_Model
{
    function getGUID()
    {
        if (function_exists('com_create_guid')) {
            return com_create_guid();
        } else {
            mt_srand((double)microtime() * 10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = substr($charid, 0, 8) . $hyphen
                . substr($charid, 8, 4) . $hyphen
                . substr($charid, 12, 4) . $hyphen
                . substr($charid, 16, 4) . $hyphen
                . substr($charid, 20, 12);

            return $uuid;
        }
    }

    /*Index setting*/
    function getAllGroups()
    {
        $this->db->select('*');
        $this->db->from('group');
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    /*Add Settings*/
    function selectName($name)
    {
        $this->db->select('*');
        $this->db->from('group');
        $this->db->where('isActive', 1);
        $this->db->where('GroupName', $name);
        $query = $this->db->get();
        return $query->result();
    }

    function selectAllForm()
    {

        $this->db->select('*');
        $this->db->from('pages');
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function selectFormGroupData($idGroup)
    {

        $this->db->select('`pagegroup`.`idPageGroup`, `pagegroup`.`idGroup`, `pagegroup`.`idPages`, `pagegroup`.`CanAdd`,
         `pagegroup`.`CanEdit`, `pagegroup`.`CanDelete`, `pagegroup`.`CanView`, `pagegroup`.`IsActive`, 
         `pages`.`page_name`, `pages`.`page_url` ');
        $this->db->from('pagegroup');
        $this->db->join('pages', 'pagegroup.idPages = pages.idPages', 'left');
        $this->db->join('group', 'pagegroup.idGroup = `group`.idGroup', 'left');
        $this->db->where('pages.isActive', 1);
        $this->db->where('pagegroup.idGroup', $idGroup);
        $query = $this->db->get();
        return $query->result();
    }


    function fgAdd($Data)
    {
        $this->db->where('idPageGroup', $Data["idPageGroup"]);
        $update = $this->db->update('pagegroup', $Data);
        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function getFormRights($idGroup, $CanView = '', $FormName = '')
    {
        $this->db->select('pagegroup.idPages,	pagegroup.CanAdd,	pagegroup.CanEdit,	pagegroup.CanDelete,
        	pagegroup.CanView,	pagegroup.IsActive,	pagegroup.idPageGroup,	pages.page_name,	pages.page_url ');
        $this->db->from('pagegroup');
        $this->db->join('pages', 'pagegroup.idPages = pages.idPages', 'left');
        $this->db->where('pages.isActive', 1);
        $this->db->where('pagegroup.idGroup', $idGroup);
        if ($CanView != '' && $CanView != '0') {
            $this->db->where('pagegroup.CanView', 1);
        }
        if ($FormName != '' && $FormName != '0') {
            $this->db->where('pages.page_url', $FormName);
        }
        $this->db->order_by('pages.sort_no',asc);
        $query = $this->db->get();
        return $query->result();
    }


    function CheckFormRights($FormName)
    {
        $SeesionInfo = $this->session->all_userdata();
        $Qry = "SELECT formgroup.idFormGroup,formgroup.idGroup,formgroup.idForm,formgroup.CanAdd,formgroup.CanEdit,formgroup.CanDelete,formgroup.CanView,
formgroup.IsActive,form.FormName FROM formgroup
LEFT JOIN form ON formgroup.idForm = form.idForm
where formgroup.idGroup='" . $SeesionInfo['idGroup'] . "' and form.URL='" . $FormName . "' and form.IsActive=1";
        $query = $this->db->query($Qry);
        $FormInfo = $query->result();
        if ($FormInfo) {
            return $FormInfo;
        }

    }

    /*dont use*/


    function selectAll1()
    {
        $Qry = "SELECT * from `group` where IsActive=1";
        $query = $this->db->query($Qry);
        $DataRetuen = $query->result();
        if ($DataRetuen) {
            return $DataRetuen;
        }
    }

    function selectOne($id)
    {
        $Qry = "SELECT * from `group` where idGroup = '" . $id . "' AND IsActive=1";
        $query = $this->db->query($Qry);
        $DataRetuen = $query->result();
        if ($DataRetuen) {
            return $DataRetuen;
        }
    }

    function selectName1($name)
    {
        $Qry = "SELECT * from `group` where IsActive=1 and GroupName='" . $name . "'";
        $query = $this->db->query($Qry);
        $DataRetuen = $query->result();
        if ($DataRetuen) {
            return $DataRetuen;
        }
    }


    function selectAllForm1()
    {
        $Qry = "SELECT * from form where URL!='#' and IsActive=1 ORDER BY idParent ";
        $query = $this->db->query($Qry);
        $DataRetuen = $query->result();
        if ($DataRetuen) {
            return $DataRetuen;
        }
    }


    function Insert($Data)
    {
        $insert = $this->db->insert('group', $Data);
        if ($insert) {
            $id = $Data['idGroup'];
            return $id;
        } else {
            return FALSE;
        }
    }

    function InsertFormGroup($Data)
    {
        $insert = $this->db->insert('formgroup', $Data);
        if ($insert) {
            $id = $Data['idFormGroup'];
            return $id;
        } else {
            return FALSE;
        }
    }


    function Edit($Data, $Where)
    {

        $this->db->where('idGroup', $Where);
        $update = $this->db->update('group', $Data);
        if ($update) {
            return 1;
        } else {
            return 0;
        }
    }


}