<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('titulo')</title>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-primary">
        <div id="main_app">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form-login
                                            idformlogin="form-login"
                                            token="{{ csrf_token() }}">
                                        </form-login>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.html">Precisa de uma conta? Registr-se agora!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        @include('templates.footer')
                    </div>
                </footer>
            </div>
        </div>
        </div>
         <!-- Scripts -->
         <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
