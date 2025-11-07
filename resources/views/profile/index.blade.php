@extends('index')

@section('conteudo')

<div class="page-content mt-navbar">
    <div class="container-profile">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="images/profile.jpg" 
                                    class="rounded-circle p-1" width="110">
                                <div class="mt-3">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="text-secondary mb-1">Full Stack Developer</p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                    <div class="card-body">


                                    <a href="" class="btn btn-primary">Alterar Senha</a>    

                                    <a href="{{ route('delete.password') }}" class="btn btn-warning">Excluir Conta</a>

                                                                  
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                @yield('form_change_user')
                @yield('form_delete_passwd')

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card"></div>
                        </div>
                    </div>

                </div> <!-- /col-lg-8 -->
            </div> <!-- /row -->
        </div> <!-- /main-body -->
    </div> <!-- /container-profile -->
</div> <!-- /page-content -->

@endsection