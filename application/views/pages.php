<div id="page_content">
    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin>

            <div class="uk-width-medium-1-1">
                <h3 class="heading_b uk-margin-bottom">Pages</h3>
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
                                Pages
                            </h3>
                        </div>
                        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SNo</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Controller Name</th>
                                <th>Model Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>SNo</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Controller Name</th>
                                <th>Model Name</th>
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
                             <td>' . $data->page_name . '</td>  
                             <td>' . $data->page_url . '</td>  
                             <td>' . $data->controller_name . '</td>  
                             <td>' . $data->model_name . '</td>  
                             <td >  ';
                                    if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) {
                                        $td .= '<a href="javascript:void(0)"   onclick="getEdit(this);"
                                        data-Pageid="' . $data->idPages . '"><i class="md-icon material-icons">edit</i></a>';
                                    }

                                    if (isset($permission[0]->CanDelete) && $permission[0]->CanDelete == 1) {
                                        $td .= '<a href="javascript:void(0)" onclick="getDelete(this);"
                                         data-Pageid="' . $data->idPages . '"><i class="md-icon material-icons">delete</i></a>';
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
if (!isset($permission[0]->CanAdd) || $permission[0]->CanAdd == 1) {
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
            <h3 class="uk-modal-title">Add Pages</h3>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="page_name">Page Name</label>
                    <input type="text" id="page_name" name="page_name" class="md-input label-fixed"
                           onkeyup="copyURL('page_name','page_url');"
                           required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="page_url">Page URL</label>
                    <input type="text" id="page_url" name="page_url" class="md-input label-fixed"
                           required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="controller_name">Controller Name
                        <small>Recommended</small>
                    </label>
                    <input type="text" id="controller_name" name="controller_name" class="md-input label-fixed"
                           disabled required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="model_name">Model Name
                        <small>Recommended</small>
                    </label>
                    <input type="text" id="model_name" name="model_name" class="md-input label-fixed"
                           disabled required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
            <button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="addPages()">
                Save
            </button>
        </div>
    </div>
</div>
<div class="uk-modal" id="editModal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog" style="top: 97px;">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Edit Page</h3>
            <input type="hidden" id="edit_idPage" name="edit_idPage" value="">
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="edit_page_name">Page Name</label>
                    <input type="text" id="edit_page_name" name="edit_page_name" class="md-input label-fixed" required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="edit_page_url">Page URL</label>
                    <input type="text" id="edit_page_url" name="edit_page_url" class="md-input label-fixed"
                           required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="edit_controller_name">Controller Name
                        <small>(Note: This will not change)</small>
                    </label>
                    <input type="text" id="edit_controller_name" name="edit_controller_name"
                           class="md-input label-fixed"
                           disabled required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <div class="md-input-wrapper md-input-filled">
                    <label for="edit_model_name">Model Name
                        <small>(Note: This will not change)</small>
                    </label>
                    <input type="text" id="edit_model_name" name="edit_model_name" class="md-input label-fixed"
                           disabled required>
                    <span class="md-input-bar "></span>
                </div>
            </div>
        </div>

        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
            <button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="editPage()">
                Save
            </button>
        </div>
    </div>
</div>
<div class="uk-modal" id="deleteModal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog" style="top: 97px;">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Delete Page</h3>
            <input type="hidden" id="delete_idPage" name="delete_idPage" value="">
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <p>Are you sure, you want to delete this Page?</p>
            </div>
        </div>


        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
            <button type="button" class="md-btn md-btn-flat md-btn-flat-primary" onclick="deletePage()">
                Delete
            </button>
        </div>
    </div>
</div>
<script>
    function copyURL(PageName, ControllerName) {
        var Project_name = $('#' + PageName).val().replace(/[_\W]+/g, "_");
        $('#controller_name').val(Project_name.substr(0, 1).toUpperCase() + Project_name.substr(1));
        $('#model_name').val("M" + Project_name.substr(0, 1).toUpperCase() + Project_name.substr(1));
        return $('#' + ControllerName).val(Project_name);
    }


    function addPages() {
        $('#page_name').removeClass('md-input-danger');
        $('#page_url').removeClass('md-input-danger');
        $('#controller_name').removeClass('md-input-danger');
        $('#model_name').removeClass('md-input-danger');
        var flag = 0;
        var data = {};
        data['page_name'] = $('#page_name').val();
        data['page_url'] = $('#page_url').val();
        data['controller_name'] = $('#controller_name').val();
        data['model_name'] = $('#model_name').val();

        if (data['page_name'] == '' || data['page_name'] == undefined || data['page_name'] < 1) {
            $('#page_name').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (data['page_url'] == '' || data['page_url'] == undefined || data['page_url'].length < 1) {
            $('#page_url').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (data['controller_name'] == '' || data['controller_name'] == undefined || data['controller_name'].length < 3) {
            $('#controller_name').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (data['model_name'] == '' || data['model_name'] == undefined || data['model_name'].length < 1) {
            $('#model_name').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (flag === 0) {
            CallAjax('<?= base_url('Pages/addData')?>', data, 'POST', function (res) {
                console.log(res);
                if (res != '' && JSON.parse(res).length > 0) {
                    var response = JSON.parse(res);
                    try {
                        console.log(response);
                        notificatonShow(response[0], response[1]);
                        if (response[1] === 'success') {
                            hideModal('addModal');
                            // window.location.reload();
                        }
                    } catch (e) {
                    }
                }
            });
        }
    }

    function getEdit(obj) {
        var data = {};
        data['id'] = $(obj).attr('data-Pageid');
        if (data['id'] != '' && data['id'] != undefined) {
            CallAjax('<?= base_url('Pages/getEdit')?>', data, 'POST', function (result) {
                if (result != '' && JSON.parse(result).length > 0) {
                    var a = JSON.parse(result);
                    console.log(a);
                    try {
                        $('#edit_idPage').val(data['id']);
                        $('#edit_page_name').val(a[0]['page_name']);
                        $('#edit_page_url').val(a[0]['page_url']);
                        $('#edit_controller_name').val(a[0]['controller_name']);
                        $('#edit_model_name').val(a[0]['model_name']);
                    } catch (e) {
                    }
                    showModal('editModal');
                }
            });
        } else {
            notificatonShow('Something went wrong, Try again', 'danger');
        }
    }

    function editPage() {
        $('#edit_page_name').removeClass('md-input-danger');
        $('#edit_page_url').removeClass('md-input-danger');
        $('#edit_controller_name').removeClass('md-input-danger');
        $('#edit_model_name').removeClass('md-input-danger');
        var flag = 0;
        var data = {};
        data['idPage'] = $('#edit_idPage').val();
        data['page_name'] = $('#edit_page_name').val();
        data['page_url'] = $('#edit_page_url').val();
        data['controller_name'] = $('#edit_controller_name').val();
        data['model_name'] = $('#edit_model_name').val();
        if (data['page_name'] == '' || data['page_name'] == undefined || data['page_name'] == 0) {
            $('#edit_page_name').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (data['page_url'] == '' || data['page_url'] == undefined || data['page_url'].length < 1) {
            $('#edit_page_url').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (data['controller_name'] == '' || data['controller_name'] == undefined || data['controller_name'].length < 1) {
            $('#edit_controller_name').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (data['model_name'] == '' || data['model_name'] == undefined || data['model_name'].length < 1) {
            $('#model_name').addClass('md-input-danger');
            flag = 1;
            return false;
        }
        if (flag === 0) {
            CallAjax('<?= base_url('Pages/editData')?>', data, 'POST', function (res) {
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
        var id = $(obj).attr('data-Pageid');
        $('#delete_idPage').val(id);
        showModal('deleteModal');
    }

    function deletePage() {
        var flag = 0;
        var data = {};
        data['id'] = $('#delete_idPage').val();
        if (data['id'] == '' || data['id'] == undefined || data['id'] == 0) {
            notificatonShow('Something went wrong, Try again', 'danger');
            flag = 1;
            return false;
        }
        if (flag === 0) {
            CallAjax('<?= base_url('Pages/deleteData')?>', data, 'POST', function (res) {
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
