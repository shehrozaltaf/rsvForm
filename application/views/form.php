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
                                       name="srchDssID"/>
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
                            <li>
                                <a href="#" class="md-list-addon-element"><i
                                            class="md-list-addon-icon material-icons uk-text-danger"></i></a>
                                <div class="md-list-content">
                                    <span class="md-list-heading">Heading</span>
                                    <span class="uk-text-small uk-text-muted">Placeat qui non maxime eligendi sunt eligendi odit sed.</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!--<div class="md-card">
            <div class="md-card-content">
                <h3 class="heading_a">RSV Form</h3>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">

                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label for="participantID">Participant ID</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                    <label for="country">Country/Site</label>
                                    <input type="text" id="country" name="country" required class="md-input"/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="fieldSite">Field Site</label>
                                    <input type="text" id="fieldSite" name="fieldSite" required class="md-input"/>
                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                    <label for="para">Para</label>
                                    <input type="password" id="para" name="para" required class="md-input"/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="block">Block</label>
                                    <input type="text" id="block" name="block" required class="md-input"/>
                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                    <label for="structure">Structure</label>
                                    <input type="password" id="structure" required name="structure" class="md-input"/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="household">Household</label>
                                    <input type="text" id="household" name="household" required class="md-input"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                    <label for="womansCurrentID">Woman's Current ID</label>
                                    <input type="text" class="md-input" id="womansCurrentID" required
                                           name="womansCurrentID"/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="participantID">Woman's Permanent ID</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                    <label for="participantID">Child’s Name</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="participantID">Woman's Name</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                    <label for="participantID">Husband's Name</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label for="participantID">Household Head’s Name</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label for="participantID">CHW's Name & Code</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>-->

        <div class="md-card" style="display: none" id="Form">
            <div class="md-card-content">
                <h3 class="heading_a">Eosinophil count test</h3>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">

                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label for="participantID">Date when blood sample was collected at PHC</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                            </div>
                        </div>

                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label for="participantID">Date when blood sample was received by lab</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label for="participantID">Condition of sample when received by lab</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <h3 class="heading_c uk-margin-large-top">Enter lab results</h3>
                                    <label for="participantID">WBC</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                    <label for="participantID">Neutrophil</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                    <label for="participantID">Lymphocyte</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                    <label for="participantID">Monocyte</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                    <label for="participantID">Eosinophil</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                    <label for="participantID">Basophil</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>

                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label for="participantID">Do the child need to attend a clinical visit to perform
                                        any uncompleted test</label>
                                    <select id="select_demo_2" class="md-input" data-uk-tooltip="{pos:'top'}"
                                            title="Select with tooltip">
                                        <option value="" disabled selected hidden>
                                        </option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label for="participantID">Date of next clinic visit</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label for="participantID">Name of the person read and entered the lab results in
                                        form 2-C</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label for="participantID">End of the session</label>
                                    <input type="text" class="md-input" id="participantID" required
                                           name="participantID"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function srchDssID() {
        $('#full_name').removeClass('md-input-danger');
        var data = {};
        data['srchDssID'] = $('#srchDssID').val();
        if (data['srchDssID'] == '' || data['srchDssID'] == undefined || data['srchDssID'].length < 1) {
            $('#srchDssID').addClass('md-input-danger');
            return false;
        } else {
            $('#searchResult').css('display', 'none').find('.searchList').html('');
            CallAjax('<?= base_url('index.php/Form/searchData')?>', data, 'POST', function (res) {
                if (res == 3) {
                    $('#srchDssID').addClass('md-input-danger');
                    notificatonShow('error', 'Invalid DSS ID');
                } else if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        console.log(response);
                        var items = [];
                        $.each(response, function (i, v) {
                            items += " <li>" +
                                "<div class='md-list-content'>" +
                                "<span class='md-list-heading'>" + v.dssid + "</span>" +
                                "<span class='uk-text-small uk-text-muted'>Mother: " + v.mother_name + "</span>" +
                                "<span class='uk-text-small uk-text-muted'>Father: " + v.father_name + "</span>" +
                                "</div>" +
                                "</li>";
                        });

                        $('#searchResult').css('display', 'block').find('.searchList').html(items);

                    } catch (e) {
                    }
                }
            });
        }
    }

    function addUsers() {
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