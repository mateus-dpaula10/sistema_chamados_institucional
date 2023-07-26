<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CEERT Service Desk</title>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar sticky-top z-3" id="menu_top">
                <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar" aria-label="Toggle navigation" id="btn_toggle">
                    <span class="navbar-toggler-icon">
                        <div></div>
                        <div></div>
                        <div></div>
                    </span>
                  </button>
                  <a class="navbar-brand mx-0">
                    <img src="{{ asset('img/logos/ceert-logo-branco.png') }}" alt="Logo Ceert" class="d-block mx-auto w-25">
                  </a>
                  <div id="user">
                    <h6 class="mb-0">{{ auth()->user()->nome }} <i class="fa-solid fa-caret-down"></i></h6>

                    <ul id="submenu_main">
                        <li>
                            <a href="" id="editar_perfil"><i class="fa-solid fa-pencil me-2"></i>Editar perfil</a>
                        </li>
                        <hr>
                        <li>
                            <a href="{{ route('login.logout') }}"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
                        </li>
                    </ul>
                  </div>
                  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                      <button type="button" class="btn-close ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <ul class="navbar-nav justify-content-end pe-3">
                        @if(Auth::user()->tipo_acesso == 'Colaborador')
                            {{-- <li class="nav-item">
                                <a class="nav-link {{ Request::routeIs('chamados.indexTi') || Request::routeIs('chamados.indexCompliance') ? 'active' : '' }}" aria-current="page" href="{{ route('chamados.index') }}"><i class="fa-solid fa-house me-2"></i>Home</a>
                            </li> --}}
                            <hr>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::routeIs('chamados.acompanhamentoTi') ? 'active' : '' }}" href="{{ route('chamados.acompanhamentoTi') }}"><i class="fa-solid fa-bars me-2"></i>Meus chamados</a>
                            </li>
                            <hr>
                        @endif
                        @if(Auth::user()->tipo_acesso == 'Cliente')
                            <li class="nav-item">
                                <a class="nav-link {{ Request::routeIs('chamados.create') ? 'active' : '' }}" href="{{ route('chamados.create') }}"><i class="fa-solid fa-plus me-2"></i>Criar chamado</a>
                            </li>
                            <hr>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::routeIs('chamados.acompanhamento') ? 'active' : '' }}" href="{{ route('chamados.acompanhamento') }}"><i class="fa-solid fa-bars me-2"></i>Meus chamados</a>
                            </li>
                            <hr>
                        @endif
                      </ul>
                    </div>
                  </div>
                </div>
            </nav>
        </header>

        <script>
            $('#editar_perfil').click(function(e){
                e.preventDefault();
                $('#modalEditarPerfil').modal('show');
            });

            $('#user').click(function(){
                $('#user #submenu_main').toggleClass('active');
            });
        </script>

        <!-- Modal User -->
        <div class="modal fade" id="modalEditarPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mb-0">Deseja realmente sair?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('chamados.editar_perfil', ['id' => auth()->user()->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="nome" class="form-label">Nome:</label>
                                    <input type="text" class="form-control" name="nome" id="nome" value="{{ auth()->user()->nome }}">
                                </div>
                                <div class="form-group col-12 mt-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}">
                                </div>
                                <div class="form-group col-12 mt-3">
                                    <label for="password" class="form-label">Senha:</label>
                                    <input type="password" class="form-control" name="password" id="password" value="{{ auth()->user()->password }}">
                                </div>
                                <div class="form-group col-12 text-end mt-3">
                                    <input type="submit" class="btn btn-success" value="Salvar alterações">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <main>
            <div id="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 py-3">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <div class="container py-3">
                <div class="row">
                    <div class="col-12">
                        <p class="text-center mb-0 text-white fw-semibold text-opacity-75">Copyright &copy; 2002 - <?php echo date("Y") ?> - CEERT - Todos os Direitos Reservados</p>
                    </div>
                </div>
            </div>
        </footer>

        <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
