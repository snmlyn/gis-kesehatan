<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
                <img class="profile-img" src="<?php echo theme_url();?>/public/assets/img/logo.png"     alt="Bank BKE Sejahtera Bersama Kami">
                <form class="form-signin" method="post" action="<?php echo my_url(); ?>/login/auth">
                    <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <button class="btn btn-md btn-success btn-block" type="submit">
                        Login</button>
                    <label class="checkbox pull-left">
                       Username :  <b class="text-info">admin</b> , Password:  <b class="text-info">admin</b>
                    </label>
                   <span class="clearfix"></span>
                </form>
            </div>
        </div>
    </div>
</div>