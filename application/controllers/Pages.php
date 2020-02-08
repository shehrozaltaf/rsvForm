<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
 * Created by PhpStorm.
 * Page: shahroz.khan
 * Date: 23/10/2018
 * Time: 11:26 AM
 */
class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mpages');
        $this->load->model('msetting');
        $this->load->model('custom');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $getData = array();
        $MPages = new MPages();
        $getData['getData'] = $MPages->getPages();

        $Msetting = new Msetting();
        $getData['permission'] = $Msetting->getFormRights($_SESSION['login']['idGroup'], '', 'pages');
        $getData['getGroup'] = $Msetting->getAllGroups();

        $this->load->view('include/header', $getData);
        $this->load->view('include/nav');
        $this->load->view('pages');
        $this->load->view('include/footer');
    }

    public function addData()
    {
        $this->load->library('form_validation');
        $Custom = new Custom();
        $Msetting = new Msetting();
        $insertArr = array();
        $insertArr['idPages'] = $Msetting->getGUID();
        $insertArr['page_name'] = $this->input->post('page_name');
        $insertArr['page_url'] = $this->input->post('page_url');
        $insertArr['controller_name'] = $this->input->post('controller_name');
        $insertArr['model_name'] = $this->input->post('model_name');
        $insertArr['isActive'] = 1;
        if (!isset($insertArr['page_name']) || $insertArr['page_name'] == '' || $insertArr['page_name'] == 'undefined') {
            $response = array(array('Invalid Page Name '), array('danger'));
            echo json_encode($response, true);
            exit();
        }
        if (!isset($insertArr['page_url']) || $insertArr['page_url'] == '' || $insertArr['page_url'] == 'undefined') {
            $response = array(array('Invalid Page URL'), array('danger'));
            echo json_encode($response, true);
            exit();
        } else {
            $MPages = new MPages();
            $result = $MPages->checkPageURL($insertArr['page_url']);
            if (count($result) <= 0) {
                $InserData = $Custom->Insert($insertArr, 'idPage', 'Pages', 'Y');
                if ($InserData) {
                    $getAllGroups = $Msetting->getAllGroups();
                    foreach ($getAllGroups as $groups) {
                        $insertGroupArr = array();
                        $insertGroupArr['idPageGroup'] = $Msetting->getGUID();
                        $insertGroupArr['idGroup'] = $groups->idGroup;
                        $insertGroupArr['idPages'] = $insertArr['idPages'];
                        $insertGroupArr['CanAdd'] = 0;
                        $insertGroupArr['CanEdit'] = 0;
                        $insertGroupArr['CanDelete'] = 0;
                        $insertGroupArr['CanView'] = 0;
                        $insertGroupArr['isActive'] = 1;
                        $Custom->Insert($insertGroupArr, 'idPageGroup', 'pagegroup', 'Y');
                    }

                    $this->load->helper('pages_creator');
                    create_new_page($insertArr['page_name'], $insertArr['controller_name'], $insertArr['controller_name']);
                    $response = array('Inserted Successfully', 'success');
                } else {
                    $response = array('Something went wrong', 'error');
                }

            } else {
                $response = array('Page Name already exist', 'danger');
            }
        }
        echo json_encode($response, true);
    }

    public function getEdit()
    {

        $MPages = new MPages();
        $result = $MPages->getPageById($this->input->post('id'));
        echo json_encode($result, true);
    }

    public function editData()
    {
        $Custom = new Custom();
        $editArr = array();
        $idPage = $this->input->post('idPage');
        $editArr['page_name'] = $this->input->post('page_name');
        $editArr['page_url'] = $this->input->post('page_url');
        $editData = $Custom->Edit($editArr, 'idPages', $idPage, 'Pages');
        echo $editData;
    }

    public function deleteData()
    {
        $Custom = new Custom();
        $editArr = array();
        $idPage = $this->input->post('id');
        $editArr['isActive'] = 0;
        $editData = $Custom->Edit($editArr, 'idPages', $idPage, 'Pages');
        echo $editData;
    }
}