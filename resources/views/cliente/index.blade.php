@extends('layout.app')
@push('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush    
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">

       @if(session()->has('mensagem'))
         <p class="btn btn-success btn-block btn-sm custom_message text-left">{{ session()->get('mensagem') }}</p>
       @endif  

       

       <legend style="color: green; font-weight: bold;">LARAVEL 7.X CRUD EXAMPLE - CODECHIEF
           <a href="{{ route('cliente.add') }}" style="float: right; display: block;color: white; background-color: green; padding: 1px 5px 1px 5px; text-decoration: none; border-radius: 5px; font-size: 17px;"> ADD CUSTOMER</a>
        </legend>

        <table id="example1" class="table table-bordered table-hover">
            <thead>
            <tr class="text-center">
                <th class="text-center">Nº</th>
                <th class="text-center">Nome</th>
                <th class="text-center">Email</th>
                <th class="text-center">Ação</th>
            </tr>
            </thead>
            <tbody>
                @forelse($clientes as $cliente)
                    <tr class="text-center">
                    <td class="text-center">{{ loop->index + 1 }}</td>
                    <td class="text-center">{{ $cliente->nome }}</td>
                    <td class="text-center">{{ $cliente->email }}</td>
                    <td class="text-center">
                    <a href="{{ route('cliente.editar', $cliente->slug)" class="btn btn-sm btn-outline-danger py-0">Editar</a>
                    <a href="{{ route('cliente.mostrar', $cliente->slug)" class="btn btn-sm btn-outline-danger py-0">Ver</a>
                    <a href="" onclick="if(confirm('Você quer deletar este cliente?'))event.preventDefault(); document.getElementById('deletar-{{$cliente->slug}}').submit();" class="btn btn-sm btn-outline-danger py-0">Deletar</a>

                    <form id="deletar--{{$cliente->slug}}" method="POST" action="{{ route('cliente.deletar', $cliente->slug)}}" style="display: none;">
                    @csrf
                    @method('DELETE')
                    </form>
                    </td>
                    </tr>
                    @empty
                    <p> Clientenão encontrado!</p>
                @endforelse    
            </tbody>
        </table>
       </div>
   </div>
</div>
@endsection