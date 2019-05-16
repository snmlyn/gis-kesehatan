<div class="sidebar" data-active-color="purple" data-background-color="#1580b9">
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="<?php echo base_url();?>public/assets/img/logo.png" />
            </div>
        </div>
        <ul class="nav">
            <li>
                <a href="<?php echo site_url('home');?>"  class="side-menu">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <p>Halaman Utama</p>
                </a>
            </li>
           <?php /* <li>
                <a href="<?php echo site_url('peta');?>" class="side-menu">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <p>Peta</p>
                </a>
            </li>*/?>
            <li>
                <a href="<?php echo site_url('bantuan');?>" class="side-menu">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <p>Bantuan</p>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('about');?>" class="side-menu">
                    <i class="fa fa-address-card-o" aria-hidden="true"></i>
                    <p>About Me</p>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('login');?>" class="side-menu">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <p>Login</p>
                </a>
            </li>
        </ul>
         <div style="margin-top:10px;padding:20px;">
         <a href="<?php echo base_url();?>public/assets/img/arjasa.jpg" target="_blank" style="border:0px"><img src="<?php echo base_url();?>public/assets/img/arjasa.jpg" target="_blank" style="width:200px;height: auto;border-radius: 5px"/></a>
        </div>
            <div style="margin-top:10px;padding:20px;">
            <a href="<?php echo base_url();?>public/assets/img/kecamatan.jpg" target="_blank" style="border:0px"><img src="<?php echo base_url();?>public/assets/img/kecamatan.jpg" target="_blank"  style="width:200px;height: auto;border-radius: 5px"/></a>
            </div>
    </div>
</div>