$(document).ready(function(){
    tablaClientes();
});

//FUNCION TABLA 
function tablaClientes(){
    $.ajax({
        type : "POST",
        url  : urlSite+'/ControladorClientes/tabla',
        dataType : "JSON",
        data : {},
        success: function(data){
            table = $('#tablaClientes').DataTable({
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
                    this.api().columns([0,1,2,3,4,5,6,7]).every(function () {
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
                "rowCallback": function( row, data, index ) {
                    alert(nitGeneral);
                    if(nitGeneral == 1){
                        table.columns( [0] ).visible( true );
                    }else
                    {
                        table.columns( [0] ).visible( false );
                    }
                },
                "columns": [
                    { "data": "cl_nitempresa"},
                    { "data": "cl_id"}, 
                    { "data": "cl_nombre"},
                    { "data": "cl_documento"},
                    { "data": "cl_direccion"},
                    { "data": "cl_telefono"},
                    { "data": "cl_email"},
                    { "data": "estado1"},
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


//select
$('.clientesNit').select2({
    dropdownParent: $('#exampleModal'),
    placeholder: 'Selecciona un nit',
    allowClear: true,
    width: '100%',
    ajax: {
            type: "post",
            url: urlSite+'/ControladorClientes/nit',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    searchTerm: params.term // search term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
    }
});

$('#btnCrearClientes').on('click',function(){
    
    $('#exampleModalLabel').html('<i class="mdi mdi-new-box btn-icon-prepend"></i> Crear Cliente');
    $('[name="clientesOpcion"]').val(1);
    $('[name="clientesID"]').val(0);
    $('[name="clientesNit"]').append($('<option>', {
        val: '',
        text:'',
        selected: true
    }));
    $('[name="clientesNombre"]').val('');
    $('[name="clientesDireccion"]').val('');
    $('[name="clientesDocumento"]').val(''); 
    $('[name="clientesTelefono"]').val('');
    $('[name="clientesEmail"]').val('');
    $('[name="clientesEstado"]').val('');

    $("#btnBloquearClientes").addClass("invisible");

    $('#exampleModal').appendTo("body").modal('show');
});

$('#btnGuardarClientes').on('click',function(){
    
    var opcion      =   $('[name="clientesOpcion"]').val();
    var id          =   $('[name="clientesID"]').val();
    var nit         =   $('[name="clientesNit"]').val();
    var nombre      =   $('[name="clientesNombre"]').val();
    var direccion   =   $('[name="clientesDireccion"]').val();
    var documento   =   $('[name="clientesDocumento"]').val();  
    var telefono    =   $('[name="clientesTelefono"]').val();
    var email       =   $('[name="clientesEmail"]').val();
    var estado      =   $('[name="clientesEstado"]').val();

    if(nit == ''){
        Notiflix.Notify.Failure('Digite el nit de la empresa a la que pertenece');
        $('[name="clientesNit"]').focus();
        return false;
    }

    if(nombre == ''){
        Notiflix.Notify.Failure('Digite el nombre del cliente');
        $('[name="clientesNombre"]').focus();
        return false;
    }

    var formData = new FormData();
    formData.append('opcion',opcion);
    formData.append('id',id);
    formData.append('nit',nit);
    formData.append('nombre',nombre);
    formData.append('direccion',direccion);
    formData.append('documento',documento);
    formData.append('telefono',telefono);
    formData.append('email',email);
    formData.append('estado',estado);
    
    $.ajax({
        type : "POST",
        url  :  urlSite+'/ControladorClientes/guardar',
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
                    `El cliente fue registrado exitosamente. <br><br>- APPs Cake`, 'Click' ); 

                tablaClientes();
                $("#exampleModal").modal('hide');//ocultamos el modal
            }else if(data == 2){

                Notiflix.Report.Success( 
                    `Mensaje`, 
                    `El cliente fue editado exitosamente. <br><br>- APPs Cake`, 'Click' ); 

                tablaClientes();
                $("#exampleModal").modal('hide');//ocultamos el modal
            }
           
        }
    });
    
});

$('#tablaClientes tbody').on('click','tr',function() {

 
    var data = table.row( $(this) ).data();

    var id          = data.cl_id;
    var nombre         = data.cl_nombre;
    var documento      = data.cl_documento;
    var direccion   = data.cl_direccion	;
    var telefono      = data.cl_telefono;
    var email        = data.cl_email;
    var estado    = data.cl_estado;
    var nit      = data.cl_nitempresa;
   
    $('#exampleModalLabel').html('<i class="mdi mdi-table-edit btn-icon-prepend"></i> Editar Cliente');
    $('[name="clientesOpcion"]').val(2);
    $('[name="clientesID"]').val(id);
    $('[name="clientesNit"]').val(nit);
    $('[name="clientesNombre"]').val(nombre);
    $('[name="clientesDireccion"]').val(direccion);
    $('[name="clientesDocumento"]').val(documento);  
    $('[name="clientesTelefono"]').val(telefono);
    $('[name="clientesEmail"]').val(email);
    $('[name="clientesEstado"]').val(estado);

    if(estado == 1){
        $('#btnBloquearClientes').text('Bloquear');
    }else if(estado == 2){
        $('#btnBloquearClientes').text('Desbloquear');
    }

    $("#btnBloquearClientes").removeClass("invisible");
  

   
    $('#exampleModal').appendTo("body").modal('show');

   
});

$('#btnBloquearClientes').on('click',function(){
    
    var opcion      =   3;
    var id          =   $('[name="clientesID"]').val();
    var nombre      =   $('[name="clientesNombre"]').val();
    var estado      =   $('[name="clientesEstado"]').val();

    var titulo      =  $('#btnBloquearClientes').text();
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
            'Deseas '+titulo+' al cliente '+nombre+'?', 
            'Yes', 'No', 
            function(){ // Yes button callback 
                $.ajax({
                    type : "POST",
                    url  :  urlSite+'/ControladorClientes/guardar',
                    dataType : "JSON",
                    data : formData,
                    contentType: false,
                    processData: false,
                    success: function(data){
            
                        Notiflix.Report.Success( 
                            `Mensaje`, 
                            `La empresa fue `+titulo2+` exitosamente. <br><br>- APPs Cake`, 'Click' 
                        ); 
            
                        tablaClientes();
                        $("#exampleModal").modal('hide');//ocultamos el modal
                    }
                });
            }, 
            function(){ // No button callback 
                Notiflix.Notify.Failure('La Accion fue cancelada');
            } ); 
    
    
});
