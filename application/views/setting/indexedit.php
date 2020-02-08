<!-- style switcher -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/customcss.css" media="all">
<div id="page_content">
    <div id="page_content_inner">

        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>


                    <div class="uk-width-medium-1-1">
                        <div id="msg" style="display: none;" class="uk-alert" data-uk-alert>
                            <a href="#" class="uk-alert-close uk-close"></a>

                            <p id="msgText"></p>

                        </div>
                        <label for="GroupName">Group Name</label>
                        <input type="text" name="GroupName" id="GroupName" value="<?= $Group[0]->GroupName ?>" required
                               class="md-input" readonly>
                    </div>
                    <input type="hidden" id="idGroup" value="<?= $Group[0]->idGroup ?>">
                </div>
            </div>
        </div>

        <div class="md-card">
            <div class="md-card-content">

                <div class="uk-overflow-container">

                    <div id="tableForm">
                        <div class="uk-grid" data-uk-grid-margin>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function () {
        altair_helpers.content_preloader_show();
        setTimeout(function () {
            getFormGroupData();
            altair_helpers.content_preloader_hide();

        }, 1000);

        function getFormGroupData() {
            var data = {};
            data['idGroup'] = $('#idGroup').val();
            CallAjax("<?php echo base_url() . 'Setting/getFormGroupData' ?>", data, "POST", function (Result) {
                console.log(Result);
                var a = JSON.parse(Result);
                var items = "";
                $('#tableForm').html('');
                if (a != null) {
                    items += "<table class='uk-table uk-text-nowrap'>";
                    items += "<tr>";
                    items += "<td></td>";
                    items += "<td></td>";
                    items += "<td></td>";
                    items += "<td><h4>Check All</h4></td>";
                    items += "<td><div class='onoffswitch'>" +
                        "<input type='checkbox' value='Check All' onchange='CheckAll(this)'  id='CheckAll' class='onoffswitch-checkbox uk-float-right'/>" +
                        "<label class='onoffswitch-label' for='CheckAll'>" +
                        "<span class='onoffswitch-inner'></span> " +
                        "<span class='onoffswitch-switch'></span>" +
                        "</label>" +
                        "</div></td>";
                    items += "</tr>";
                    items += "<tr>";
                    items += "<th> Form Name </th>";
                    items += "<th> CanView </th>";
                    items += "<th> CanAdd </th>";
                    items += "<th> CanEdit </th>";
                    items += "<th> CanDelete </th>";
                    items += "</tr>";
                    if (a.length > 0) {
                        try {
                            $.each(a, function (i, val) {
                                items += "<tr class='fgtr'>";
                                items += "<td>" + val.page_name + "</td>";
                                items += "<td>";
                                if (val.CanView == 1) {
                                    items += "<div class='onoffswitch'>" +
                                        "<input type='checkbox'  data-idPageGroup='" + val.idPageGroup + "' value='" + val.CanView + "' name='CanView' class='onoffswitch-checkbox' id='CanView-" + i + "' checked>" +
                                        "<label class='onoffswitch-label' for='CanView-" + i + "'>" +
                                        "<span class='onoffswitch-inner'></span> " +
                                        "<span class='onoffswitch-switch'></span>" +
                                        " </label> </div>";
                                } else {
                                    items += "<div class='onoffswitch'>" +
                                        "<input type='checkbox'  data-idPageGroup='" + val.idPageGroup + "' value='" + val.CanView + "' name='CanView' class='onoffswitch-checkbox' id='CanView-" + i + "'>" +
                                        "<label class='onoffswitch-label' for='CanView-" + i + "'>" +
                                        "<span class='onoffswitch-inner'></span> " +
                                        "<span class='onoffswitch-switch'></span>" +
                                        " </label> </div>";
                                }
                                items += "</td>";

                                items += "<td>";
                                if (val.CanAdd == 1) {
                                    items += "<div class='onoffswitch'>" +
                                        "<input type='checkbox'  data-idPageGroup='" + val.idPageGroup + "' value='" + val.CanAdd + "' name='CanAdd' class='onoffswitch-checkbox' id='CanAdd-" + i + "' checked>" +
                                        "<label class='onoffswitch-label' for='CanAdd-" + i + "'>" +
                                        "<span class='onoffswitch-inner'></span> " +
                                        "<span class='onoffswitch-switch'></span>" +
                                        " </label> </div>";
                                } else {
                                    items += "<div class='onoffswitch'>" +
                                        "<input type='checkbox'  data-idPageGroup='" + val.idPageGroup + "' value='" + val.CanAdd + "' name='CanAdd' class='onoffswitch-checkbox' id='CanAdd-" + i + "'>" +
                                        "<label class='onoffswitch-label' for='CanAdd-" + i + "'>" +
                                        "<span class='onoffswitch-inner'></span> " +
                                        "<span class='onoffswitch-switch'></span>" +
                                        " </label> </div>";
                                }
                                items += "</td>";

                                items += "<td>";
                                if (val.CanEdit == 1) {
                                    items += "<div class='onoffswitch'>" +
                                        "<input type='checkbox' data-idPageGroup='" + val.idPageGroup + "' value='" + val.CanEdit + "' name='CanEdit' class='onoffswitch-checkbox' id='CanEdit-" + i + "' checked>" +
                                        "<label class='onoffswitch-label' for='CanEdit-" + i + "'>" +
                                        "<span class='onoffswitch-inner'></span> " +
                                        "<span class='onoffswitch-switch'></span>" +
                                        " </label> </div>";
                                } else {
                                    items += "<div class='onoffswitch'>" +
                                        "<input type='checkbox' data-idPageGroup='" + val.idPageGroup + "' value='" + val.CanEdit + "' name='CanEdit' class='onoffswitch-checkbox' id='CanEdit-" + i + "'>" +
                                        "<label class='onoffswitch-label' for='CanEdit-" + i + "'>" +
                                        "<span class='onoffswitch-inner'></span> " +
                                        "<span class='onoffswitch-switch'></span>" +
                                        " </label> </div>";
                                }
                                items += "</td>";

                                items += "<td>";
                                if (val.CanDelete == 1) {
                                    items += "<div class='onoffswitch'>" +
                                        "<input type='checkbox' data-idPageGroup='" + val.idPageGroup + "' value='" + val.CanDelete + "' name='CanDelete' class='onoffswitch-checkbox' id='CanDelete-" + i + "' checked>" +
                                        "<label class='onoffswitch-label' for='CanDelete-" + i + "'>" +
                                        "<span class='onoffswitch-inner'></span> " +
                                        "<span class='onoffswitch-switch'></span>" +
                                        " </label> </div>";
                                } else {
                                    items += "<div class='onoffswitch'>" +
                                        "<input type='checkbox' data-idPageGroup='" + val.idPageGroup + "' value='" + val.CanDelete + "' name='CanDelete' class='onoffswitch-checkbox' id='CanDelete-" + i + "'>" +
                                        "<label class='onoffswitch-label' for='CanDelete-" + i + "'>" +
                                        "<span class='onoffswitch-inner'></span> " +
                                        "<span class='onoffswitch-switch'></span>" +
                                        " </label> </div>";
                                }
                                items += "</td>";
                                items += "</tr>";
                            });

                        } catch (e) {
                            console.log(e);
                        }
                    }
                    items += "</table>";
                    items += "<input type='button' value='Send All' id='btn-Edit' onclick='SaveChanges()' class='md-btn md-btn-primary uk-float-right'/>";
                    $('#tableForm').html(items);
                } else {

                }
            });
        }
    });

    function CheckAll(ele) {
        var checkboxes = document.getElementsByTagName('input');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
//                console.log(i);
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }

    function SaveChanges() {
        $('#btn-Edit').css('display', 'none');
        var tr;
        var arr = {};
        tr = $('.fgtr');
        var count = $(tr).find('input');
        for (i = 0; i < count.length; i++) {
            var data = {};
            data["idPageGroup"] = $(count[i]).attr('data-idPageGroup');
            console.log('asdas  d   ', $(count[i]).attr('data-idPageGroup'));
            data[$(count[i]).attr('name')] = ($(count[i]).is(':checked')) ? true : false;
            arr[i] = data;
        }
        var url = "<?php echo base_url() . 'Setting/fgAdd' ?>";
        CallAjax(url, arr, "POST", function (data) {
            console.log(data);
            if (data) {
//                $('#btn-Edit').css('display','none');
                alert("Changed Successfully");
                setTimeout(function () {
                    $('#btn-Edit').css('display', 'block');
                    //window.location.href = "<?php //echo base_url('Setting') ?>//"
                }, 2000);
                // getFormGroupData();
            }
        });
    }

</script>


