<!-- Login -->
<div class="login__block active" id="l-login">
    <div class="login__block__header">
        <i class="zmdi zmdi-account-circle"></i>
        Hi there! Please Sign in

        <div class="actions actions--inverse login__block__actions">
            <div class="dropdown">
                <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-register" href="">Create an account</a>
                    <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="">Forgot password?</a>
                </div>
            </div>
        </div>
    </div>

    <div class="login__block__body">
        <div class="form-group">
            <input type="text" class="form-control text-center" placeholder="Email Address">
        </div>

        <div class="form-group">
            <input type="password" class="form-control text-center" placeholder="Password">
        </div>

        <a href="index.html" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-long-arrow-right"></i></a>
    </div>
</div>