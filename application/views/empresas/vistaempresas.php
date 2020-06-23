<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tabla Empresa</h4>
            <button type="button" class="btn btn-outline-primary btn-icon-text" id="btnCrearEmpresa">
                <i class="mdi mdi-new-box btn-icon-prepend"></i>
                Crear Empresa
            </button>
            <div class="table-responsive">
                <table class="table table-sm  table-bordered" id="tablaEmpresa">
                    <thead>
                        <tr>
                           <th>Id</th>
                           <th>Nit</th>
                           <th>Nombre</th>
                           <th>Estado</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
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
                    <input type="text" class="form-control form-control-sm" name="empresasNit"  placeholder="Nit">
                    <input type="hidden" class="form-control form-control-sm" name="empresasId"  placeholder="Id">
                    <input type="hidden" class="form-control form-control-sm" name="empresasOpcion"  placeholder="Opcion">
                    <input type="hidden" class="form-control form-control-sm" name="empresasEstado"  placeholder="Estado">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Nombre</label>
                    <input type="text" class="form-control form-control-sm" name="empresasNombre"  placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Direccion</label>
                    <input type="text" class="form-control form-control-sm" name="empresasDireccion"  placeholder="Direccion">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Ciudad</label>
                    <select name="empresasCiudad" class="form-control form-control-sm">
                        <option value="1">Barranquilla</option>
                        <option value="2">Soledad</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Pais</label>
                    <select name="empresasPais" class="form-control form-control-sm">
                        <option value="1">Colombia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Telefono</label>
                    <input type="number" class="form-control form-control-sm" name="empresasTelefono"  placeholder="Telefono">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Correo</label>
                    <input type="email" class="form-control form-control-sm" name="empresasCorreo"  placeholder="Correo">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger mdi mdi-delete" id="btnBloquearEmpresa"></button>
                <button type="button" class="btn btn-outline-secondary mdi mdi-close" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-outline-primary mdi mdi-content-save" id="btnGuardarEmpresa">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('asset/ajax/empresas.js') ?>"></script>