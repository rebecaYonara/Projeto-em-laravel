<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Happy Hour</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />

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
                            <h3 style="padding-top: 25px; color: #fff;">Drinks</h3>
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
                                    <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Configurações</a></li>
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
                        <div class="card">
                            <div class="card-header">
                                <h4 class="title">Editar Drink</h4>
                            </div>
                            <div class="card-body">
                                <div class="uper">
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
                                    @if(session()->get('SUCESSO'))
                                        <script>
                                            $.notify('<strong>Sucesso</strong> {{ session()->get('SUCESSO') }}', {
                                                type: 'success',
                                                allow_dismiss: false
                                            });
                                        </script>
                                    @endif
                                    @if(Session::has('alteracao'))
                                        <script>
                                            $.notify('<strong>Sucesso</strong> {{ Session::get('alteracao') }}', {
                                                type: 'info',
                                                allow_dismiss: false
                                            });
                                        </script>
                                    @endif

                                </div>
                                <form method="POST" action="{{ route('drinks.update', $drink->id) }}">
                                    {{method_field('PATCH')}}
                                    {{ @csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-5 pr-md-1">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" id="nmdrink" name="nmdrink" placeholder="Nome do drink" value="{{$drink->nmdrink}}">
                                            </div>
                                        </div>
                                        <div class="col-md-5 pr-md-1">
                                            <div class="form-group">
                                                <label for="fk_ingrediente_principal">Bebida</label>
                                                <select id="fk_ingrediente_principal" name="fk_ingrediente_principal" class="form-control">
                                                    @foreach($estoque as $adicional)
                                                        <option style="color: #000" value="{{$drink->fk_ingrediente_principal}}" {{ ($drink->fk_ingrediente_principal == $adicional->id) ? 'selected': '' }}>
                                                            {{$adicional->nmingrediente}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <!-- <input type="text" class="form-control" id="fk_ingrediente_principal" name="fk_ingrediente_principal" placeholder="Bebida usada no drink"> -->
                                            </div>
                                        </div>
                                        <div class="col-md-2 pr-md-1">
                                            <div class="form-group">
                                                <label>Quantidade (ml)</label>
                                                <input type="text" class="form-control" id="qtd_ml_principal" name="qtd_ml_principal" value="{{$drink->qtd_ml_principal}}" placeholder="Bebida usada no drink">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Campos... -->
                                    <div id="dynamicDiv" class="row">
                                        <div class="col-md-3 pr-md-1">
                                            <div class="form-group">
                                                <label for="fk_ingrediente_adicional">Adicional</label>
                                                <select name="fk_ingrediente_adicional" id="fk_ingrediente_adicional" class="form-control">
                                                    @foreach($estoque as $adicional)
                                                        <option style="color: #000" value="{{$drink->fk_ingrediente_adicional}}" {{ ($drink->fk_ingrediente_adicional == $adicional->id) ? 'selected': '' }}>
                                                            {{$adicional->nmingrediente}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 pr-md-1">
                                            <div class="form-group">
                                                <label>Quantidade (ml)</label>
                                                <input type="text" class="form-control" id="qtd_ml_adicional" name="qtd_ml_adicional" value="{{$drink->qtd_ml_adicional}}" placeholder="Quantidade da bebiba usada">
                                            </div>
                                        </div>
                                        <div class="col-md-3 pr-md-1">
                                            <div class="form-group">
                                                <label>Preço do drink</label>
                                                <input type="text" class="form-control" id="vrdrink" name="vrdrink" placeholder="Valor do drink" value="{{$drink->vrdrink}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer" style="padding-top: 0;">
                                        <button type="submit" class="btn btn-fill btn-primary">Editar</button>
                                    </div>
                                </form>
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

    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script src="../js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $('#vrdrink').mask('0000000000.00', {reverse: true});
        $('#qtd_ml_principal').mask('00000.00', {reverse: true});
        $('#qtd_ml_adicional').mask('00000.00', {reverse: true});
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "black-dashboard-free"
            });
    </script>

</body>

</html>