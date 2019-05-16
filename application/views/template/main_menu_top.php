<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons visible-on-sidebar-mini">view_list</i>
            </button>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="font-weight: bold"> SISTEM INFORMASI GEOGRAFIS PELAYANAN KESEHATAN KABUPATEN KARAWANG BERBASIS WEB </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <div class="nav-menu-top">
                    <a href="<?php echo site_url('logout');?>" class="btn btn-danger btn-sm">
                        <i class="fa fa-lock logout-icon"></i> Logout
                    </a>
                </div>
            </ul>
        </div>
    </div>
</nav>