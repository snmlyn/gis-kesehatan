<?php $this->load->view('shared/css_content');?>
    <div class="row" id="admin">
        <div class="col-md-12">
            <div class="card mt-20">
                <div class="card-content">
                    <h3 class="card-title"> <i class="fa fa-user-circle" aria-hidden="true"></i> DAFTAR BAGIAN</h3>
                    <div class="toolbar"></div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Fullname</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($admin)){ foreach($admin as $row){?>
                            <tr>
                                <th><?php echo $row->username;?></th>
                                <th>********************</th>
                                <th><?php echo $row->fullname;?></th>
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
$this->load->view('shared/js_content');
?>