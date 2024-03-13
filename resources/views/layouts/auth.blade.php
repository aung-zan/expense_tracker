<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="/css/library/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="/css/library/animate.min.css">

        <!-- App styles -->
        <link rel="stylesheet" href="/css/app.min.css">
    </head>

    <body data-sa-theme="1">
        <div class="login">

            @include('authentication.login')

            @include('authentication.signup')

            @include('authentication.forgot_password')
        </div>

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="/js/library/jquery.min.js"></script>
        <script src="/js/library/popper.min.js"></script>
        <script src="/js/library/bootstrap.min.js"></script>

        <!-- App functions and actions -->
        <script src="/js/app.min.js"></script>
    </body>
</html>