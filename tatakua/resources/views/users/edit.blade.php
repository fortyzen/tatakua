@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Editar Usuario'])

@section('content')
<div class="content">
    <div class="conteiner-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('users.update', $user->id) }}" method="post" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Usuario</h4>
                            <p class="card-category">Editar datos</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <!--old('name', $user->name) porque primero va a traer los datos del usuario en la base de datos
                                    y cuando ocurra un error va a mantener el nuevo dato ingresado en el input si se modifico algo del que se trajo de la BD
                                    -->
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" autofocus>
                                    @if ($errors->has('name')) <!--Si hay error en el campo name-->
                                        <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                                    @if ($errors->has('email')) <!--Si hay error en el campo name-->
                                        <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" placeholder="Ingrese la Contraseña solo en caso de querer cambiarla">
                                    @if ($errors->has('password')) <!--Si hay error en el campo name-->
                                        <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!--Footer-->
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                        <!--End Footer-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
