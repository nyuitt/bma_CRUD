<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="addnewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnewModalLabel">Adicionar novo usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif 

                <form method="POST" action="{{ url('/save') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="firstname" class="form-label">Nome</label>
                        <input type="text" name="firstname" class="form-control" placeholder="Informe o primeiro nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Sobrenome</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Informe o sobrenome" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" placeholder="Informe o e-mail" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control" placeholder="Informe a senha" required>
                    </div>
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Data de Nascimento</label>
                        <input type="text" name="birthdate" class="form-control datepicker" placeholder="Selecione a data de nascimento" required autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i>Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
