<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Happy Hour</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <link href="{{ asset('sass/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('sass/black-dashboard.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('demo/demo.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" />


    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('js/black-dashboard.min.js') }}"></script>
    <script src="{{ asset('demo/demo.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
</head>

<body class="">
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="javascript:void(0)" class="simple-text logo-mini">
                        <i class="tim-icons icon-planet"></i>
                    </a>
                    <a href="javascript:void(0)" class="simple-text logo-normal">
                        Planeta Etílico
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a href="{{ url('/usuarios') }}">
                            <i class="tim-icons icon-chart-pie-36"></i>
                            <p>Usuários</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('vender') }}">
                            <i class="tim-icons icon-bell-55"></i>
                            <p>Vender</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('drinks') }}">
                            <i class="tim-icons icon-atom"></i>
                            <p>Drinks</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('estoque') }}">
                            <i class="tim-icons icon-pin"></i>
                            <p>Estoque</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="">
                            <h3 style="padding-top: 25px; color: #fff;">Usuários</h3>
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="search-bar input-group">
                                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                                    <span class="d-lg-none d-md-block">Pesquisar</span>
                                </button>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <div class="photo">
                                        <img src="{{ asset('img/avatar3.png') }}" alt="Profile Photo">
                                    </div>
                                    <b class="caret d-none d-lg-block d-xl-block"></b>
                                </a>
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li class="nav-link"><a href="" class="nav-item dropdown-item">Usuários</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="nav-link"><a href="{{ url('logout') }}" class="nav-item dropdown-item">Sair</a></li>
                                </ul>
                            </li>
                            <li class="separator d-lg-none"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="padding-right: 10px;">
                            <div class="card-header">
                                <h4 class="title">Cadastrar usuário</h4>
                            </div>
                            <div class="card-body">
                                @if($errors->any())

                                    @foreach($errors->all() as $error)
                                        <script>
                                            $.notify('<strong>Error: </strong> {{ $error }}', {
                                                type: 'danger',
                                                allow_dismiss: false
                                            });
                                        </script>

                                    @endforeach

                                @endif
                                <div class="uper">
                                    @if(session()->get('SUCESSO'))
                                        <script>
                                            $.notify('<strong>Sucesso</strong> {{ session()->get('SUCESSO') }}', {
                                                type: 'success',
                                                allow_dismiss: false
                                            });
                                        </script>
                                    @endif
                                    @if(session()->get('LOGIN'))
                                        <script>
                                            $.notify('<strong>Bem Vindo</strong> {{ session()->get('LOGIN') }}', {
                                                type: 'success',
                                                allow_dismiss: false
                                            });
                                        </script>
                                    @endif

                                </div>
                                <form method="POST" action="{{ route('usuarios.store') }}">
                                    {{ @csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6 pr-md-1">
                                            <div class="form-group">
                                                <label>Nome funcionário</label>
                                                <input type="text" class="form-control" name="nmusuario" id="nmusuario" placeholder="Nome do funcionário">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pr-md-1">
                                            <div class="form-group">
                                                <label>Cargo</label>
                                                <select id="cargo" name="cargo" class="form-control">
                                                    <option style="color: #000" selected value="barman">Barman</option>
                                                    <option style="color: #000" value="garcom">Garçom</option>
                                                    <option style="color: #000" value="caixa">Caixa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-md-1">
                                            <div class="form-group">
                                                <label>Login</label>
                                                <input type="text" class="form-control" name="login" id="login" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pr-md-1">
                                            <div class="form-group">
                                                <label>Senha</label>
                                                <input type="password" class="form-control" name="senha" id="senha" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 pr-md-1">
                                            <div class="form-group">
                                                <label>Data de nascimento</label>
                                                <input type="text" class="form-control" name="dtnascimento" id="dtnascimento" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pr-md-1">
                                            <div class="form-group">
                                                <label for="ativo">Ativo</label>
                                                <select name="ativo" id="ativo" class="form-control">
                                                    <option style="color: #000" selected value="1">Ativo</option>
                                                    <option style="color: #000" value="0">Inativo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer" style="padding-top: 0;">
                                        <button type="submit" class="btn btn-fill btn-primary">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header">
                                <h4 class="title">Usuários cadastrados</h4>
                            </div>
                            <div class="card-body">
                                @if(Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if(Session::has('alteracao'))
                                    <div class="alert alert-info" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ Session::get('alteracao') }}
                                    </div>
                                @endif
                                <table class="table table-hover table-dark" style="padding-left: 10px;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Login</th>
                                            <th>Cargo</th>
                                            <th>Data de nascimento</th>
                                            <th>Ativo</th>
                                            <th class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usuarios as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->nmusuario}}</td>
                                                <td>{{$user->login}}</td>
                                                <td>{{$user->cargo}}</td>
                                                <td>{{$user->dtnascimento}}</td>
                                                <td>{{$user->ativo ? 'Ativo' : 'Inativo'}}</td>
                                                <td class="text-center">
                                                    <!-- Excluir -->
                                                    <form method="POST" action="{{ route('usuarios.destroy', ['id' => $user->id]) }}" style="display: inline" onsubmit="return confirm('Deseja excluir este registro?');" >
                                                        {{ csrf_field() }}
                                                        <!-- <a onclick="busca_usuario({{ $user }})" data-toggle="modal" data-id="{!! $user['id'] !!}" class="btn btn-primary">
                                                            <span class="tim-icons icon-pencil" aria-hidden="true"></span>
                                                        </a> -->
                                                        <a href="{{ route('usuarios.edit',$user->id) }}" class="btn btn-primary">
                                                            <span class="tim-icons icon-pencil" aria-hidden="true"></span>
                                                        </a>
                                                        <input type="hidden" name="_method" value="delete" >
                                                        <button class="btn btn-danger">
                                                            <span class="tim-icons icon-trash-simple"></span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <footer class="footer">
                <div class="container-fluid"></div>
            </footer>
        </div>
    </div>


    <script>
        $('#dtnascimento').mask('0000/00/00', {placeholder: "____/__/__"});
        function busca_usuario(usuario){
            document.getElementById('id_alter').value = usuario.id
            document.getElementById('nmusuario_alter').value = usuario.nmusuario
            document.getElementById('cargo_alter').value = usuario.cargo
            document.getElementById('login_alter').value = usuario.login
            $('#alteracao').modal('show');
        }
    </script>

    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');
                $navbar = $('.navbar');
                $main_panel = $('.main-panel');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');
                sidebar_mini_active = true;
                white_color = false;

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



                $('.fixed-plugin a').click(function(event) {
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .background-color span').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data', new_color);
                    }

                    if ($main_panel.length != 0) {
                        $main_panel.attr('data', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data', new_color);
                    }
                });

                $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                    var $btn = $(this);

                    if (sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        sidebar_mini_active = false;
                        blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                    } else {
                        $('body').addClass('sidebar-mini');
                        sidebar_mini_active = true;
                        blackDashboard.showSidebarMessage('Sidebar mini activated...');
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);
                });

                $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                    var $btn = $(this);

                    if (white_color == true) {

                        $('body').addClass('change-background');
                        setTimeout(function() {
                            $('body').removeClass('change-background');
                            $('body').removeClass('white-content');
                        }, 900);
                        white_color = false;
                    } else {

                        $('body').addClass('change-background');
                        setTimeout(function() {
                            $('body').removeClass('change-background');
                            $('body').addClass('white-content');
                        }, 900);

                        white_color = true;
                    }


                });

                $('.light-badge').click(function() {
                    $('body').addClass('white-content');
                });

                $('.dark-badge').click(function() {
                    $('body').removeClass('white-content');
                });
            });
        });
    </script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "black-dashboard-free"
            });
    </script>
</body>

</html>