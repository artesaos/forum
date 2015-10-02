@extends('forum::base')

@section('base:body')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-push-3">
                <form class="form-signin" method="POST" action="{{ route('register.save') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h2 class="form-signin-heading">Cadastre-se</h2>

                    <p>
                      Cadastre-se para participar do nosso forum.
                    </p>
                    @if($errors->count())
                    <div class="alert alert-danger">
                        {!! join($errors->all(),'<br/>') !!}
                    </div>
                    @endif
                    <div class="form-group">

                        <label for="inputEmail" class="sr-only">Nome</label>
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               id="inputName"
                               class="form-control"
                               placeholder="Seu Nome"  autofocus>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">

                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               id="inputEmail"
                               class="form-control"
                               placeholder="Email"  autofocus>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Senha</label>
                        <input type="password"
                               name="password"
                               id="inputPassword"
                               value="{{ old('password') }}"
                               class="form-control"
                               placeholder="Senha" >
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Confirmação da senha</label>
                        <input type="password"
                               name="confirmation_password"
                               value="{{ old('confirmation_password') }}"
                               id="inputPassword"
                               class="form-control" placeholder="Confirmação da senha" >
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>
                </form>
            </div>
            <!-- /.col-md-6 -->
        </div>
    </div>
@endsection
