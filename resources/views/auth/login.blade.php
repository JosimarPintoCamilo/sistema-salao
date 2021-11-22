@extends('auth.layout')

@section('content')
  
  <main class="form-signin">
    <form action="{{route('auth.authenticate')}}" method="POST">
      @csrf
      <img class="mb-4" src="painel/images/bootstrap-logo.svg" alt="logo" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Acesse sua conta</h1>

      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Digite seu e-mail</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Entrar</button>
    </form>
  </main>

@endsection