<style>
    .uk-grid > * > :last-child {
        width: 100%;
    }
</style>

<div id="page_content">
    <div id="page_content_inner">

        <div class="md-card">
            <div class="md-card-content">
                <h3 class="heading_a">Data</h3>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-1-1 uk-width-medium-1-1">
                        <div class="uk-input-group">
                            <div class="md-input-wrapper">
                                <label for="srchDssID">DSS ID</label>
                                <input type="text" class="md-input" id="srchDssID" required
                                       name="srchDssID" value="AGAS04068A1"/>
                                <span class="md-input-bar "></span></div>
                            <span class="uk-input-group-addon  " onclick="srchDssID()"><a class="md-btn"
                                                                                          href="javascript:void(0)">Search</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="md-card" style="display: none" id="searchResult">
            <div class="md-card-content">
                <h3 class="heading_a">RSV Form</h3>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <ul class="md-list md-list-addon md-list-right searchList">
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="md-card" style="display: none" id="Form">
            <div class="md-card-content">
                <h3 class="heading_a">Eosinophil count test</h3>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-3">
                                    <label for="dssid">DSS ID</label>
                                    <input type="text" class="md-input label-fixed" id="dssid" name="dssid" disabled
                                           readonly/>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label for="mother_name">Mother Name</label>
                                    <input type="text" class="md-input label-fixed" id="mother_name" name="mother_name"
                                           disabled readonly/>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label for="father_name">Father Name</label>
                                    <input type="text" class="md-input label-fixed" id="father_name" name="father_name"
                                           disabled
                                           readonly/>
                                </div>
                                <!--<div class="uk-width-medium-1-3">
                                    <label for="areacode">Area Code</label>
                                    <input type="text" class="md-input label-fixed" id="areacode" name="areacode"
                                           disabled
                                           readonly/>
                                </div>


                                <div class="uk-width-medium-1-3">
                                    <label for="hhhead">Household Head</label>
                                    <input type="text" class="md-input label-fixed" id="hhhead" name="hhhead" disabled
                                           readonly/>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label for="dob">DOB</label>
                                    <input type="text" class="md-input label-fixed" id="dob" name="dob" disabled
                                           readonly/>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label for="study_id">Study ID</label>
                                    <input type="text" class="md-input label-fixed" id="study_id" name="study_id"
                                           disabled
                                           readonly/>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label for="gender">Gender</label>
                                    <input type="text" class="md-input label-fixed" id="gender" name="gender" disabled
                                           readonly/>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label for="child_name">Child Name</label>
                                    <input type="text" class="md-input label-fixed" id="child_name" name="child_name"
                                           disabled readonly/>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-3">
                                    <label for=" ">Date when blood sample was collected at PHC</label>
                                    <input class=" datePicker" id="participantID" value="<?php echo date('d/m/Y') ?>"
                                           required name="participantID"/>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label for=" ">Date when blood sample was received by lab</label>
                                    <input class=" datePicker" id="participantID" value="<?php echo date('d/m/Y') ?>"
                                           required name="participantID"/>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label for=" ">Condition of sample when received by lab</label>
                                    <select id="select_demo_2" class="md-input" data-uk-tooltip="{pos:'top'}"
                                            title="Select with tooltip">
                                        <option value="" disabled selected hidden>
                                        </option>
                                        <option value="1">Normal</option>
                                        <option value="2">Not Normal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-form-row">
                            <h4 class="heading_c">Enter lab results</h4>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-3">
                                    <label for="participantID">WBC</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label for="participantID">Neutrophil</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label for="participantID">Lymphocyte</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label for="participantID">Monocyte</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label for="participantID">Eosinophil</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label for="participantID">Basophil</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                    <label for="participantID">Do the child need to attend a clinical visit
                                        to
                                        perform
                                        any uncompleted test</label>
                                    <select id="select_demo_2" class="md-input"
                                            data-uk-tooltip="{pos:'top'}"
                                            title="Select with tooltip">
                                        <option value="" disabled selected hidden>
                                        </option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="participantID">Date of next clinic visit</label>
                                    <input type="text" class="datePicker" id="participantID" required
                                           name="participantID"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                    <label for="participantID">Name of the person read and entered the lab
                                        results in form 2-C</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="participantID">End of the session</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="button" value="Send All" id="btn-Edit" onclick="addData()" class="md-btn md-btn-primary">
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet"
      href="<?php echo base_url() ?>assets/bower_components/kendo-ui/styles/kendo.common-material.min.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/kendo-ui/styles/kendo.material.min.css"
      id="kendoCSS"/>
<script src="<?php echo base_url() ?>assets/js/kendoui_custom.min.js"></script>

<script>
    $(document).ready(function () {
        $('.datePicker').kendoDatePicker({
            format: "dd-MM-yyyy"
        });
    });

    $("#srchDssID").keyup(function () {
        var srchDss = $('#srchDssID').val();
        if (srchDss.length >= 4) {
            srchDssID();
        }
    });

    function srchDssID() {
        $('#srchDssID').removeClass('md-input-danger');
        var data = {};
        data['srchDssID'] = $('#srchDssID').val();
        if (data['srchDssID'] == '' || data['srchDssID'] == undefined || data['srchDssID'].length < 1) {
            $('#srchDssID').addClass('md-input-danger');
            return false;
        } else {
            $('#Form').css('display', 'none');
            $('#searchResult').css('display', 'none').find('.searchList').html('');
            CallAjax('<?= base_url('index.php/Form/searchData')?>', data, 'POST', function (res) {
                if (res == 3) {
                    $('#srchDssID').addClass('md-input-danger');
                    notificatonShow('error', 'Invalid DSS ID');
                } else if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        var items = [];
                        $.each(response, function (i, v) {
                            items += " <li>" +
                                " <a href='javascript:void(0)' class='md-list-addon-element' onclick='showForm(this);' data-id='" + v.dssid + "'><i class='md-list-addon-icon material-icons uk-text-danger'>add</i></a>" +
                                "<div class='md-list-content'>" +
                                "<span class='md-list-heading'>" + v.dssid + "</span>" +
                                "<span class='uk-text-small uk-text-muted'>Mother: " + v.mother_name + "</span>" +
                                "<span class='uk-text-small uk-text-muted'>Father: " + v.father_name + "</span>" +
                                "<input type='hidden' class='edit_areacode' value='" + v.areacode + "'> " +
                                "<input type='hidden' class='edit_dssid' value='" + v.dssid + "'> " +
                                "<input type='hidden' class='edit_mother_name' value='" + v.mother_name + "'> " +
                                "<input type='hidden' class='edit_father_name' value='" + v.father_name + "'> " +
                                /* "<input type='text' id='edit_hhhead' value='" + v.hhhead + "'> " +
                                 "<input type='text' id='edit_dob' value='" + v.dob + "'> " +
                                 "<input type='text' id='edit_study_id' value='" + v.study_id + "'> " +
                                 "<input type='text' id='edit_gender' value='" + v.gender + "'> " +
                                 "<input type='text' id='edit_child_name' value='" + v.child_name + "'> " +*/
                                "</div>" +
                                "</li>";
                        });
                        $('#searchResult').css('display', 'block').find('.searchList').html(items);
                    } catch (e) {
                    }
                } else {
                    var noRecord = " <li>" +
                        "<div class='md-list-content'>" +
                        "<span class='md-list-heading'>No Record</span>" +
                        "<span class='uk-text-small uk-text-muted'>Sorry, No record found.</span>" +
                        "</div>" +
                        "</li>";
                    $('#searchResult').css('display', 'block').find('.searchList').html(noRecord);
                }
            });
        }
    }

    function showForm(obj) {
        $('#dssid').val($(obj).parent('li').find('.edit_dssid').val());
        $('#mother_name').val($(obj).parent('li').find('.edit_mother_name').val());
        $('#father_name').val($(obj).parent('li').find('.edit_father_name').val());
        /*$('#areacode').val($(obj).find('.edit_areacode').val());
        $('#hhhead').val($('#edit_hhhead').val());
        $('#dob').val($('#edit_dob').val());
        $('#study_id').val($('#edit_study_id').val());
        $('#gender').val($('#edit_gender').val());
        $('#child_name').val($('#edit_child_name').val());*/
        $('#Form').css('display', 'block');
    }

    function addData() {
        $('#full_name').removeClass('md-input-danger');
        $('#username').removeClass('md-input-danger');
        $('#password').removeClass('md-input-danger');
        var flag = 0;
        var data = {};
        var Group = [];
        data['full_name'] = $('#full_name').val();
        data['username'] = $('#username').val();
        data['password'] = $('#password').val();
        if (data['full_name'] == '' || data['full_name'] == undefined || data['full_name'] < 1) {
            $('#full_name').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (data['username'] == '' || data['username'] == undefined || data['username'].length < 1) {
            $('#username').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (data['password'] == '' || data['password'] == undefined || data['password'].length < 3) {
            $('#password').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (flag === 0) {
            CallAjax('<?= base_url('index.php/Users/addData')?>', data, 'POST', function (res) {
                console.log(res);
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        console.log(response);
                        notificatonShow(response[0], response[1]);
                        if (response[1] === 'success') {
                            hideModal('addModal');
                            window.location.reload();
                        }
                    } catch (e) {
                    }
                }
            });
        }
    }
</script>