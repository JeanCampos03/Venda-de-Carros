@extends('profile.index')

@section('form_delete_passwd')
<div class="col-lg-8">

                    <div class="card">
                        
                        <div class="card-body">                                                    
                            <form action="{{ route('perfil.destroy') }}" method="POST" class="p-4 rounded shadow-sm bg-light border">
    @csrf
    @method('delete')

    <!-- Botão Voltar -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('perfil.edit') }}" class="btn btn-info">
            <i class="fa fa-undo me-1"></i> Voltar
        </a>
    </div>

    <!-- Campo de Senha -->
    <div class="mb-3">
        <label for="password" class="form-label fw-semibold">
            Digite sua senha para confirmar a exclusão da conta:
        </label>
        <input type="password" id="password" name="password"
               class="form-control border-danger-subtle shadow-sm"
               placeholder="Digite sua senha..." required>
    </div>

    <!-- Botão de exclusão -->
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-danger px-4"
                onclick="return confirm('Tem certeza que deseja excluir sua conta? Esta ação não poderá ser desfeita.')">
            <i class="fa fa-trash me-1"></i> Excluir Conta
        </button>
    </div>
</form>
                        </div>
                    </div>
@endsection