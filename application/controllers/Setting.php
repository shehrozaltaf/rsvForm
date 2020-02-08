<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Setting extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('msetting');
        $this->load->model('custom');

        if (!isset($_SESSION['login']['idUser'])) {
            redirect(base_url());
        }

    }

    public function index()
    {
        $getData = array();
        $idGroup = $_SESSION['login']['idGroup'];

        $Msetting = new Msetting();
        $getData['getData'] = $Msetting->getAllGroups();
        $getData['permission'] = $Msetting->getFormRights($idGroup, '', 'setting');

        $this->load->view('include/header', $getData);
        $this->load->view('include/nav');
        $this->load->view('setting/index');
        $this->load->view('include/footer');
    }


    /*Add settings*/
    public function add()
    {
        $getData = array();


        $this->load->view('include/header', $getData);
        $this->load->view('include/nav');
        $this->load->view('setting/indexadd');
        $this->load->view('include/footer');
    }

    public function Insert()
    {
        $Msetting = new Msetting();
        $getChkInsert = $Msetting->selectName($_POST['GroupName']);
        if ($getChkInsert) {
            echo 3;
        } else {
            $Custom = new Custom();
            $insertArr = array();
            $idGroup = $Msetting->getGUID();
            $insertArr['idGroup'] = $idGroup;
            $insertArr['GroupName'] = $this->input->post('GroupName');
            $InserData = $Custom->Insert($insertArr, 'idGroup', 'group', 'Y');
            if ($InserData) {
                $getFormData = $Msetting->selectAllForm();
                foreach ($getFormData as $Form) {
                    $PostForm = array(
                        'idPageGroup' => $Msetting->getGUID(),
                        'idPages' => $Form->idPages,
                        'idGroup' => $insertArr['idGroup']
                    );
                    $Custom->Insert($PostForm, 'idPageGroup', 'pagegroup', 'Y');
                }
                echo $InserData;
            } else {
                echo 2;
            }


            /* $mLogin=new MLogin();
             $idGroup=$mLogin->getGUID();
             $PostData=array(
                 'idGroup'=>$idGroup,
                 'GroupName'=>$_POST['GroupName'],
                 'IsActive'=>1
             );
             $insert=$mCurrency->Insert($PostData);
             if($insert){
                 $getFormData=$mCurrency->selectAllForm();
                 foreach($getFormData as $Form){
                     $PostForm=array(
                         'idFormGroup'=>$mLogin->getGUID(),
                         'idForm'=>$Form->idForm,
                         'idGroup'=>$idGroup
                     );
                     $mCurrency->InsertFormGroup($PostForm);
                 }
                 echo $idGroup;
             }else{
                 echo 2;
             }*/
        }

    }

    public function getFormGroupData()
    {
        $id = $_POST['idGroup'];
        if ($id) {
            $mCurrency = new Msetting();
            $getData = $mCurrency->selectFormGroupData($id);
            echo json_encode($getData);
        }

    }

    public function fgAdd()
    {
//        print_r($_POST);
        $mSetting = new Msetting();
        $last = "";
        for ($i = 0; $i < count($_POST); $i++) {
            if (isset($_POST[$i]["CanView"])) {
                $postArray = array(
                    'idPageGroup' => $_POST[$i]["idPageGroup"],
                    'CanView' => ($_POST[$i]["CanView"] == "true") ? 1 : 0
                );
                $last = $mSetting->fgAdd($postArray);
            } else if (isset($_POST[$i]["CanAdd"])) {
                $postArray = array(
                    'idPageGroup' => $_POST[$i]["idPageGroup"],
                    'CanAdd' => ($_POST[$i]["CanAdd"] == "true") ? 1 : 0
                );
                $last = $mSetting->fgAdd($postArray);
            } else if (isset($_POST[$i]["CanEdit"])) {
                $postArray = array(
                    'idPageGroup' => $_POST[$i]["idPageGroup"],
                    'CanEdit' => ($_POST[$i]["CanEdit"] == "true") ? 1 : 0
                );
                $last = $mSetting->fgAdd($postArray);
            } else if (isset($_POST[$i]["CanDelete"])) {
                $postArray = array(
                    'idPageGroup' => $_POST[$i]["idPageGroup"],
                    'CanDelete' => ($_POST[$i]["CanDelete"] == "true") ? 1 : 0
                );
                $last = $mSetting->fgAdd($postArray);
            }
        }
        echo $last;
    }


    /*Edit Settings*/
    public function edit($id)
    {
        $mSetting = new Msetting();
        $getData = array();
        $getData["Group"] = $mSetting->selectOne($id);

        $this->load->view('include/header', $getData);
        $this->load->view('include/nav');
        $this->load->view('setting/indexedit');
        $this->load->view('include/footer');

        /* $this->load->view('include/header', $data);
         $this->load->view('include/sidebar');
         $this->load->view('setting/indexedit', $data);
         $this->load->view('include/footer');*/
    }


    /*Delete Group*/
    public function Delete()
    {
        $Custom = new Custom();
        $editArr = array();
        $idGroup = $this->input->post('idGroup');
        $editArr['isActive'] = 0;
        $editData = $Custom->Edit($editArr, 'idGroup', $idGroup, 'group');
        echo $editData;
    }

    /*Dont used*/

    public function index1()
    {
        $sessionInfo = $this->session->all_userdata();
        $data = array();
        $data['Session'] = $sessionInfo;

        $modelLogin = new MLogin();
        $router = $this->router->fetch_class();
        $getPermistion = $modelLogin->CheckFormRights($router);
        $data['CanAdd'] = $getPermistion[0]->CanAdd;
        if ($getPermistion[0]->CanView != 1) {
            redirect(base_url() . 'index.php/main');
        }


        $this->load->view('include/header', $data);
        $this->load->view('include/sidebar');
        $this->load->view('setting/index');
        $this->load->view('include/footer');
    }

    public function getData()
    {
        $getData = new Msetting();
        $Data = array();
        $data = array();
        $Data['Data'] = $getData->selectAll();
        $modelLogin = new MLogin();
        $router = $this->router->fetch_class();
        $getPermistion = $modelLogin->CheckFormRights($router);
        if ($Data['Data']) {
            foreach ($Data['Data'] as $Data) {
                $Edit = '';
                if ($getPermistion[0]->CanEdit == 1) {
                    $edithref = base_url() . "index.php/setting/edit/" . $Data->idGroup;
                    $Edit .= "<a href='" . $edithref . "'  >Edit</a>";
                } else {
                    $Edit .= "<i data-uk-tooltip='' title='No Edit Permission' class='uk-icon uk-icon-edit'></i>";
                }
                if ($getPermistion[0]->CanDelete == 1) {
                    $Edit .= " / <a href='#myModalDelete' data-uk-modal='{center:true}' onclick='getDelete(this);' data-id='$Data->idGroup' >Delete</a>";
                } else {
                    $Edit .= " / <i data-uk-tooltip='' title='No Delete Permission' class='uk-icon uk-icon-remove'></i>";
                }
                $arr = array();
                $arr[] = $Data->GroupName;
                $arr[] = $Edit;
                $data[] = $arr;
            }
            echo json_encode($data, true);
        } else {
            echo 2;
        }

    }


}