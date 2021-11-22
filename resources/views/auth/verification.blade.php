@extends('auth.layout')

@section('content')
<main class="form-signin">
    <h2 class="h4 mb-3 fw-normal">Enviamos um código no seu e-mail</h2>

    

<form id="formVerification">
    @csrf

    <div class="alert alert-danger d-none messages">
    </div>

    <div class="form-floating">
        <input autofocus type="text" class="form-control" id="floatingInput" placeholder="123456" name="code">
        <label for="floatingInput">Digite seu código de quatro dígitos</label>
    </div>
    
    <input hidden type="text" name="email" value="{{ $email }}">

    <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Verificar</button>

</form>
</main>
@endsection

@section('scripst')
<script>
    $( "#formVerification" ).submit(function( event ) {
        event.preventDefault();

        $.ajax({
            url: "{{route('auth.verification')}}",
            type: "post",
            data: $(this).serialize(),
            dataType: 'json',
            success: function(res){
                console.log(res);
                if(res.error){
                    $('.messages').removeClass('d-none').html(res.message);
                }else
                {
                    window.location.href = "{{route('admin.dashboard')}}";
                }

            }
        });
    });
</script>
@endsection