<!doctype html>
<!--[if lte IE 9]>
<html class="lte-ie9" lang="en">
<![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/img/favicon.ico"/>
    <link rel="icon" type="image/ico" href="<?= base_url() ?>assets/img/favicon.ico"/>

    <title>Aga Khan - Portal</title>


    <!-- uikit -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/uikit/css/uikit.almost-flat.min.css"
          media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/icons/flags/flags.min.css" media="all">

    <!-- style switcher -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style_switcher.min.css" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main.min.css" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/themes/themes_combined.min.css" media="all">
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <!-- common jquery functions -->
    <script src="<?= base_url() ?>assets/js/common.min.js"></script>
    <script src="<?= base_url() ?>assets/js/core.js"></script>

    <!-- uikit functions -->
    <script src="<?= base_url() ?>assets/js/uikit_custom.min.js"></script>
    <!-- common functions -->
    <script src="<?= base_url() ?>assets/js/common.min.js"></script>

    <!-- page specific plugins -->
    <!-- d3 -->
    <script src="<?= base_url() ?>assets/bower_components/d3/d3.min.js"></script>


</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
<!-- main header -->
<header id="header_main">
    <div class="header_main_content">
        <nav class="uk-navbar">

            <!-- main sidebar switch -->
            <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                <span class="sSwitchIcon"></span>
            </a>

            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav user_actions">
                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="#" class="user_action_image">
                            <img class="md-user-image" src="<?= base_url() ?>assets/img/avatars/user.png"
                                 alt=""/></a>
                        <div class="uk-dropdown uk-dropdown-small">
                            <ul class="uk-nav js-uk-prevent">
                                <li><a href="javascript:void(0)" onclick="logout()">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="header_main_search_form">
        <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
        <form class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'data/search_data.json'}">
            <input type="text" class="header_main_search_input"/>
            <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i>
            </button>
        </form>
    </div>
</header>
<!-- main header end -->