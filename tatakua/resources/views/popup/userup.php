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
                                <td>{{ $usuario->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><span class="badge badge-primary"></span></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Created at</th>
                                <td>dsgs</a></td>
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
