@extends('layouts.main', ['activePage' => 'users', 'titlePage' => 'Usuarios'])

@section('content')
    <div class="content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title" style="font-size: 20px;">Usuarios</h4>
                                        <p class="card-category" style="font-size: 20px;">Usuarios Activos</p>
                                    </div>

                                    <div class="card-body">
                                        @if(session('success')) <!--el success proviene del metodo store de UserController-->
                                            <div class="alert alert-success" role="success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <div class="row">
                                            <div class="col-12 text-right">
                                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary" style="font-size: 24px;">Añadir Usuario</a>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="text-primary" style="color: #fc8621 !important;">
                                                    <th style="font-size: 26px;">Nombre</th>
                                                    <th style="font-size: 26px;">Correo</th>
                                                    <th style="font-size: 26px;">Fecha de creacion</th>
                                                    <th class="text-right" style="font-size: 26px;">Acciones</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($usuarios as $usuario)
                                                        <tr>
                                                            <td style="font-size: 20px;">{{ $usuario->name }}</td>
                                                            <td style="font-size: 20px;">{{ $usuario->email }}</td>
                                                            <td style="font-size: 20px;">{{ $usuario->created_at }}</td>
                                                            <td class="td-actions text-right"><!--Se agrega esta clase para que los botones tengan un tamaño chico-->
                                                                <!--Editar-->
                                                                <a class="btn btn-info btn-abrir-popup" role="button" data-id="{{ $usuario->id }}" data-name= "{{ $usuario->name }}"
                                                                data-email="{{ $usuario->email }}" data-created="{{ $usuario->created_at }}" data-toggle="modal" data-target="#userModal">
                                                                    <i class="material-icons">person</i>
                                                                </a>

                                                                <!--Editar-->
                                                                <a href="{{ route('users.edit', $usuario->id) }}" class="btn btn-warning" role="button" >
                                                                    <i class="material-icons">edit</i>
                                                                </a>

                                                                <!--Eliminar-->
                                                                <form action="{{ route('users.delete', $usuario->id) }}" method="post" style="display: inline-block;" onsubmit="return confirm('Seguro que queres eliminar este usuario?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger" type="submit" rel="tooltip">
                                                                    <i class="material-icons">close</i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--PAGINACION-->
                                    <div class="card-footer mr-auto">
                                        {{ $usuarios->links() }}
                                    </div>
                                    <!--PAGINACION-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true" >
        <div class="modal-dialog-2" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos del usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td><p id="user_id"></p></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><p id="user_name"></p></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><span class="badge badge-primary" id="user_email"></span></td>
                            </tr>
                            <tr>
                                <th>Created at</th>
                                <td><p id="user_created"></p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
