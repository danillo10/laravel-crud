@include('layout.header')

<div class="p-3">
    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('clientes.store') }}" method="post">
            @csrf
            <div class="col-3">
                <div class="form-group">
                    <label for="nome">Nome Completo *</label>
                    <input type="text" class="form-control" value="{{ (isset($cliente)) ? $cliente->nome : ''}}" id="nome" name="nome" placeholder="Digite seu nome completo" maxlenght="50">
                    @if ($errors->has('nome'))
                        <span class="text-danger">O campo nome é obrigatório.</span>
                    @endif
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="email">E-mail *</label>
                    <input type="email" class="form-control" value="{{ (isset($cliente)) ? $cliente->email : ''}}" id="email" name="email" placeholder="Digite seu melhor e-mail" maxlenght="50">
                    @if ($errors->has('email'))
                        @foreach ($errors->get('email') as $message)
                            <span class="text-danger">{{$message}}</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="telefone">Telefone *</label>
                    <input type="text" class="form-control telefone" value="{{ (isset($cliente)) ? $cliente->telefone : ''}}" id="telefone" name="telefone" placeholder="(00) 00000-0000" maxlenght="20">
                    @if ($errors->has('telefone'))
                        <span class="text-danger">O campo telefone é obrigatório.</span>
                    @endif
                </div>
            </div>
            @if(isset($clt))
            
            <div class="endereco">
                <div class="col-2">
                    <div class="form-group">
                        <label for="cep">Cep</label>
                        <input type="text" class="form-control cep" id="cep" name="cep[]" placeholder="00000-000" maxlenght="10">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco[]" maxlenght="50">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro[]" maxlenght="30">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento[]" maxlenght="30">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label for="numero">Número</label>
                        <input type="text" class="form-control" id="numero" name="numero[]" maxlenght="10">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade[]" maxlenght="50">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="cidade">Estado</label>
                        <select class="form-control" id="estado" name="estado[]">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                </div>
            </div>
            @else
            <div class="endereco">
                <div class="col-2">
                    <div class="form-group">
                        <label for="cep">Cep</label>
                        <input type="text" class="form-control cep" id="cep" name="cep[]" placeholder="00000-000" maxlenght="10">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco[]" maxlenght="50">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro[]" maxlenght="30">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento[]" maxlenght="30">
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <label for="numero">Número</label>
                        <input type="text" class="form-control" id="numero" name="numero[]" maxlenght="10">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade[]" maxlenght="50">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="cidade">Estado</label>
                        <select class="form-control" id="estado" name="estado[]">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                </div>
            </div>
            @endif
            <div class="enderecos"></div>
            <div class="col-5 mb-3">
                <button type="button" class="btn btn-link add">[+] Adicionar outro endereço</button>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</div>

@include('layout.footer')