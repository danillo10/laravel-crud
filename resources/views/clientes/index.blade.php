@include('layout.header')

<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('clientes.create') }}" class="btn btn-primary m-4">NOVO CLIENTE</a>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Ações</th>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Cep</th>
                <th scope="col">Endereço</th>
                <th scope="col">Bairro</th>
                <th scope="col">Complemento</th>
                <th scope="col">Número</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>
                <div class="d-flex flex-row align-items-center justify-content-center">
                    <form action="{{ route('clientes.destroy',$cliente->id)}}" method="post">
                        <a href="{{ route('clientes.show',$cliente->id)}}"><i class="far fa-edit" style="color: lightblue"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-light"><i class="fas fa-trash" style="color: lightblue"></i></button>
                    </form>
                </div>
            </td>
            <th scope="row">{{$cliente->id}}</th>
            <td>{{$cliente->nome}}</td>
            <td>{{$cliente->email}}</td>
            <td>{{$cliente->telefone}}</td>
                @foreach($cliente->enderecos as $endereco)
                    @if($loop->first)
                    <td>{{$endereco->endereco}}</td>
                    <td>{{$endereco->cep}}</td>
                    <td>{{$endereco->bairro}}</td>
                    <td>{{$endereco->complemento}}</td>
                    <td>{{$endereco->numero}}</td>
                    <td>{{$endereco->cidade}}</td>
                    <td>{{$endereco->estado}}</td>
                    @endif
                @endforeach
        </tr>
        @endforeach
    </tbody>
    </table>
</div>

@include('layout.footer')