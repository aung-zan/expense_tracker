<!-- Register -->
<div class="login__block" id="l-register">
    <div class="login__block__header">
        <i class="zmdi zmdi-account-circle"></i>
        Create an account

        <div class="actions actions--inverse login__block__actions">
            <div class="dropdown">
                <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-login" href="">Already have an account?</a>
                    <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="">Forgot password?</a>
                </div>
            </div>
        </div>
    </div>

    <div class="login__block__body">
        <div class="form-group">
            <input type="text" class="form-control text-center" placeholder="Name">
        </div>

        <div class="form-group form-group--centered">
            <input type="text" class="form-control text-center" placeholder="Email Address">
        </div>

        <div class="form-group form-group--centered">
            <input type="password" class="form-control text-center" placeholder="Password">
        </div>

        <div class="form-group">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Accept the license agreement</span>
            </label>
        </div>

        <a href="index.html" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-plus"></i></a>
    </div>
</div>