<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="/css/library/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="/css/library/animate.min.css">
        <link rel="stylesheet" href="/css/library/jquery.scrollbar.css">
        @stack('css-library')

        <!-- App styles -->
        <link rel="stylesheet" href="/css/app.min.css">
        @stack('css')

        <!-- Vendors javascript -->
        <script src="/js/library/jquery.min.js"></script>
        <script src="/js/library/popper.min.js"></script>
        <script src="/js/library/bootstrap.min.js"></script>
        <script src="/js/library/jquery.scrollbar.min.js"></script>
        <script src="/js/library/jquery-scrollLock.min.js"></script>
        @stack('js-library')
    </head>

    <body data-sa-theme="3">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            @include('include.header')

            @include('include.sidebar')

            <div class="themes">
                <div class="scrollbar-inner">
                    <a href="" class="themes__item active" data-sa-value="1"><img src="/img/bg/1.jpg" alt=""></a>
                    <a href="" class="themes__item" data-sa-value="3"><img src="/img/bg/3.jpg" alt=""></a>
                    <a href="" class="themes__item" data-sa-value="4"><img src="/img/bg/4.jpg" alt=""></a>
                    <a href="" class="themes__item" data-sa-value="5"><img src="/img/bg/5.jpg" alt=""></a>
                    <a href="" class="themes__item" data-sa-value="6"><img src="/img/bg/6.jpg" alt=""></a>
                    <a href="" class="themes__item" data-sa-value="7"><img src="/img/bg/7.jpg" alt=""></a>
                    <a href="" class="themes__item" data-sa-value="8"><img src="/img/bg/8.jpg" alt=""></a>
                    <a href="" class="themes__item" data-sa-value="9"><img src="/img/bg/9.jpg" alt=""></a>
                    <a href="" class="themes__item" data-sa-value="10"><img src="/img/bg/10.jpg" alt=""></a>
                </div>
            </div>

            <section class="content">
                @yield('content')

                @include('include.footer')
            </section>
        </main>

        <!-- App functions and actions -->
        <script src="/js/app.min.js"></script>
        @stack('js')
    </body>
</html>