@extends('profile.index')

@section('form_edit_passwd')
<div class="col-lg-8">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                @method('put')
                @if (session('status') === 'password-updated')
                <div class="alert alert-success">
                    Senha atualizada com sucesso!
                </div>
                @endif
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Senha Atual</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="password" class="form-control" name="current_password">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Senha nova</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Confirme a nova senha</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="password" class="form-control" name="password_confirmation">
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