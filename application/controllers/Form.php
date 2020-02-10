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
        $flag = 0;
        $Custom = new Custom();
        $insertArr = array();
        $insertArr['dssid'] = $this->input->post('dssid');
        $insertArr['collectedDate'] = $this->input->post('collectedDate');
        $insertArr['receivedDate'] = $this->input->post('receivedDate');
        $insertArr['condition'] = $this->input->post('condition');
        $insertArr['lr_wbc'] = $this->input->post('lr_wbc');
        $insertArr['lr_neutrophil'] = $this->input->post('lr_neutrophil');
        $insertArr['lr_lymphocyte'] = $this->input->post('lr_lymphocyte');
        $insertArr['lr_monocyte'] = $this->input->post('lr_monocyte');
        $insertArr['lr_eosinophil'] = $this->input->post('lr_eosinophil');
        $insertArr['lr_basophil'] = $this->input->post('lr_basophil');
        $insertArr['clinicalVisit'] = $this->input->post('clinicalVisit');
        $insertArr['nextClinicVisitDate'] = $this->input->post('nextClinicVisitDate');
        $insertArr['personName'] = $this->input->post('personName');
        $insertArr['sessionEnd'] = $this->input->post('sessionEnd');
        $insertArr['status'] = 1;
        $insertArr['username'] = $_SESSION['login']['idUser'];
        if (!isset($insertArr['dssid']) || $insertArr['dssid'] == '' || $insertArr['dssid'] == 'undefined') {
            $response = array(array('Invalid DSS ID'), array('danger'));
            echo json_encode($response, true);
            $flag = 1;
            exit();
        }
        if (!isset($insertArr['collectedDate']) || $insertArr['collectedDate'] == '' || $insertArr['collectedDate'] == 'undefined') {
            $response = array(array('Invalid Collected Date'), array('danger'));
            echo json_encode($response, true);
            $flag = 1;
            exit();
        }
        if (!isset($insertArr['receivedDate']) || $insertArr['receivedDate'] == '' || $insertArr['receivedDate'] == 'undefined') {
            $response = array(array('Invalid Received Date'), array('danger'));
            echo json_encode($response, true);
            $flag = 1;
            exit();
        }
        if (!isset($insertArr['condition']) || $insertArr['condition'] == '' || $insertArr['condition'] == 'undefined') {
            $response = array(array('Invalid Condition'), array('danger'));
            echo json_encode($response, true);
            $flag = 1;
            exit();
        }
        if (!isset($insertArr['lr_wbc']) || $insertArr['lr_wbc'] == '' || $insertArr['lr_wbc'] == 'undefined') {
            $response = array(array('Invalid WBC'), array('danger'));
            echo json_encode($response, true);
            $flag = 1;
            exit();
        }
        if (!isset($insertArr['lr_neutrophil']) || $insertArr['lr_neutrophil'] == '' || $insertArr['lr_neutrophil'] == 'undefined') {
            $response = array(array('Invalid Neutrophil'), array('danger'));
            echo json_encode($response, true);
            $flag = 1;
            exit();
        }
        if (!isset($insertArr['lr_lymphocyte']) || $insertArr['lr_lymphocyte'] == '' || $insertArr['lr_lymphocyte'] == 'undefined') {
            $response = array(array('Invalid Lymphocyte'), array('danger'));
            echo json_encode($response, true);
            $flag = 1;
            exit();
        }
        if (!isset($insertArr['lr_monocyte']) || $insertArr['lr_monocyte'] == '' || $insertArr['lr_monocyte'] == 'undefined') {
            $response = array(array('Invalid Monocyte'), array('danger'));
            echo json_encode($response, true);
            $flag = 1;
            exit();
        }
        if (!isset($insertArr['lr_eosinophil']) || $insertArr['lr_eosinophil'] == '' || $insertArr['lr_eosinophil'] == 'undefined') {
            $response = array(array('Invalid Eosinophil'), array('danger'));
            echo json_encode($response, true);
            $flag = 1;
            exit();
        }
        if (!isset($insertArr['lr_basophil']) || $insertArr['lr_basophil'] == '' || $insertArr['lr_basophil'] == 'undefined') {
            $response = array(array('Invalid Basophil'), array('danger'));
            echo json_encode($response, true);
            $flag = 1;
            exit();
        }
        if (!isset($insertArr['clinicalVisit']) || $insertArr['clinicalVisit'] == '' || $insertArr['clinicalVisit'] == 'undefined') {
            $response = array(array('Invalid Clinical Visit'), array('danger'));
            echo json_encode($response, true);
            $flag = 1;
            exit();
        }
        if (!isset($insertArr['nextClinicVisitDate']) || $insertArr['nextClinicVisitDate'] == '' || $insertArr['nextClinicVisitDate'] == 'undefined') {
            $response = array(array('Invalid Next Clinic Visit Date'), array('danger'));
            echo json_encode($response, true);
            $flag = 1;
            exit();
        }
        if (!isset($insertArr['personName']) || $insertArr['personName'] == '' || $insertArr['personName'] == 'undefined') {
            $response = array(array('Invalid Person Name'), array('danger'));
            echo json_encode($response, true);
            $flag = 1;
            exit();
        }
        if (!isset($insertArr['sessionEnd']) || $insertArr['sessionEnd'] == '' || $insertArr['sessionEnd'] == 'undefined') {
            $response = array(array('Invalid Session End'), array('danger'));
            echo json_encode($response, true);
            $flag = 1;
            exit();
        }

        if ($flag == 0) {
            $MForm = new MForm();
            $result = $MForm->checkDuplicateDssId($insertArr['dssid']);
            if (count($result) <= 0) {
                $InserData = $Custom->Insert($insertArr, 'col_id', 'form2c', 'Y');
                if ($InserData) {
                    $response = array('Inserted Successfully', 'success');
                } else {
                    $response = array('Something went wrong while inserting data.', 'error');
                }
            } else {
                $response = array('Data for DSS Id already exist', 'danger');
            }
        } else {
            $response = array(array('Something went wrong'), array('danger'));
            echo json_encode($response, true);
        }

        echo json_encode($response, true);
    }

}