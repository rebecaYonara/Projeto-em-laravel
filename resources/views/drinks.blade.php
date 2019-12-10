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
                                <h4 class="title">Cadastrar Drink</h4>
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
                                <form method="POST" action="{{ route('drinks.store') }}">
                                    {{ @csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-5 pr-md-1">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" class="form-control" id="nmdrink" name="nmdrink" placeholder="Nome do drink">
                                            </div>
                                        </div>
                                        <div class="col-md-5 pr-md-1">
                                            <div class="form-group">
                                                <label for="fk_ingrediente_principal">Bebida</label>
                                                <select id="fk_ingrediente_principal" name="fk_ingrediente_principal" class="form-control">
                                                    @foreach($estoque as $adicional)
                                                        <option style="color: #000" selected value="{{$adicional->id}}">{{$adicional->nmingrediente}}</option>
                                                    @endforeach
                                                </select>
                                                <!-- <input type="text" class="form-control" id="fk_ingrediente_principal" name="fk_ingrediente_principal" placeholder="Bebida usada no drink"> -->
                                            </div>
                                        </div>
                                        <div class="col-md-2 pr-md-1">
                                            <div class="form-group">
                                                <label>Quantidade (ml)</label>
                                                <input type="text" class="form-control" id="qtd_ml_principal" name="qtd_ml_principal" placeholder="Bebida usada no drink">
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
                                                        <option style="color: #000" value="{{$adicional->id}}">{{$adicional->nmingrediente}}</option>
                                                    @endforeach
                                                </select>
                                                <!-- <label>Adicional</label>
                                                <input type="text" class="form-control" id="bebidaAdiconal" placeholder="Bebida adicional"> -->
                                            </div>
                                        </div>
                                        <div class="col-md-3 pr-md-1">
                                            <div class="form-group">
                                                <label>Quantidade (ml)</label>
                                                <input type="text" class="form-control" id="qtd_ml_adicional" name="qtd_ml_adicional" placeholder="Quantidade da bebiba usada">
                                            </div>
                                        </div>
                                        <div class="col-md-3 pr-md-1">
                                            <div class="form-group">
                                                <label>Preço do drink</label>
                                                <input type="text" class="form-control" id="vrdrink" name="vrdrink" placeholder="Valor do drink">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div id="addIngrediente">

                                    </div> -->
                                    <!-- Jquery add campos ingredientes adicionais-->
                                    <!-- <button class="btn btn-primary" id="addInput" onclick="addGroup()">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                        Adicionar Ingredientes
                                    </button> -->
                                    <!-- <br> -->
                                    <div class="card-footer" style="padding-top: 0;">
                                        <button type="submit" class="btn btn-fill btn-primary">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="card-header">
                                <h4 class="title">Drink cadastrados</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-dark" style="padding-left: 10px;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome do drink</th>
                                            <th>Bebida</th>
                                            <th>Quantidade (ml)</th>
                                            <th>Preço</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($drinks as $drink)
                                            <tr>
                                                <td>{{$drink->id}}</td>
                                                <td>{{$drink->nmdrink}}</td>
                                                <td>{{$drink->nmingrediente}}</td>
                                                <td>{{$drink->qtd_ml_principal}}</td>
                                                <td>R$ {{$drink->vrdrink}}</td>
                                                <td class="text-center">
                                                    <!-- Excluir -->
                                                    <form method="POST" action="{{ route('drinks.destroy', ['id' => $drink->id]) }}" style="display: inline" onsubmit="return confirm('Deseja exclui este registro?');" >
                                                        {{ csrf_field() }}
                                                        <a href="{{ route('drinks.edit',$drink->id) }}" class="btn btn-primary">
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
        function addGroup() {
            var numGamb = document.getElementsByClassName('gambiarra')
            var inputGroup = `<div class="row gambiarra" >
            <div class="col-md-3 pr-md-1">
                                                <div class="form-group">
                                                    <label>Adicional</label>
                                                    <input type="text" class="form-control" id="bebidaAdiconal" placeholder="Bebida adicional">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pr-md-1">
                                                <div class="form-group">
                                                    <label>Quantidade (ml)</label>
                                                    <input type="text" class="form-control" id="qntBebidaAdicional" placeholder="Quantidade da bebiba usada">
                                                </div>
                                            </div>
                                            <div class="col-md-3 pl-md-1">
                                                <div class="form-group">
                                                    <label>Adicional</label>
                                                    <input type="text" class="form-control" id="adicional" placeholder="Frutas ou ingredientes">
                                                </div>
                                            </div>
                                            <div class="col-md-2 pl-md-1">
                                                <div class="form-group">
                                                    <label>Preço do drink</label>
                                                    <input type="text" class="form-control" id="preco" placeholder="R$ 00,00">
                                                </div>
                                            </div>
                                            <div class="col-md-1 pl-md-1">
                                                <div class="form-group">
                                                    <label>Remover</label>
                                                    <a class="form-control btn btn-danger" id="remInput" onclick="removerGroup(${numGamb.length})" style="color:#fff">
                                                        <span class="tim-icons icon-trash-simple" aria-hidden="true"></span>
                                                    </a>
                                                </div>
                                            </div>
                                            </div>`

            document.getElementById('addIngrediente').innerHTML += inputGroup
        }

        function removerGroup(numGamb) {

            var elemento = document.getElementsByClassName('gambiarra')

            elemento[numGamb].remove()
        }

        /*$(function() {
            var scntDiv = $('#addIngrediente');

            $(document).on('click', '#addInput', function() {
                $(`
                                        <p>
                                            <div class="col-md-3 pr-md-1">
                                                <div class="form-group">
                                                    <label>Adicional</label>
                                                    <input type="text" class="form-control" id="bebidaAdiconal" placeholder="Bebida adicional">
                                                </div>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="col-md-3 pr-md-1">
                                                <div class="form-group">
                                                    <label>Quantidade (ml)</label>
                                                    <input type="text" class="form-control" id="qntBebidaAdicional" placeholder="Quantidade da bebiba usada">
                                                </div>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="col-md-3 pl-md-1">
                                                <div class="form-group">
                                                    <label>Adicional</label>
                                                    <input type="text" class="form-control" id="adicional" placeholder="Frutas ou ingredientes">
                                                </div>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="col-md-2 pl-md-1">
                                                <div class="form-group">
                                                    <label>Preço do drink</label>
                                                    <input type="text" class="form-control" id="preco" placeholder="R$ 00,00">
                                                </div>
                                            </div>
                                        </p>
                                        <p>
                                            <div class="col-md-1 pl-md-1">
                                                <div class="form-group">
                                                    <label>Remover</label>
                                                    <a class="form-control btn btn-danger" href="javascript:void(0)" id="remInput">
                                                        <span class="tim-icons icon-trash-simple" aria-hidden="true"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </p>
                `).appendTo(scntDiv)
                return false;
            }); */
        /* $(document).on('click', '#remInput', function() {
            $('#addIngrediente').remove();
            return false;

        });
 */

        /* 
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
                }); */
    </script>
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