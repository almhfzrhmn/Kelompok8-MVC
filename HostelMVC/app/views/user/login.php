<?php ob_start(); ?>
<h2 class="page-title">User Login</h2>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="well row pt-2x pb-3x bk-light">
            <div class="col-md-8 col-md-offset-2">
                <form action="/public/index.php?url=UserController/login" class="mt" method="post">
                    <label for="" class="text-uppercase text-sm">Email / Registration Number</label>
                    <input type="text" placeholder="Email / Registration Number" name="emailreg" class="form-control mb" required="true">
                    <label for="" class="text-uppercase text-sm">Password</label>
                    <input type="password" placeholder="Password" name="password" class="form-control mb" required="true">
                    <input type="submit" name="login" class="btn btn-primary btn-block" value="Login">
                </form>
            </div>
        </div>
        <div class="text-center text-light" style="color:black;">
            <a href="/public/forgot-password.php" style="color:black;">Forgot password?</a>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include '../app/views/layouts/main.php'; ?>
