@extends('layouts.app')
@push('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush
@section('content')
<div class="container">
   <div class="row justify-content-center">
    <div class="col-md-8">
       @if(session()->has('mensagem'))
         <p class="btn btn-success btn-block btn-sm custom_message text-left">{{ session()->get('mensagem') }}</p>
       @endif

       <legend style="color: green; font-weight: bold;">Laravel Crud clientes
          <a href="{{ route('cliente.listar') }}" style="float: right; display:block; color: white; background-color: green; padding: 1px 5px 1px 5px; text-decoration:none; border-radius: 5px; font-size:17px;">Cliente Lista</a></a>
       </legend>

       <form action="{{ route('cliente.salvar')}}" method="post">
       @csrf
       <div class="form-group">
          <label for="">Nome</label>
          <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Digite seu nome">
          <font style="color: red">{{$errors->has('nome') ? $errors->first('nome') : '' }}</font>
       </div>
       <div class="form-group">
          <label for="">Email</label>
          <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Digite seu email">
          <font style="color: red">{{$errors->has('email') ? $errors->first('email') : '' }}</font>
       </div>

       <div class="form-group" style="margin-top: 24px;">
          <input type="submit" class="btn btn-primary" value="Submit">
       </div>
       </form>
    </div>
   </div>
</div>
@endsection