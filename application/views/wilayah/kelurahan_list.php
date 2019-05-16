<?php $this->load->view('shared/css_content');?>
<div class="row" id="kelurahan">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <h3 class="card-title"><i class="fa fa-map-marker" aria-hidden="true"></i> DAFTAR KELURAHAN</h3>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>KELURAHAN</th>
                            <th class="disabled-sorting">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>
<?php
$this->load->view('wilayah/kelurahan_add_modal',['kecamatan'=>$kecamatan]);
$this->load->view('wilayah/kelurahan_edit_modal',['kecamatan'=>$kecamatan]);
$this->load->view('shared/js_content');
?>
<script type="text/javascript">
    $(document).ready(function() {
        var idModalAdd = "#add-kelurahan-modal";
        var idModalEdit = "#edit-kelurahan-modal";

        var reloadTable = function(kecamatan){
            $.ajax({
                url: "<?php echo my_url();?>/wilayah/kelurahan/data",
                type: 'POST',
                dataType:'json',
                data: {
                    kecamatan:kecamatan
                },
                success: function(newData) {
                    var xtable = $('#datatables').DataTable();
                    xtable.clear();
                    xtable.rows.add(newData.data).draw();
                },
                error: function(xhr, textStatus, ThrownException){
                    showAlerts('error',textStatus);
                }
            });
        }

        var initBar = function(){
            var actionbutton = '';
            actionbutton += '<div class="btn-group">';
            actionbutton += '<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">';
            actionbutton += '<span id="filter-kecamatan-label">PILIH KECAMATAN</span> <span class="caret"></span></button>';
            actionbutton += '<ul class="dropdown-menu" role="menu" id="filter-kecamatan">';
            <?php if(!empty($kecamatan)){ foreach($kecamatan as $row) { ?>
            actionbutton += '<li><a href="#" class="select-kecamatan" id="<?php echo $row->kecamatan_id;?>" label="<?php echo $row->nama_kecamatan;?>"><?php echo $row->nama_kecamatan;?></a></li>';
            <?php }} ?>
            actionbutton += '</ul>';
            actionbutton += '</div>';
            actionbutton += '<button type="button" id="add" class="btn-new btn btn-sm btn-primary" style="margin-left:5px"><i class="fa fa-plus"></i><span style="padding-left:5px">Baru</span></button>';
            actionbutton += '';
            $(".dt-actionbutton").html(actionbutton);
        }

        var table = $('#datatables').DataTable({
            "responsive": true,
            "dom": "<'dt-actionbutton'><'dt-actionbulk'>flr<'dt-advance-search'>B<'dt-alert col-md-12 no-padding'>tip",
            "buttons": ['excel'],
            "ajax": "<?php echo my_url();?>/wilayah/kelurahan/data",
            "columnDefs":[
                {
                    "render": function ( data, type, row ) {
                        return '<a href="javascript:void(0)" class="edit btn btn-xs btn-primary" data-kelid="'+row[0]+'" data-nama="'+row[1]+'" data-kecid="'+row[2]+'"><i class="fa fa-pencil" aria-hidden="true"></i></a>'; /*<a href="javascript:void(0)" class="delete btn btn-xs btn-danger" id_kel="'+row[0]+'"><i class="fa fa-times" aria-hidden="true"></i></a>*/                       
                    },
                    "targets": 2
                }
            ]
        });

        initBar();


        $("#kelurahan").on('click',".select-kecamatan",function () {
            var $that = $(this);
            var kecamatan = $that.attr('id');
            reloadTable(kecamatan);
            $("#filter-kecamatan-label").text("Kecamatan: "+$(this).attr("label"));
            var tgt = $("#filter-kecamatan-label").parent(".btn");
            $(tgt).removeClass("btn-primary").addClass("btn-warning");
            $("#filter-kecamatan-label").attr("kecamatan-filtered",$that.attr('id'));

            $("option",$("#kecamatan-add-form")).each(function(){
                if($(this).val() == $that.attr('id')){
                    $(this).attr("selected","selected");
                    $(this).prop('disabled',false);
                }
                else {
                    $(this).removeAttr("selected");
                    $(this).prop('disabled',true);
                }
            });

            $("option",$("#kecamatan-edit-form")).each(function(){
                if($(this).val() == $that.attr('id')){
                    $(this).attr("selected","selected");
                    $(this).prop('disabled',false);
                }
                else {
                    $(this).removeAttr("selected");
                    $(this).prop('disabled',true);
                }
            });
        });

        /*************************
         * Add New Record
         **********************/
        var clearFormModalAdd = function(){
            $("input",$("#add-kelurahan-modal")).each(function(){
                $(this).val("");
            });
            $("textarea",$("#add-kelurahan-modal")).each(function(){
                $(this).text("");
            });
            $("select",$("#add-kelurahan-modal")).each(function(){
                var $this = this;
                $("option",$($this)).each(function(){
                    $(this).removeAttr("selected");
                });
            });
            $(".modal-alert","#add-kelurahan-modal").removeClass("alert-warning").addClass("hide").text("");
        }

        $("#kelurahan").on('click', '#add', function() {
            clearFormModalAdd();
            $("#add-kelurahan-modal").modal("show");
            return false;
        });

        var hideFormAddModal = function(){
            $(["input"],$("#add-kelurahan-modal")).each(function(i,v){
                $(this).val("");
            });
            $(".modal-alert","#add-kelurahan-modal").removeClass("alert-warning").addClass("hide").text("");
            $("#add-kelurahan-modal").modal("hide");
        }

        var hideFormEditModal = function(){
            $(["input"],$("#edit-kelurahan-modal")).each(function(i,v){
                $(this).val("");
            });
            $(".modal-alert","#edit-kelurahan-modal").removeClass("alert-warning").addClass("hide").text("");
            $("#edit-kelurahan-modal").modal("hide");
        }

        $("#add-kelurahan-modal").on('click', '#kelurahan-submit', function() {
            var id_kec = $("option:selected",$("#kecamatan-add-form")).val();
            var kelurahan = $("[name='kelurahan']",$("#add-kelurahan-modal")).val();
            if(id_kec.trim() == ''){
                $(".modal-alert","#add-kelurahan-modal").addClass("alert-danger").removeClass("hide").text("ID masih kosong");
                return false;
            }
            if(kelurahan.trim() == ''){
                $(".modal-alert","#add-kelurahan-modal").addClass("alert-danger").removeClass("hide").text("Nama kecamatan masih kosong");
                return false;
            }

            $.ajax({
                url: "<?php echo my_url().'/wilayah/kelurahan/add';?>",
                type: 'POST',
                dataType:'json',
                data: {
                    id_kec:id_kec,kelurahan:kelurahan
                },
                success: function(data) {
                    if(data.status == true){
                        hideFormAddModal();
                        showAlerts('success',data.message);
                        var kecamatan = $("#filter-kecamatan-label").attr("kecamatan-filtered");
                        reloadTable(kecamatan);
                    }
                    else {
                        //showAlerts('error',data.message);
                        showErrorModal(idModalAdd,data.message);
                    }
                },
                error: function(xhr, textStatus, ThrownException){
                    //showAlerts('error',textStatus);
                    showErrorModal(idModalAdd,textStatus);
                }
            });
        });

        table.on('click', '.delete', function(e) {
            var id_kel = $(this).attr('id_kel');
            $.ajax({
                url: "<?php echo my_url().'/wilayah/kelurahan/delete';?>",
                type: 'POST',
                dataType:'json',
                data: {
                    id_kel:id_kel
                },
                success: function(status) {
                    if(status == true){
                        showAlerts('success','Data telah didelete');
                        var kecamatan = $("#filter-kecamatan-label").attr("kecamatan-filtered");
                        reloadTable(kecamatan);
                    }
                    else {
                        showAlerts('error','Silahkan ulangi lagi');
                    }

                },
                error: function(xhr, textStatus, ThrownException){
                    showAlerts('error',textStatus);
                }
            });
        });

        var clearFormModalEdit = function(id_kel,kelurahan,id_kec){
            $("[name='kelid']",$("#edit-kelurahan-modal")).val(id_kel);
            var kec = $("[name='kecamatan']",$("#edit-kelurahan-modal"));
            $("option",$(kec)).each(function(){
                if($(this).val() == id_kec){
                    $(this).attr("selected","selected");
                }
                else {
                    $(this).removeAttr("selected");
                }
            });
            $("[name='kelurahan']",$("#edit-kelurahan-modal")).val(kelurahan);
            $(".modal-alert","#edit-kelurahan-modal").removeClass("alert-warning").addClass("hide").text("");
        }

        // Edit record
        table.on('click', '.edit', function() {
            var t = $(this).data('kelid');
            var s = $(this).data('nama');
            var b = $(this).data('kecid');
            clearFormModalEdit(t,s,b);
            $("#edit-kelurahan-modal").modal("show");
            return false;
        });

        $("#edit-kelurahan-modal").on('click', '#kelurahan-edit-submit', function() {
            var id_kec = $("option:selected",$("#kecamatan-edit-form")).val();
            var id_kel = $("[name='kelid']",$("#edit-kelurahan-modal")).val();
            var kelurahan = $("[name='kelurahan']",$("#edit-kelurahan-modal")).val();
            if(id_kec.trim() == ''){
                $(".modal-alert","#edit-kelurahan-modal").addClass("alert-danger").removeClass("hide").text("ID masih kosong");
                return false;
            }
            if(kelurahan.trim() == ''){
                $(".modal-alert","#edit-kelurahan-modal").addClass("alert-danger").removeClass("hide").text("Nama kecamatan masih kosong");
                return false;
            }

            $.ajax({
                url: "<?php echo my_url().'/wilayah/kelurahan/edit';?>",
                type: 'POST',
                dataType:'json',
                data: {
                    id_kec:id_kec,kelurahan:kelurahan,id_kel:id_kel
                },
                success: function(data) {
                    if(data.status == true){
                        hideFormEditModal();
                        showAlerts('success',data.message);
                        var kecamatan = $("#filter-kecamatan-label").attr("kecamatan-filtered");
                        reloadTable(kecamatan);
                    }
                    else {
                        //showAlerts('error',data.message);
                        showErrorModal(idModalEdit,data.message);
                    }
                },
                error: function(xhr, textStatus, ThrownException){
                    //showAlerts('error',textStatus);
                    showErrorModal(idModalEdit,textStatus);
                }
            });
        });



    });
</script>