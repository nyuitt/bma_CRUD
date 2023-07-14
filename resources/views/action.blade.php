<!-- Edit Modal -->
<div class="modal fade" id="edit{{$member->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Editar dados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('member.update', $member->id) }}">
                    @csrf
                    @method('PATCH')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <div class="mb-3">
                    <label for="firstname" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $member->first_name }}">
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Sobrenome</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $member->last_name }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $member->email }}">
                </div>
                 <!-- Formulário para atualização da senha -->
                 <form method="POST" action="{{ route('member.update', $member->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Senha Atual</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                    </div>
                    @if($errors->has('current_password'))
                    <div class="error">{{ $errors->first('current_password') }}</div>
                    @endif
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Nova Senha</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Atualizar</button>
            </div>
        </form>
    </div>
</div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="delete{{$member->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Deletar dados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('member.delete', $member->id) }}">
                    @csrf
                    @method('DELETE')
                    <h4 class="text-center">Tem certeza que deseja excluir os dados desse membro?</h4>
                    <h5 class="text-center">Nome: {{ $member->first_name }} {{ $member->last_name }}</h5>
                </div>
                <div class="mb-3">
                        <label for="password" class="form-label">Senha do Membro</label>
                        <input type="password" class="form-control" id="password" name="password">
                </div>
                @if($errors->has('password') && old('delete_id') == $member->id)
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>