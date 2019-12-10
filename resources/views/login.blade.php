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

<body style="background-image: url( {{ asset('img/bar.jpg') }} ); height: 100%; background-size: cover; background-position: top center;">
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
    @if(session()->get('ERROR'))
        <script>
            $.notify('<strong>Error</strong> {{ session()->get('ERROR') }}', {
                type: 'danger',
                allow_dismiss: false
            });
        </script>
    @endif
    <div class="row justify-content-center" style="margin-top: 8%">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center" style="font-size: 15px; padding-top: 5px;"><img src="{{ asset('img/planeta.png') }}" style="padding-right: 7px;"> Planeta Etílico</h6>
                </div>
                <div class="card-body" style="padding-bottom: 0;">
                    <form method="POST" action="{{ route('login.store') }}">
                        {{ @csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Login</label>
                                    <input id="login" name="login" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input name="senha" id="senha" type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="padding-top: 0;">
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-fill btn-primary">Entrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>

</html>