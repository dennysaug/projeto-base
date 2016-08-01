<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - Controle</title>

    <!-- Bootstrap core CSS -->

    <link href="/css/controle/bootstrap.min.css" rel="stylesheet">

    <link href="/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/controle/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="/css/controle/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/controle/maps/jquery-jvectormap-2.0.1.css" />
    <link href="/css/controle/icheck/flat/green.css" rel="stylesheet" />
    <link href="/css/controle/floatexamples.css" rel="stylesheet" type="text/css" />
    <link href="/library/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />


    <script src="/library/jquery.min.js"></script>

    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('styles')

</head>


<body class="nav-md">

<div class="container body">


    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>MENU</span></a>
                </div>
                <div class="clearfix"></div>

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="{{ route('controle.home.index') }}"><i class="fa fa-home"></i> Home </a></li>
                            <li>
                                <a><i class="fa fa-gears"></i> Configurações <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{ route('controle.grupo-usuario.index') }}">Grupo de Usuários</a></li>
                                    <li><a href="{{ route('controle.usuario.index') }}">Usuários</a></li>
                                    <li><a href="{{ route('controle.permissao.index') }}">Permissão</a></li>
                                    <li><a href="{{ route('controle.usuario.index') }}">Log</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="/images/img.jpg" alt="">{{ $usuario->nome }}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                <li><a href="javascript:;">  Profile</a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">Help</a>
                                </li>
                                <li><a href="{{ route('controle.logout.index') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                <li>
                                    <a>
                                            <span class="image">
                                        <img src="/images/img.jpg" alt="Profile Image" />
                                    </span>
                                        <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                        <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                            <span class="image">
                                        <img src="/images/img.jpg" alt="Profile Image" />
                                    </span>
                                        <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                        <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                            <span class="image">
                                        <img src="/images/img.jpg" alt="Profile Image" />
                                    </span>
                                        <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                        <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                            <span class="image">
                                        <img src="/images/img.jpg" alt="Profile Image" />
                                    </span>
                                        <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                        <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                @yield('conteudo')
            </div>

            <!-- footer content -->
            <footer>
                <div class="">
                    <p class="pull-right">Gentelella Alela! a Bootstrap 3 template by <a>Kimlabs</a>. |
                        <span class="lead"> <i class="fa fa-paw"></i> Gentelella Alela!</span>
                    </p>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->

        </div>
        <!-- /page content -->
    </div>


</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>

<script src="/library/bootstrap.min.js"></script>
<!-- bootstrap progress js -->
<script src="/library/progressbar/bootstrap-progressbar.min.js"></script>
<script src="/library/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="/library/icheck/icheck.min.js"></script>
<!--switch-->
<script src="/library/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="/library/moment/moment.min.js"></script>
<script type="text/javascript" src="/library/datepicker/daterangepicker.js"></script>
<!-- sparkline -->

<script src="/library/custom.js"></script>
<!-- skycons -->
<script src="/library/skycons/skycons.js"></script>

<!-- flot js -->
<!--[if lte IE 8]>

<!-- pace -->
<script src="/library/pace/pace.min.js"></script>



<!-- PNotify -->
<script type="text/javascript" src="/library/notify/pnotify.core.js"></script>
{{--<script type="text/javascript" src="/library/notify/pnotify.buttons.js"></script>--}}
{{--<script type="text/javascript" src="/library/notify/pnotify.nonblock.js"></script>--}}

<!-- Small modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">CONFIRMAÇAO</h4>
            </div>
            <div class="modal-body text-center">
                <h4>Tem certeza que deseja excluir?</h4>
            </div>
            <div class="modal-footer">
                {!! Form::button('Cancelar', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) !!}
                <a class="btn btn-primary confirmar">Confirmar</a>
            </div>

        </div>
    </div>
</div>
<!-- /modals -->
<Script>
    $(function() {
        $("[type=checkbox]").bootstrapSwitch({
            onText: ' Sim ',
            offText: ' Não ',
            size: 'mini'
        });

        $(document).on('click','.excluir', function() {
            var url = $(this).attr('data-url');
            $('.confirmar').attr('href', url);
        });
    });
</Script>


@if(session()->has('error'))
    <script>
        $(function(){
            new PNotify({
                title: '{{ (session()->has('error') && session('error')) ? 'ERRO' : 'SUCESSO' }}',
                text: '{{ (session()->has('error') && session('error')) ? 'Não foi possível realizar a operação' : 'Operação efetuada com sucesso' }}',
                type: '{{ (session()->has('error') && session('error')) ? 'error' : 'success' }}'
            });
        });
    </script>
@endif

@yield('scripts')
</body>

</html>