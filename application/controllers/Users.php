<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('musers');
        $this->load->model('custom');
        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $getData = array();
        $MUsers = new MUsers();
        $getData['getData'] = $MUsers->getUsers();
        $this->load->view('include/header', $getData);
        $this->load->view('include/nav');
        $this->load->view('Users');
        $this->load->view('include/footer');
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

    public function getEdit()
    {

        $MUsers = new MUsers();
        $result = $MUsers->checkUsername($this->input->post('id'));
        $response[0] = array(
            'username' => $result[0]->username,
            'password' => $result[0]->password,
            'full_name' => $result[0]->full_name,
        );
        echo json_encode($response, true);
    }

    public function editData()
    {
        $Custom = new Custom();
        $editArr = array();
        $idUser = $this->input->post('idUser');
        $editArr['full_name'] = $this->input->post('full_name');
        $editArr['username'] = $this->input->post('username');
        $editArr['password'] = $this->input->post('password');
        $editData = $Custom->Edit($editArr, 'username', $idUser, 'users');
        if ($editData) {
            $data = array(
                'idUser' => $idUser,
                'UserName' => $editArr['username']
            );
            $this->session->set_userdata('login', $data);
        }
        echo $editData;
    }

    public function deleteData()
    {
        $Custom = new Custom();
        $editArr = array();
        $idUser = $this->input->post('id');
        $editArr['isActive'] = 0;
        $editData = $Custom->Edit($editArr, 'idUser', $idUser, 'users');
        echo $editData;
    }
}