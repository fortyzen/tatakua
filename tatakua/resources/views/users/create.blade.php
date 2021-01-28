@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Nuevo Usuario'])

@section('content')
<div class="content">
    <div class="conteiner-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('users.store') }}" method="post" class="form-horizontal">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title" >Usuario</h4>
                            <p class="card-category" style="font-size: 20px;">Ingresar datos</p>
                        </div>
                        <div class="card-body" style="font-size: 18px;">
                            <!--Para saber los errores que hay a la hora de ingresar los
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            !--ERRORES END-->

                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre" value="{{ old('name') }}" autofocus> <!--old(->> 'name' <<-) es el valor de name="ejemplo"-->
                                    @if ($errors->has('name')) <!--Si hay error en el campo name-->
                                        <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="email" placeholder="Ingrese el Correo" value="{{ old('email') }}">
                                    @if ($errors->has('email')) <!--Si hay error en el campo email-->
                                        <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" name="password" placeholder="Ingrese la Contraseña" value="{{ old('password') }}">
                                    @if ($errors->has('password')) <!--Si hay error en el campo password-->
                                        <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!--Footer-->
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        <!--End Footer-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
