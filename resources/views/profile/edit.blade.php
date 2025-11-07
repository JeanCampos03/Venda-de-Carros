@extends('profile.index')

@section('form_change_user')
<div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('perfil.update') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nome Completo</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}"
                                            name="name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{ Auth::user()->email }}"
                                            name="email">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-success px-4" value="Salvar Mudanças">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
@endsection