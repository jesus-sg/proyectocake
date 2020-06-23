<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Lista Clientes</h4>
            <button type="button" class="btn btn-outline-primary btn-icon-text" id="btnCrearClientes">
                <i class="mdi mdi-new-box btn-icon-prepend"></i>
                Crear Cliente
            </button>
            <div class="table-responsive">
                <table class="table table-sm  table-bordered" id="tablaClientes">
                    <thead>
                        <tr>
                           <th>Nit</th>
                           <th>Id</th>
                           <th>Nombre</th>
                           <th>Documento</th>
                           <th>Direccion</th>
                           <th>Telefono</th>
                           <th>Email</th>
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
            <div class="modal-header blue-standard">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body scroll_text p-4">
                <div class="form-group">
                    <label for="exampleInputUsername1">Nit</label>
                    <!--<input type="text" class="form-control form-control-sm" name="clientesNit"  placeholder="Nit">-->
                    <select class="form-control form-control-sm clientesNit" name="clientesNit" ></select>
                    <input type="hidden" class="form-control form-control-sm" name="clientesID"  placeholder="Id">
                    <input type="hidden" class="form-control form-control-sm" name="clientesOpcion"  placeholder="Opcion">
                    <input type="hidden" class="form-control form-control-sm" name="clientesEstado"  placeholder="Estado">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Nombre</label>
                    <input type="text" class="form-control form-control-sm" name="clientesNombre"  placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Documento</label>
                    <input type="text" class="form-control form-control-sm" name="clientesDocumento"  placeholder="Documento">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Direccion</label>
                    <input type="text" class="form-control form-control-sm" name="clientesDireccion"  placeholder="Direccion">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Telefono</label>
                    <input type="number" class="form-control form-control-sm" name="clientesTelefono"  placeholder="Telefono">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Correo</label>
                    <input type="email" class="form-control form-control-sm" name="clientesEmail"  placeholder="Correo">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger mdi mdi-delete" id="btnBloquearClientes"></button>
                <button type="button" class="btn btn-outline-secondary mdi mdi-close" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-outline-primary mdi mdi-content-save" id="btnGuardarClientes">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('asset/ajax/clientes.js') ?>"></script>