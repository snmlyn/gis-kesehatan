<div class="modal fade" id="edit-kelurahan-modal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <b><i class="fa fa-map-marker mr-10"></i> Edit kelurahan</b>
                <button type="button" class="close" title="close"><span aria-hidden="true" data-dismiss="modal">&times;</span><span class="hide">Close</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-alert alert hide"></div>
                <div class="row small-list-margin">
                    <div class="col-lg-3 col-md-3 col-sm-3 text-bold label-input">
                        Kecamatan
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <select id="kecamatan-edit-form" name="kecamatan" class="form-control" required>
                            <option value="">PILIH KECAMATAN</option>;
                            <?php if(!empty($kecamatan)){ foreach($kecamatan as $row) { ?>
                                <option value="<?php echo $row->kecamatan_id;?>"><?php echo $row->nama_kecamatan;?></option>;
                            <?php }} ?>
                        </select>
                    </div>
                </div>
                <div class="row small-list-margin">
                    <div class="col-lg-3 col-md-3 col-sm-3 text-bold label-input">
                        Nama kelurahan
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <input type="hidden" name="kelid" class="form-control" maxlength="200" id="kelid" required>
                        <input type="text" name="kelurahan" class="form-control" maxlength="200" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="kelurahan-edit-submit" class="btn btn-primary btn-sm">Simpan</button>
                <button type="button" id="kelurahan-edit-cancel" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
</div>
