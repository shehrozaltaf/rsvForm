<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Form extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mform');
        $this->load->model('custom');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view('include/header');
        $this->load->view('include/nav');
        $this->load->view('form');
        $this->load->view('include/footer');
    }

    public function searchData()
    {
        if (isset($_POST['srchDssID']) && $_POST['srchDssID'] != '') {
            $MForm = new MForm();
            $result = $MForm->checkDssId($_POST['srchDssID']);

            echo json_encode($result, true);
        } else {
            echo 3;
        }
    }

    public function addData()
    {
        $this->load->library('form_validation');
        $Custom = new Custom();
        $insertArr = array();
        $insertArr['full_name'] = $this->input->post('full_name');
        $insertArr['username'] = $this->input->post('username');
        $insertArr['password'] = $this->input->post('password');
        if (!isset($insertArr['username']) || $insertArr['username'] == '' || $insertArr['username'] == 'undefined') {
            $response = array(array('Invalid User Name '), array('danger'));
            echo json_encode($response, true);
            exit();
        }
        if (!isset($insertArr['password']) || $insertArr['password'] == '' || $insertArr['password'] == 'undefined') {
            $response = array(array('Invalid Password'), array('danger'));
            echo json_encode($response, true);
            exit();
        }
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array(array('Invalid User Name & Password'), array('danger'));
        } else {
            $MUsers = new MUsers();
            $result = $MUsers->checkUsername($insertArr['UserName']);
            if (count($result) <= 0) {
                $InserData = $Custom->Insert($insertArr, 'username', 'users', 'Y');
                if ($InserData) {
                    $response = array('Inserted Successfully', 'success');
                } else {
                    $response = array('Something went wrong', 'error');
                }

            } else {
                $response = array('User Name already exist', 'danger');
            }
        }
        echo json_encode($response, true);
    }

}