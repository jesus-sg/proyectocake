$(document).ready(function(){
    tablaEmpresa();
});

//FUNCION TABLA 
function tablaEmpresa(){

    $.ajax({
        type : "POST",
        url  : urlSite+'/ControladorEmpresas/tabla',
        dataType : "JSON",
        data : {},
        success: function(data){
            table = $('#tablaEmpresa').DataTable({
                "data": data,
                "bDestroy": true,
                "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
                "order": [[ 0, "asc" ]],
                "lengthMenu": [ [10, 25, 50, -1], [10,25, 50, "Todo"] ],
                "searching": true,
                "autoWidth": false,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                },
                "initComplete": function () {
                     //Apply text search
                    this.api().columns([0,1,2,3]).every(function () {
                        var title = $(this.footer()).text();
                    
                        $(this.footer()).html('<input type="text" class="form-control form-control-sm"  placeholder="Buscar..." />');
                        var that = this;
                        $('input',this.footer()).on('keyup change', function () {
                            if (that.search() !== this.value) {
                                that
                                    .search(this.value)
                                    .draw();
                            }
                        });

                    });
                },
                "columns": [
                    { "data": "em_id"}, 
                    { "data": "em_nit"},
                    { "data": "em_nombre"},
                    { "data": "em_estado"},
                ],
                buttons: [
                /* {
                        extend: 'excelHtml5',
                        title: 'Estados',
                        text: '<i class="fa fa-file-excel-o"></i> Excel',
                    
                    },*/
                ]
            });
        }
    });

}

$('#btnCrearEmpresa').on('click',function(){
    
    $('#exampleModalLabel').html('<i class="mdi mdi-new-box btn-icon-prepend"></i> Crear Empresa');
    $('[name="empresasOpcion"]').val(1);
    $('[name="empresasId"]').val(0);
    $('[name="empresasNit"]').val('');
    $('[name="empresasNombre"]').val('');
    $('[name="empresasDireccion"]').val('');
    $('[name="empresasCiudad"]').val(1);     
    $('[name="empresasPais"]').val(1);  
    $('[name="empresasTelefono"]').val('');
    $('[name="empresasCorreo"]').val('');
    $('[name="empresasEstado"]').val('');

    $("#btnBloquearEmpresa").addClass("invisible");

    $('#exampleModal').appendTo("body").modal('show');
});

$('#btnGuardarEmpresa').on('click',function(){
    
    var opcion      =   $('[name="empresasOpcion"]').val();
    var id          =   $('[name="empresasId"]').val();
    var nit         =   $('[name="empresasNit"]').val();
    var nombre      =   $('[name="empresasNombre"]').val();
    var direccion   =   $('[name="empresasDireccion"]').val();
    var ciudad      =   $('[name="empresasCiudad"]').val();     
    var pais        =   $('[name="empresasPais"]').val();  
    var telefono    =   $('[name="empresasTelefono"]').val();
    var correo      =   $('[name="empresasCorreo"]').val();
    var estado      =   $('[name="empresasEstado"]').val();

    if(nit == ''){
        Notiflix.Notify.Failure('Digite el nit de la empresa');
        $('[name="empresasNit"]').focus();
        return false;
    }

    if(nombre == ''){
        Notiflix.Notify.Failure('Digite el nombre de la empresa');
        $('[name="empresasNombre"]').focus();
        return false;
    }

    var formData = new FormData();
    formData.append('opcion',opcion);
    formData.append('id',id);
    formData.append('nit',nit);
    formData.append('nombre',nombre);
    formData.append('direccion',direccion);
    formData.append('ciudad',ciudad);
    formData.append('pais',pais);
    formData.append('telefono',telefono);
    formData.append('correo',correo);
    formData.append('estado',estado);

    $.ajax({
        type : "POST",
        url  :  urlSite+'/ControladorEmpresas/guardar',
        dataType : "JSON",
        data : formData,
        contentType: false,
        processData: false,
        success: function(data){

            if(data == 1){
                Notiflix.Report.Failure( 
                    `Alerta`, 
                    `Este nit ya se encuentra registrado, 
                    Favor ingresar otro nit. <br><br>- APPs Cake`, 'Click' ); 
            }else if(data == 0){

                Notiflix.Report.Success( 
                    `Mensaje`, 
                    `La empresa fue registrada exitosamente. <br><br>- APPs Cake`, 'Click' ); 

                tablaEmpresa();
                $("#exampleModal").modal('hide');//ocultamos el modal
            }else if(data == 2){

                Notiflix.Report.Success( 
                    `Mensaje`, 
                    `La empresa fue editada exitosamente. <br><br>- APPs Cake`, 'Click' ); 

                tablaEmpresa();
                $("#exampleModal").modal('hide');//ocultamos el modal
            }
           
        }
    });
    
});

$('#tablaEmpresa tbody').on('click','tr',function() {

 
    var data = table.row( $(this) ).data();

    var id          = data.em_id;
    var nit         = data.em_nit;
    var nombre      = data.em_nombre;
    var direccion   = data.em_direccion	;
    var ciudad      = data.em_ciudad;
    var pais        = data.em_pais;
    var telefono    = data.em_telefono;
    var correo      = data.em_correo;
    var estado      = data.em_estado;
   
    $('#exampleModalLabel').html('<i class="mdi mdi-table-edit btn-icon-prepend"></i> Editar Empresa');
    $('[name="empresasOpcion"]').val(2);
    $('[name="empresasId"]').val(id);
    $('[name="empresasNit"]').val(nit);
    $('[name="empresasNombre"]').val(nombre);
    $('[name="empresasDireccion"]').val(direccion);
    $('[name="empresasCiudad"]').val(ciudad);     
    $('[name="empresasPais"]').val(pais);  
    $('[name="empresasTelefono"]').val(telefono);
    $('[name="empresasCorreo"]').val(correo);
    $('[name="empresasEstado"]').val(estado);

    if(estado == 1){
        $('#btnBloquearEmpresa').text('Bloquear');
    }else if(estado == 2){
        $('#btnBloquearEmpresa').text('Desbloquear');
    }

    $("#btnBloquearEmpresa").removeClass("invisible");
  

   
    $('#exampleModal').appendTo("body").modal('show');

   
});

$('#btnBloquearEmpresa').on('click',function(){
    
    var opcion      =   3;
    var id          =   $('[name="empresasId"]').val();
    var nombre      =   $('[name="empresasNombre"]').val();
    var estado      =   $('[name="empresasEstado"]').val();

    var titulo      =  $('#btnBloquearEmpresa').text();
    var titulo2     =  '';

    if(titulo == 'Bloquear'){
        titulo2 = 'Bloqueada';
    }else{
        titulo2 = 'Desbloqueada';
    }

    var formData = new FormData();
    formData.append('opcion',opcion);
    formData.append('id',id);
    formData.append('estado',estado);
    
    Notiflix.Confirm.Show( 
            'Eliminar', 
            'Deseas '+titulo+' la empresa '+nombre+'?', 
            'Yes', 'No', 
            function(){ // Yes button callback 
                $.ajax({
                    type : "POST",
                    url  :  urlSite+'/ControladorEmpresas/guardar',
                    dataType : "JSON",
                    data : formData,
                    contentType: false,
                    processData: false,
                    success: function(data){
            
                        Notiflix.Report.Success( 
                            `Mensaje`, 
                            `La empresa fue `+titulo2+` exitosamente. <br><br>- APPs Cake`, 'Click' 
                        ); 
            
                        tablaEmpresa();
                        $("#exampleModal").modal('hide');//ocultamos el modal
                    }
                });
            }, 
            function(){ // No button callback 
                Notiflix.Notify.Failure('La Accion fue cancelada');
            } ); 
    
    
});