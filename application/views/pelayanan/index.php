<?php $this->load->view('shared/css_content');?>
    <div class="row" id="pelayanan">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <h3 class="card-title"> <i class="fa fa-map-marker mr-10" aria-hidden="true"></i>  DAFTAR LAYANAN KESEHATAN</h3>
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <?php if ($this->session->flashdata('msg') && $this->session->flashdata('msg') != '') { ?>
                        <div class="alert alert-success"> <?= $this->session->flashdata('msg') ?> </div>
                        <?php $this->session->set_flashdata('msg', ''); ?>
                    <?php } ?>
                    <div class="material-datatables">
                        <div class="form-tambah">
                        </div>
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <div data-container="advance" class="row hide" id="add-panel">
                                <div class="form-group" id="form-pelayanan">
                                    <input type="hidden" name="dis_id" value="">
                                    <div class="col-sm-3">
                                        <div class="row small-list-margin" style="margin-bottom:5px">
                                            <div class="col-lg-3 col-md-3 col-sm-3 text-bold" style="padding-top: 12px">
                                                Kecamatan
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9">
                                                <select id="kec" name="kecamatan" class="form-control" required>
                                                    <option value="">Pilih Kecamatan</option>
                                                    <?php if(isset($kecamatan)){ foreach($kecamatan as $row) { ?>
                                                        <option value="<?php echo $row->kecamatan_id;?>"><?php echo $row->nama_kecamatan;?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row small-list-margin" style="margin-bottom:5px">
                                            <div class="col-lg-3 col-md-3 col-sm-3 text-bold" style="padding-top: 12px">
                                                Kelurahan
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9">
                                                <select id="kel" name="kelurahan" class="form-control" required>
                                                    <option value="">Pilih Desa / Kelurahan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row small-list-margin" style="margin-bottom:5px">
                                            <div class="col-lg-3 col-md-3 col-sm-3 text-bold"  style="padding-top: 12px">
                                                Sarana Layanan
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9">
                                                <select id="jenis" name="jenis" class="form-control" required>
                                                    <option value="">Pilih Sarana Layanan</option>
                                                    <?php if(isset($sarana) && !empty($sarana)){ foreach($sarana as $row) { ?>
                                                        <option value="<?php echo $row->pelayanan_id;?>"><?php echo $row->nama_layanan;?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>
                                        </div>

                                     </div>
                                    <div class="col-sm-4">
                                        <div class="row small-list-margin" style="margin-bottom:5px">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-bold"  style="padding-top: 12px">
                                                Keterangan
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <textarea cols="40" rows="2" name="keterangan"></textarea>
                                            </div>
                                        </div>
                                        <div class="row small-list-margin" style="margin-bottom:5px">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-bold"  style="padding-top: 12px">
                                                Nama Unit Layanan
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                               <input class="form-control" name="nama" type="text">
                                            </div>
                                        </div>
                                        <div class="row small-list-margin hide" style="margin-bottom:5px">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-bold"  style="padding-top: 12px">
                                                Cari Koordinat <a class="btn btn-default btn-xs"><i class="fa fa-search"></i></a>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <input class="form-control" name="x" type="text" placeholder="Koordinat X" readonly>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                <input class="form-control" name="y" type="text" placeholder="Koordinat Y" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        

                                    </div>
                                    <div class="col-sm-12" style="margin-top:10px">
                                        <a class="btn btn-sm btn-success" href="" id="save">Save</a>
                                        <a class="btn btn-sm btn-warning" href="" id="cancel">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <thead>
                            <tr>
                                <th>KECAMATAN</th>
                                <th>KELURAHAN</th>
                                <th>JENIS LAYANAN</th>
                                <th>UNIT LAYANAN</th>
                                <th>KETERANGAN</th>
                                <th>GAMBAR</th>
                                <th class="disabled-sorting">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            //print_r($data);
                            if(!empty($data)){ foreach($data as $row){ ?>
                                <tr>
                                    <td class="kecid" data-kecid="<?php echo isset($row->kecamatan_id)?$row->kecamatan_id:'';?>"><?php echo $row->kecamatan;?></td>
                                    <td class="kelid" data-kelid="<?php echo isset($row->kelurahan_id)?$row->kelurahan_id:'';?>"><?php echo $row->kelurahan;?></td>
                                    <td class="pelid" data-pelid="<?php echo isset($row->pelayanan_id)?$row->pelayanan_id:'';?>"><?php echo $row->jenis;?></td>
                                    <td class="sarana" data-sarana="<?php echo isset($row->pelayanan)?$row->pelayanan:'';?>"><?php echo $row->pelayanan;?></td>
                                    <td class="ket" data-ket="<?php echo isset($row->keterangan)?$row->keterangan:'';?>"><?php echo $row->keterangan;?></td>
                                     <td class="disabled-sorting">
                                     <?php if($row->image !=''){ ?>
                                     <a href="<?php echo base_url();?>public/uploads/layanan/<?php echo $row->image;?>" target="_blank"><?php echo $row->image;?></a>
                                     <a class="btn btn-xs btn-warning" href="<?php echo site_url('pelayanan/deleteImage');?>/<?php echo $row->id;?>">Delete Gambar</a>
                                     <?php }else{?>
                                        <form action="<?php echo site_url('pelayanan/upload');?>/<?php echo $row->id;?>" method="post" enctype="multipart/form-data"><?php echo $row->image;?>
                                            <input type="file" name="file"><input type="submit" value="upload">
                                        </form>
                                     <?php } ?>
                                     </td>
                                    <td class="disabled-sorting">
                                        <a href="javascript:void(0)" class="edit btn btn-xs btn-primary" data-id="<?php echo $row->id;?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> <?php /*<a href="javascript:void(0)" class="delete btn btn-xs btn-danger" data-id="<?php echo $row->id;?>" ><i class="fa fa-times" aria-hidden="true"></i></a>*/?>
                                    </td>
                                </tr>
                            <?php }} ?>
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
$this->load->view('wilayah/kecamatan_add_modal');
$this->load->view('wilayah/kecamatan_edit_modal');
$this->load->view('shared/js_content');
?>
<script type="text/javascript">
    $(document).ready(function() {
        var hideForm = function(){
            $(".dt-advance-search").hide();
            $("#add-panel").addClass("hide");
            $(".dt-advance-search").slideUp(500);
        }
        var showForm = function(){
            $(".dt-advance-search").show();
            $("#add-panel").removeClass("hide");
            $(".dt-advance-search").slideDown(500);
        }
        var table = $('#datatables').DataTable({
            "responsive": true,
            "dom": "<'dt-actionbutton'><'dt-actionbulk'>Bflr<'dt-advance-search'><'dt-alert col-md-12 no-padding'>tip",
            "buttons": [ 'excel', 'pdf', 'print']
        });
        var initBar = function(){
            var actionbutton = '';
            actionbutton += '<button type="button" id="add" class="btn-new btn btn-sm btn-primary" style="margin-top:9px"><i class="fa fa-plus"></i><span style="padding-left:5px">Tambah Baru</span></button>';
            actionbutton += '';
            $(".dt-actionbutton").html(actionbutton);
            $(".dt-advance-search").html($("#add-panel"));
        }
        initBar();

        $("#pelayanan").on("click","#add",function(){
            if($("#add-panel:not(:visible)")){
                showForm();
            }
            else {
                hideForm();
            }
        });

        $("#pelayanan").on("change","#kec",function(){
            var kecamatan = $("option:selected",$("#kec")).val();
            $.ajax({
                url: "<?php echo my_url();?>/wilayah/filter_kelurahan",
                type: 'POST',
                dataType:'html',
                data: {
                    kecamatan:kecamatan
                },
                success: function(options) {
                    $("#kel").html(options);
                },
                error: function(xhr, textStatus, ThrownException){
                    showAlerts('error',textStatus);
                }
            });
            return false;
        });

        $("#form-pelayanan").on("click","#save",function(){
            var dis_id = $("[name='dis_id']",$("#form-pelayanan")).val();
            var kec = $("option:selected",$("#kec")).val();
            var kel = $("option:selected",$("#kel")).val();
            var jenis = $("option:selected",$("#jenis")).val();
            var nama = $("[name='nama']",$("#form-pelayanan")).val();
            var x = $("[name='x']",$("#form-pelayanan")).val();
            var y = $("[name='y']",$("#form-pelayanan")).val();
            var ket = $("[name='keterangan']",$("#form-pelayanan")).val();
            if(kec.trim() == ''){
                showAlerts('error',"Kecamatan masih kosong");
                return false;
            }
            if(kel.trim() == ''){
                showAlerts('error',"Kelurahan masih kosong");
                return false;
            }
            if(jenis.trim() == ''){
                showAlerts('error',"Jenis layanan masih kosong");
                return false;
            }
            if(nama.trim() == ''){
                showAlerts('error',"Nama masih kosong");
                return false;
            }
            $.ajax({
                url: "<?php echo my_url().'/pelayanan/save';?>",
                type: 'POST',
                dataType:'json',
                data: {
                    dis_id:dis_id,kel:kel,jenis:jenis,nama:nama,x:x,y:y,ket:ket
                },
                success: function(data) {
                    if(data.status == true){
                        showAlerts('success',data.message);
                        setTimeout(function(){// wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 5000);
                    }
                    else {
                        showAlerts('error',data.message);
                    }
                },
                error: function(xhr, textStatus, ThrownException){
                    showAlerts('error',textStatus);
                }
            });
        });
         $("#datatables").on("click",".edit",function(){
           var id = $(this).data("id");
           $("input[name='dis_id']").val(id);
            var that = this;
            var tr = $(this).closest('tr');
              var tdkec = $(tr).find('.kecid');
            var kecid = $(tdkec).data('kecid');
            $('option',$("#kec")).each(function(){
                if($(this).val() == kecid){
                   $(this).attr("selected","selected");
                 }
                else {
                    $(this).removeAttr("selected","selected");
                }
            });
            var tdkel = $(tr).find('.kelid');
            var kelid = $(tdkel).data('kelid');
            $('option',$("#kel")).each(function(){
                if($(this).val() == kelid){
                   $(this).attr("selected","selected");
                 }
                else {
                    $(this).removeAttr("selected","selected");
                }
            });
            var tdkel = $(tr).find('.kelid');
            var kelid = $(tdkel).data('kelid');
            var label = $(tdkel).text();
            var opt = "<option value='"+kelid+"'>"+label+"</option>";
            $("#kel").html(opt);

            var tdpel = $(tr).find('.pelid');
            var pelid = $(tdpel).data('pelid');
            var label = $(tdpel).text();
            var opt = "<option value='"+pelid+"'>"+label+"</option>";
            $("#jenis").html(opt);
           
            var tdsar = $(tr).find('.sarana');
            var sar = $(tdsar).data('sarana');
            $("input[name='nama']").val(sar);
             
           var tdket = $(tr).find('.ket');
            var ket = $(tdket).data('ket');
            $("[name='keterangan']").val(ket);

            if($("#add-panel:not(:visible)")){
                showForm();
            }
            else {
                hideForm();
            }
});
$("#cancel").click(function(){
hideForm();
});
        $("#datatables").on("click",".delete",function(){
            var id = $(this).data("id");
            $.ajax({
                url: "<?php echo my_url().'/pelayanan/delete';?>",
                type: 'POST',
                dataType:'json',
                data: {
                    id:id
                },
                success: function(data) {
                    if(data.status == true){
                        showAlerts('success',data.message);
                        location.reload();
                    }
                    else {
                        showAlerts('error',data.message);
                    }
                },
                error: function(xhr, textStatus, ThrownException){
                    showAlerts('error',textStatus);
                }
            });
        });

    });
</script>