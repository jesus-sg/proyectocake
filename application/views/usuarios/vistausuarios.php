<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tabla Usuarios</h4>
            <button type="button" class="btn btn-outline-primary btn-icon-text" id="btnCrearUsuarios">
                <i class="mdi mdi-new-box btn-icon-prepend"></i>
                Crear Usuario
            </button>
            <div class="table-responsive">
                <table class="table table-sm  table-bordered" id="tablaUsuarios">
                    <thead>
                        <tr>
                           <th>Nit</th>
                           <th>Usuario</th>
                           <th>Nombre</th>
                           <th>Tipo</th>
                           <th>Estado</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--MODALS-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body scroll_text">
                <div class="form-group">
                    <label for="exampleInputUsername1">Nit</label>
                    <select class="form-control form-control-sm usuariosNit" name="usuariosNit" ></select>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Usuario</label>
                    <input type="text" class="form-control form-control-sm"   name="usuariosUser"  placeholder="Usuario">
                    <input type="hidden" class="form-control form-control-sm" name="usuariosId"  placeholder="Id">
                    <input type="hidden" class="form-control form-control-sm" name="usuariosOpcion"  placeholder="Opcion">
                    <input type="hidden" class="form-control form-control-sm" name="usuariosEstado"  placeholder="Estado">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Nombre</label>
                    <input type="text" class="form-control form-control-sm" name="usuariosNombre"  placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Tipo</label>
                    <select class="form-control form-control-sm usuariosTipo" name="usuariosTipo" ></select>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Direccion</label>
                    <input type="text" class="form-control form-control-sm" name="usuariosDireccion"  placeholder="Direccion">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Ciudad</label>
                    <select name="usuariosCiudad" class="form-control form-control-sm">
                        <option value="1">Barranquilla</option>
                        <option value="2">Soledad</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Pais</label>
                    <select name="usuariosPais" class="form-control form-control-sm">
                        <option value="1">Colombia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Telefono</label>
                    <input type="number" class="form-control form-control-sm" name="usuariosTelefono"  placeholder="Telefono">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Correo</label>
                    <input type="email" class="form-control form-control-sm" name="usuariosCorreo"  placeholder="Correo">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger mdi mdi-delete" id="btnBloquearUsuarios"></button>
                <button type="button" class="btn btn-outline-secondary mdi mdi-close" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-outline-primary mdi mdi-content-save" id="btnGuardarUsuarios">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('asset/ajax/usuarios.js') ?>"></script>