<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.js"></script>
    </head>
    <body>
        <div id="login">
            <div class="img"></div>
            <div class="targeta">
                <img src="{{ asset('img/logos/ceert-logo-branco.png') }}" alt="logo Ceert">
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-11 col-sm-9 col-md-7 col-lg-5">
                        <div class="card">            
                            <div class="card-body p-5">
                                @if(session('danger'))
                                    <p class="alert alert-danger rounded">{{ session('danger') }}</p>
                                @endif
                    
                                @if($errors->any())
                                    <div class="alert alert-danger rounded">
                                        <ul class="pb-0 mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <h2 class="text-center mb-4">SUPORTE</h2>
            
                                <form action="{{ route('login.auth') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <input class="form-control" id="email" name="email" placeholder="Usuário">
                                            <i class="fas fa-user"></i>
                                        </div>
                
                                        <div class="form-group col-12 mt-3">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="********">
                                            <i class="fas fa-lock"></i>
                                        </div>
                
                                        <div class="form-group col-12 mt-4 text-end">                            
                                            <input type="submit" class="btn" value="Entrar">
                                        </div>
                                    </div>
                                </form>
                            </div>               
                        </div>
                    </div>
                </div>
            </div>

            <div id="footer">
                <div class="container py-4">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-center mb-0">Copyright &copy; 2002 - 2023 - CEERT - Todos os Direitos Reservados</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            setTimeout(() => {
                $('.alert').fadeOut('fast');
            }, 3000);
        </script>
    </body>
</html>