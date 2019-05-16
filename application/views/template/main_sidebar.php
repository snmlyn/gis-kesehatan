<div class="sidebar" data-active-color="purple" data-background-color="#1580b9">
    <!--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->

    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="<?php echo base_url();?>public/uploads/profile/<?php echo $this->session->userdata('id');?>.jpg" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                <?php
                if($this->session->has_userdata('logged_in') && $this->session->userdata('logged_in')){
                    echo $this->session->userdata('name');
                }
                else {
                    echo "Noname";
                }
                ?>
                    </a>
                <a data-toggle="collapse" href="#collapseExample" class="collapsed"><span style="text-size:14px">Administrator</span></a>
            </div>
        </div>
        <ul class="nav">
            <li>
                <a data-toggle="collapse" href="#pagesExamples1" id="menu-1" class="side-menu <?php echo ($this->session->userdata('menu-active') == 'menu-1')?'menu-open':'';?>" <?php echo ($this->session->userdata('menu-active') == 'menu-1')?'aria-hidden="true"':'';?>>
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    <p>Admin
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo ($this->session->userdata('menu-active') == 'menu-1')?'in':'';?>" id="pagesExamples1" <?php echo ($this->session->userdata('menu-active') == 'menu-1')?'aria-hidden="true"':'';?>>
                    <ul class="nav">
                        <li>
                            <a href="<?php echo site_url('admin/list');?>">Daftar Admin</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/profile/change_password');?>">Ubah Password</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/profile/photo');?>">Ganti Photo</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#pagesExamples2" id="menu-2" class="side-menu <?php echo ($this->session->userdata('menu-active') == 'menu-2')?'menu-open':'';?>" <?php echo ($this->session->userdata('menu-active') == 'menu-2')?'aria-hidden="true"':'';?>>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <p>Wilayah
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse <?php echo ($this->session->userdata('menu-active') == 'menu-2')?'in':'';?>" id="pagesExamples2" <?php echo ($this->session->userdata('menu-active') == 'menu-2')?'aria-hidden="true"':'';?>>
                    <ul class="nav">
                        <li>
                            <a href="<?php echo site_url('wilayah/kecamatan');?>">Kecamatan</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('wilayah/kelurahan');?>">Kelurahan</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="<?php echo site_url('pelayanan');?>" id="menu-3" class="side-menu <?php echo ($this->session->userdata('menu-active') == 'menu-3')?'menu-open':'';?>">
                    <i class="fa fa-medkit" aria-hidden="true"></i>
                    <p>Layanan</p>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('pelayanan/peta');?>" id="menu-4" class="side-menu <?php echo ($this->session->userdata('menu-active') == 'menu-4')?'menu-open':'';?>">
                    <i class="fa fa-map" aria-hidden="true"></i>
                    <p>Setting Peta</p>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('peta');?>" id="menu-3" target="_blank" class="side-menu">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <p>Peta Depan</p>
                </a>
            </li>
        </ul>
    </div>
</div>