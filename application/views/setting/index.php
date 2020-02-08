<div id="page_content">
    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin>

            <div class="uk-width-medium-1-1">
                <h3 class="heading_b uk-margin-bottom">User Groups</h3>
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
                                Groups
                            </h3>
                        </div>


                        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SNo</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>SNo</th>
                                <th>Name</th>
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
                             <td>' . $data->GroupName . '</td>  
                             <td >  ';
                                    if (isset($permission[0]->CanEdit) && $permission[0]->CanEdit == 1) {
                                        $td .= '<a href="' . base_url('setting/edit/' . $data->idGroup) . '"  data-idGroup="' . $data->idGroup . '"><i class="md-icon material-icons">edit</i></a>';
                                    }

                                    if (isset($permission[0]->CanDelete) && $permission[0]->CanDelete == 1) {
                                        $td .= '<a href="javascript:void(0)" onclick="getDelete(this);" data-idGroup="' . $data->idGroup . '"><i class="md-icon material-icons">delete</i></a>';
                                    }

                                    $td .= '</td>
                                  <!--  <td><i class="material-icons">edit</i>/<i class="material-icons">delete</i></td>-->
                                    <!--<td><span class="uk-badge uk-badge-info"><i class="material-icons">edit</i> Edit</span>/<span class="uk-badge uk-badge-danger"> <i class="material-icons">delete</i> Delete</span></td>-->
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
    <a class="md-fab md-fab-accent md-fab-wave-light waves-effect waves-button waves-light"
       href="' . base_url('setting/add') . '" id="invoice_add">
        <i class="material-icons">add</i>
    </a>
</div>';
}
?>


<!--Delete Box Start-->
<div class="uk-modal" id="deleteModal" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog" style="top: 97px;">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Delete Group</h3>
            <input type="hidden" id="delete_idGroup" name="delete_idGroup" value="">
        </div>
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1">
                <p>Are you sure, you want to delete this group?</p>
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
<!--Delete Box End-->
<script>

    function getDelete(obj) {
        var id = $(obj).attr('data-idGroup');
        $('#delete_idGroup').val(id);
        showModal('deleteModal');
    }

    function deleteUser() {
        var data = {};
        data['idGroup'] = $('#delete_idGroup').val();
        if (data['idGroup']) {
            CallAjax('<?php echo base_url() . 'Setting/Delete' ?>', data, 'POST', function (Result) {
                altair_helpers.content_preloader_show();
                if (Result == 1) {
                    $('#btn-Delete').css('display', 'none');
                    $('#msgTextDelete').html('');
                    $('#msgTextDelete').html("success added");
                    $('#msgDelete').addClass('uk-alert-success');
                    $('#msgDelete').css('display', 'block');
                    altair_helpers.content_preloader_hide();
                    setTimeout(function () {
                        $('#msgTextDelete').html('');
                        $('#msgDelete').css('display', 'none');
                        // window.location.reload();
                    }, 2000);
                } else {
                    $('#msgTextDelete').html('');
                    $('#msgTextDelete').html("error in saving");
                    $('#msgDelete').addClass('uk-alert-danger');
                    $('#msgDelete').css('display', 'block');
                    altair_helpers.content_preloader_hide();
                    setTimeout(function () {
                        $('#msgTextDelete').html('');
                        $('#msgDelete').removeClass('uk-alert-danger');
                        $('#msgDelete').css('display', 'none');
                    }, 2000);
                }
            });
        } else {

        }
    }


</script>