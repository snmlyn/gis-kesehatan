<?php $this->load->view('shared/css_content');?>
    <div class="row" id="admin">
        <div class="col-md-12">
            <div class="card mt-20">
                <div class="card-content">
                    <h3 class="card-title"><i class="fa fa-user-circle" aria-hidden="true"></i> ADMIN</h3>
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatable">
                        <table id="kios-datatable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <div data-container="add-form" class="row hide" id="add-panel">
                                <div class="form-group-barang" id="form-input-barang">
                                    <div class="col-sm-12 row-barang">
                                        <div class="row small-list-margin" style="margin-bottom:5px">
                                            <div class="col-lg-2 col-md-2 col-xs-12 text-bold"  style="padding-top: 12px">
                                                Nama Lengkap
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <input type="text" name="fullname" class="form-control" required>
                                                <input type="hidden" name="id_admin" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-sm-12 row-barang">
                                        <div class="row small-list-margin" style="margin-bottom:5px">
                                            <div class="col-lg-2 col-md-2 col-xs-12 text-bold"  style="padding-top: 12px">
                                                Username
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <input type="text" name="username" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-sm-12 row-barang" id="row-password">
                                        <div class="row small-list-margin" style="margin-bottom:5px">
                                            <div class="col-lg-2 col-md-2 col-xs-12 text-bold"  style="padding-top: 12px">
                                                Password
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <input type="password" name="password" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top:10px">
                                        <button class="btn btn-sm btn-success" id="save-barang">Save</button>
                                            <a class="btn btn-sm btn-warning" href="" id="cancel-add">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>USERNAME</th>
                                <th>PASSWORD</th>
                                <th>NAMA LENGKAP</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($admin) && !empty($admin)){ foreach($admin as $row){ ?>
                                <tr>
                                    <td><?php echo $row->id;?></td>
                                    <td><?php echo $row->username;?></td>
                                    <td><?php echo "*************";?></td>
                                    <td><?php echo $row->fullname;?></td>
                                    <td class="disabled-sorting">
                                        <button class="btn btn-sm btn-info btn-edit" data-fullname="<?php echo $row->fullname;?>" data-username="<?php echo $row->username;?>" data-id="<?php echo $row->id;?>"><i class="fa fa-pencil"></i> Edit </button>                                        
                                        <button class="btn btn-sm btn-danger btn-delete" data-id="<?php echo $row->id;?>" ><i class="fa fa-times"></i> Delete</button>                                      
                                    </td>
                                </tr>
                            <?php } }?>
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
$this->load->view('shared/js_content');
?>
<script type="text/javascript">
    $(function(){
        var initBar = function(){
            var actionbutton = '';
            actionbutton += '<button type="button" id="add" class="btn-new btn-single-group btn btn-sm btn-primary"><i class="fa fa-plus"></i><span style="padding-left:5px">Baru</span></button>';
            actionbutton += '';
            $(".dt-actionbutton").html(actionbutton);
        }
        var table = $('#kios-datatable').DataTable({
            "responsive": true,
           "dom": "<'dt-actionbutton'><'dt-actionbulk'>flrB<'dt-advance-search'><'dt-add-new'><'dt-alert col-md-12 no-padding'>tip",
            "buttons": [ 'excel', 'pdf', 'print']
        });
        initBar();


        $(this).on( 'draw.dt', function (e, settings) {
            $('.dt-filter input[type="search"]').keyup(function(){
                //console.log('search draw');
                dt_table.draw();
            });
            //console.log( 'Redraw data at: '+new Date().getTime() );
        });
        var hideFormAddNew = function(){
            $(".dt-add-new").hide();
            $("#add-panel").addClass("hide");           
            $(".dt-add-new").slideUp(500);
            //console.log("h");
        }
        var showFormAddNew = function(){
            hideFormSearch();
            $(".dt-add-new").show();
            $("#add-panel").removeClass("hide");            
            $(".dt-add-new").slideDown(500);
            //console.log("s");
        }
        var hideFormSearch = function(){
            $(".dt-advance-search").hide();
            $("#search-panel").addClass("hide");            
            $(".dt-advance-search").slideUp(500);
            //console.log("h");
        }
        var showFormSearch = function(){
            hideFormAddNew();
            $(".dt-advance-search").show();
            $("#search-panel").removeClass("hide");            
            $(".dt-advance-search").slideDown(500);
            //console.log("s");
        }
        
        $("#admin").on("click","#add",function(){
            $(".row-stok",$("#add-panel")).remove();
            if($("#add-panel").hasClass('hide')){
                showFormAddNew();               
            }
            else {
                hideFormAddNew();               
            }
            return false;
        });
        
        $("#admin").on("click","#cancel-add",function(){
            hideFormAddNew();
            return false;
            });
        $("#admin").on("click","#cancel-search",function(){
            hideFormSearch();
            return false;
            });
            
        $("#admin").on("click","#adv-search",function(){
            if($("#search-panel").hasClass('hide')){
                showFormSearch();               
            }
            else {
                hideFormSearch();               
            }
            return false;
        });

        $("#kios-datatable").on("click",".btn-edit",function(){            
            if($("#add-panel").hasClass('hide')){
                $("[name='username']",$("#add-panel")).val($(this).data('username'));
                $("[name='id_admin']",$("#add-panel")).val($(this).data('id'));
                $("[name='fullname']",$("#add-panel")).val($(this).data('fullname'));
                $("#row-password",$("#add-panel")).addClass("hide");
                showFormAddNew();               
            }
            else {
                $("[name='username']",$("#add-panel")).val('');
                $("[name='id_admin']",$("#add-panel")).val('');
                $("[name='fullname']",$("#add-panel")).val('');
                $("#row-password",$("#add-panel")).removeClass("hide");
                hideFormAddNew();               
            }
            return false;
        });

               

        $("#kios-datatable").on("click",".btn-delete",function(){ 
            if(!confirm("Yakin menghapus ini ?")){
                return false;
            }
            $.ajax({
                    url: "<?php echo my_url().'admin/profile/delete';?>",
                    type: 'POST',
                    dataType:'json',
                    data: {
                      id:$(this).data('id')
                    },
                    success: function(data) {                                     
                        if(data.status == true){
                            showAlerts('success',data.message);
                            setTimeout(function(){// wait for 5 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 3000);
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

        
        $("#admin").on("click","#save-barang", function(){  
            var id = $("[name='id_admin']",$("#form-input-barang")).val(); 
            if(id != '' && id > 0){
                    var fullname = $("[name='fullname']",$("#form-input-barang")).val();
                    var username = $("[name='username']",$("#form-input-barang")).val();                             
                    $.ajax({
                            url: "<?php echo my_url().'admin/profile/edit';?>",
                            type: 'POST',
                            dataType:'json',
                            data: {
                              username:username,fullname:fullname,id_admin:id
                            },
                            success: function(data) {                                       
                                if(data.status == true){
                                    showAlerts('success',data.message);
                                    setTimeout(function(){// wait for 5 secs(2)
                                        location.reload(); // then reload the page.(3)
                                    }, 3000);
                                }
                                else {
                                   showAlerts('error',data.message);
                                }
                            },
                            error: function(xhr, textStatus, ThrownException){
                                showAlerts('error',textStatus);
                            }
                    });
            }
            else {
                var fullname = $("[name='fullname']",$("#form-input-barang")).val();
                var username = $("[name='username']",$("#form-input-barang")).val();
                var password = $("[name='password']",$("#form-input-barang")).val();            
                $.ajax({
                        url: "<?php echo my_url().'admin/profile/add';?>",
                        type: 'POST',
                        dataType:'json',
                        data: {
                          username:username,fullname:fullname,password:password
                        },
                        success: function(data) {                                       
                            if(data.status == true){
                                showAlerts('success',data.message);
                                setTimeout(function(){// wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 3000);
                            }
                            else {
                               showAlerts('error',data.message);
                            }
                        },
                        error: function(xhr, textStatus, ThrownException){
                            showAlerts('error',textStatus);
                        }
                    });
            }
            
            return false;
        });
    });
</script>