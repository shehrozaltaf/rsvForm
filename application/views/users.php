<div id="page_content">
    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin>

            <div class="uk-width-medium-1-1">
                <h3 class="heading_b uk-margin-bottom">Users</h3>
                <div class="md-card uk-margin-medium-bottom">
                    <div class="md-card-content">

                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}"
                                     aria-haspopup="true"
                                     aria-expanded="false">
                                    <i class="md-icon material-icons"></i>
                                    <div class="uk-dropdown uk-dropdown-bottom" aria-hidden="true" tabindex=""
                                         style="min-width: 200px; top: 32px; left: -168px;">
                                        <div class="dt_colVis_buttons"></div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="md-card-toolbar-heading-text">
                                Users
                            </h3>
                        </div>
                        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SNo</th>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Designation</th>
                                <th>Group</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>SNo</th>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Designation</th>
                                <th>Group</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            if (isset($getData) && $getData != '') {
                                $sno = 0;
                                foreach ($getData as $data) {
                                    $sno++;

                                    $td = '<tr>
                             <td>' . $sno . '</td> 
                             <td>' . $data->full_name . '</td>  
                             <td>' . $data->UserName . '</td>  
                             <td>' . $data->designation . '</td>  
                             <td>' . $data->GroupName . '</td>  
                             <td >  ';
                                    if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) {
                                        $td .= '<a href="javascript:void(0)"   onclick="getEdit(this);"
                                        data-Userid="' . $data->idUser . '"><i class="md-icon material-icons">edit</i></a>';
                                    }

                                    if (isset($permission[0]->CanDelete) && $permission[0]->CanDelete == 1) {
                                        $td .= '<a href="javascript:void(0)" onclick="getDelete(this);"
                                         data-Userid="' . $data->idUser . '"><i class="md-icon material-icons">delete</i></a>';
                                    }

                                    $td .= '</td>
                                </tr>';
                                    echo $td;
                                }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($permission[0]->CanAdd) && $permission[0]->CanAdd == 1) {
    echo '<div class="md-fab-wrapper">
    <a class="md-fab md-fab-accent md-fab-wave-light waves-effect waves-button waves-light" href="javascript:void(0)"
       data-uk-modal="{target:\'#addModal\'}" id="invoice_add">
        <i class="material-icons">add</i>
    </a>
</div>';
}
?>

<div class="uk-modal" id="addModal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog" style="top: 97px;">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Add Users</h3>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" name="full_name" class="md-input label-fixed"
                           required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="username">User Name</label>
                    <input type="text" id="username" name="username" class="md-input label-fixed"
                           required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="md-input label-fixed"
                           required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="designation">Designation</label>
                    <input type="text" id="designation" name="designation" class="md-input label-fixed"
                           required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="idGroup">Select Group Right</label>
                    <select id="idGroup" name="idGroup" class="md-input" data-uk-tooltip="{pos:'top'}">
                        <option value="0" disabled selected hidden>Select Group</option>
                        <?php if (isset($getGroup) && $getGroup != '') {
                            foreach ($getGroup as $key => $Group) {
                                echo '<option value="' . $Group->idGroup . '">' . $Group->GroupName . '</option>';
                            }
                        } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
            <button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="addUsers()">
                Save
            </button>
        </div>
    </div>
</div>
<div class="uk-modal" id="editModal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog" style="top: 97px;">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Edit User</h3>
            <input type="hidden" id="edit_idUser" name="edit_idUser" value="">
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="edit_full_name">Full Name</label>
                    <input type="text" id="edit_full_name" name="edit_full_name" class="md-input label-fixed"
                           required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="edit_username">User Name</label>
                    <input type="text" id="edit_username" name="edit_username" class="md-input label-fixed"
                           required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="edit_password">Password</label>
                    <input type="text" id="edit_password" name="edit_password" class="md-input label-fixed"
                           required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="edit_designation">Designation</label>
                    <input type="text" id="edit_designation" name="edit_designation" class="md-input label-fixed"
                           required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="edit_idGroup">Select Group Right</label>
                    <select id="edit_idGroup" name="edit_idGroup" class="md-input" data-uk-tooltip="{pos:'top'}">
                        <option value="0" disabled selected hidden>Select Group</option>
                        <?php if (isset($getGroup) && $getGroup != '') {
                            foreach ($getGroup as $key => $Group) {
                                echo '<option value="' . $Group->idGroup . '">' . $Group->GroupName . '</option>';
                            }
                        } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
            <button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="editUser()">
                Save
            </button>
        </div>
    </div>
</div>
<div class="uk-modal" id="deleteModal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog" style="top: 97px;">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Delete User</h3>
            <input type="hidden" id="delete_idUser" name="delete_idUser" value="">
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <p>Are you sure, you want to delete this user?</p>
            </div>
        </div>


        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
            <button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="deleteUser()">
                Delete
            </button>
        </div>
    </div>
</div>
<script>
    function addUsers() {
        $('#full_name').removeClass('md-input-danger');
        $('#username').removeClass('md-input-danger');
        $('#password').removeClass('md-input-danger');
        $('#designation').removeClass('md-input-danger');
        $('#idGroup').removeClass('md-input-danger');
        var flag = 0;
        var data = {};
        var Group = [];
        data['full_name'] = $('#full_name').val();
        data['username'] = $('#username').val();
        data['password'] = $('#password').val();
        data['designation'] = $('#designation').val();
        data['idGroup'] = $('#idGroup').val();

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
        if (data['designation'] == '' || data['designation'] == undefined || data['designation'].length < 1) {
            $('#designation').addClass('md-input-danger');
            flag = 1;
            return false;
        }

        if (data['idGroup'] == '' || data['idGroup'] == undefined || data['idGroup'] == 0) {
            $('#idGroup').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (flag === 0) {
            CallAjax('<?= base_url('Users/addData')?>', data, 'POST', function (res) {
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

    function getEdit(obj) {
        var data = {};
        data['id'] = $(obj).attr('data-Userid');
        if (data['id'] != '' && data['id'] != undefined) {
            CallAjax('<?= base_url('Users/getEdit')?>', data, 'POST', function (result) {
                if (result != '' && JSON.parse(result).length > 0) {
                    var a = JSON.parse(result);
                    console.log(a);
                    try {
                        $('#edit_idUser').val(data['id']);
                        $('#edit_full_name').val(a[0]['full_name']);
                        $('#edit_username').val(a[0]['UserName']);
                        $('#edit_password').val(a[0]['Password']);
                        $('#edit_designation').val(a[0]['designation']);
                        $('#edit_idGroup').val(a[0]['idGroup']);
                    } catch (e) {
                    }
                    showModal('editModal');
                }
            });
        } else {
            notificatonShow('Something went wrong, Try again', 'danger');
        }
    }

    function editUser() {
        $('#edit_full_name').removeClass('md-input-danger');
        $('#edit_username').removeClass('md-input-danger');
        $('#edit_password').removeClass('md-input-danger');
        $('#edit_designation').removeClass('md-input-danger');
        $('#edit_idGroup').removeClass('md-input-danger');
        var flag = 0;
        var data = {};
        data['idUser'] = $('#edit_idUser').val();
        data['full_name'] = $('#edit_full_name').val();
        data['username'] = $('#edit_username').val();
        data['password'] = $('#edit_password').val();
        data['designation'] = $('#edit_designation').val();
        data['idGroup'] = $('#edit_idGroup').val();
        if (data['full_name'] == '' || data['full_name'] == undefined || data['full_name'] == 0) {
            $('#edit_full_name').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (data['username'] == '' || data['username'] == undefined || data['username'].length < 1) {
            $('#edit_username').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (data['password'] == '' || data['password'] == undefined || data['password'].length < 1) {
            $('#edit_password').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (data['designation'] == '' || data['designation'] == undefined || data['designation'].length < 1) {
            $('#designation').addClass('md-input-danger');
            flag = 1;
            return false;
        }

        if (data['idGroup'] == '' || data['idGroup'] == undefined || data['idGroup'] == 0) {
            $('#idGroup').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (flag === 0) {
            CallAjax('<?= base_url('Users/editData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    hideModal('editModal');
                    notificatonShow('Successfully Edited', 'success');
                    window.location.reload();
                } else {
                    notificatonShow('Something went wrong, Try again', 'danger');
                }
            });
        }
    }

    function getDelete(obj) {
        var id = $(obj).attr('data-Userid');
        $('#delete_idUser').val(id);
        showModal('deleteModal');
    }

    function deleteUser() {
        var flag = 0;
        var data = {};
        data['id'] = $('#delete_idUser').val();
        if (data['id'] == '' || data['id'] == undefined || data['id'] == 0) {
            notificatonShow('Something went wrong, Try again', 'danger');
            flag = 1;
            return false;
        }
        if (flag === 0) {
            CallAjax('<?= base_url('Users/deleteData')?>', data, 'POST', function (res) {
                if (res == 1) {
                    hideModal('deleteModal');
                    notificatonShow('Successfully Deleted', 'success');
                    window.location.reload();
                } else {
                    notificatonShow('Something went wrong, Try again', 'danger');
                }
            });
        }
    }


</script>
