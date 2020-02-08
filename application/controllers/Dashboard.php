<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: shahroz.khan
 * Date: 23/10/2018
 * Time: 10:11 AM
 */
class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdashboard');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url('login'));
        }
    }

    function index($msg = NULL)
    {
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('dashboard');
        $this->load->view('include/footer');
    }

    /*Setting Page, User Rights*/
    function getMenuData()
    {
        $idGroup = $_SESSION['login']['idGroup'];
        $Menu = '';
        $this->load->model('msetting');
        $Msetting = new Msetting();
        $getDataRights = $Msetting->getFormRights($idGroup, '1', '');
        if (isset($getDataRights) && count($getDataRights) >= 1) {
            foreach ($getDataRights as $pages) {
                $Menu .= '<li><a href="' . base_url($pages->page_url) . '">' . $pages->page_name . '</a></li>';
            }
        } else {
            $Menu = '';
        }
        echo $Menu;
    }

    /*Logout*/
    function getLogout()
    {
        session_destroy();
    }

}
