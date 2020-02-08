<!doctype html>
<!--[if lte IE 9]>
<html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/favicon.ico"/>
    <link rel="icon" type="image/ico" href="<?= base_url() ?>assets/img/favicon.ico"/>
    <title>RSV Form</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
    <!-- uikit -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"/>
    <!-- altair admin login page -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/login_page.min.css"/>
    <style>
        .error {
            border-color: #e53935 !important;
        }
    </style>
</head>
<body class="login_page">
<div class="login_page_wrapper">
    <div class="md-card" id="login_card">
        <div class="md-card-content large-padding" id="login_form">
            <div class="login_heading">
                <h2>RSV Form</h2>
            </div>
            <form>
                <div id="msg" style="display: none;" class="uk-alert" data-uk-alert>
                    <a href="javascript:void(0)" class="uk-alert-close uk-close"></a>
                    <p id="msgText"></p>
                </div>
                <div class="uk-form-row">
                    <label for="login_username">Username</label>
                    <input class="md-input" type="text" id="login_username" name="login_username"/>
                </div>
                <div class="uk-form-row">
                    <label for="login_password">Password</label>
                    <input class="md-input" type="password" id="login_password" name="login_password"/>
                </div>
                <div class="uk-margin-medium-top">
                    <a href="javascript:void(0)" class="md-btn md-btn-primary md-btn-block md-btn-large"
                       onclick="login()">Sign In</a>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- common functions -->
<script src="<?= base_url() ?>assets/js/common.min.js"></script>
<!-- uikit functions -->
<script src="<?= base_url() ?>assets/js/uikit_custom.min.js"></script>
<!-- altair core functions -->
<script src="<?= base_url() ?>assets/js/altair_admin_common.min.js"></script>
<!-- altair login page functions -->
<script src="<?= base_url() ?>assets/js/pages/login.min.js"></script>
<script src="<?= base_url() ?>assets/js/core.js"></script>
<script>
    function login() {
        var errorFlag = 0;
        $('#login_username').removeClass('error');
        $('#login_password').removeClass('error');
        var data = {};
        data['UserName'] = $('#login_username').val();
        data['Password'] = $('#login_password').val();
        if (data['UserName'] == '' || data['UserName'] == undefined) {
            $('#login_username').addClass('error');
            errorFlag = 1;
            returnMsg('msgText', 'Invalid User Name', 'uk-alert-danger', 'msg');
            return false;
        }
        if (data['Password'] == '' || data['Password'] == undefined) {
            $('#login_password').addClass('error');
            returnMsg('msgText', 'Invalid Password', 'uk-alert-danger', 'msg');
            errorFlag = 1;
            return false;
        }
        if (errorFlag === 0) {
            CallAjax('<?= base_url('index.php/Login/getLogin')?>', data, 'POST', function (res) {
                if (res == 1) {
                    setTimeout(function () {
                        window.location.href = "<?php echo base_url() . 'index.php/dashboard' ?>";
                    }, 2000);
                    returnMsg('msgText', 'Success', 'uk-alert-success', 'msg');
                } else if (res == 2) {
                    $('#login_password').addClass('error');
                    returnMsg('msgText', 'Invalid Password', 'uk-alert-danger', 'msg');
                } else {
                    $('#login_username').addClass('error');
                    $('#login_password').addClass('error');
                    returnMsg('msgText', 'Invalid Username/Password', 'uk-alert-danger', 'msg');
                }
            });
        }
    }
</script>
</html>