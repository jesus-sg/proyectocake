$(document).ready(function(){
    tablaUsuarios();
});

//FUNCION TABLA 
function tablaUsuarios(){

    $.ajax({
        type : "POST",
        url  : urlSite+'/ControladorUsuarios/tabla',
        dataType : "JSON",
        data : {},
        success: function(data){
            table = $('#tablaUsuarios').DataTable({
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

                    this.api().columns([4]).every(function () {
                        var column = this;
                        var select = $('<select class="form-control selectEstado" style="width:100%;"><option value="">TODOS</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                            .search( val ? '^'+val+'$' : '', true, false)
                            .draw();
                         });

                        column.data().unique().sort().each(function (d,j) {
                                select.append('<option value="'+d+'">'+d+'</option>');
                           
                        });
                    });
                    $('.selectEstado').select2();
                },
                "rowCallback": function( row, data, index ) {
                    //alert(nitGeneral);
                    if(nitGeneral == 1){
                        table.columns( [0] ).visible( true );
                    }else
                    {
                        table.columns( [0] ).visible( false );
                    }
                },
                "columns": [
                    { "data": "nitnombre"}, 
                    { "data": "us_usuario"},
                    { "data": "us_nombre"},
                    { "data": "tiponombre"},
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
 $('.usuariosNit').select2({
    dropdownParent: $('#exampleModal'),
    placeholder: 'Selecciona un nit',
    allowClear: true,
    width: '100%',
    ajax: {
            type: "post",
            url: urlSite+'/ControladorUsuarios/nit',
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

//select
$('.usuariosTipo').select2({
    dropdownParent: $('#exampleModal'),
    placeholder: 'Selecciona un tipo',
    allowClear: true,
    width: '100%',
    ajax: {
            type: "post",
            url: urlSite+'/ControladorUsuarios/tipo',
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

$('#btnCrearUsuarios').on('click',function(){
    
    $('#exampleModalLabel').html('<i class="mdi mdi-new-box btn-icon-prepend"></i> Crear Usuarios');
    $('[name="usuariosOpcion"]').val(1);
    $('[name="usuariosId"]').val(0);
    $('[name="usuariosNit"]').append($('<option>', {
        val: '',
        text:'',
        selected: true
    }));
    $('[name="usuariosUser"]').val('');     
    $('[name="usuariosNombre"]').val('');
    $('[name="usuariosTipo"]').append($('<option>', {
        val: '',
        text:'',
        selected: true
    }));
    $('[name="usuariosDireccion"]').val('');     
    $('[name="usuariosCiudad"]').val(1);  
    $('[name="usuariosPais"]').val(1);  
    $('[name="usuariosTelefono"]').val('');
    $('[name="usuariosCorreo"]').val('');
    $('[name="usuariosEstado"]').val('');

    $("#btnBloquearUsuarios").addClass("invisible");

    $('#exampleModal').appendTo("body").modal('show');
});

$('#btnGuardarUsuarios').on('click',function(){
    
    var opcion      =   $('[name="usuariosOpcion"]').val();
    var id          =   $('[name="usuariosId"]').val();
    var nit         =   $('[name="usuariosNit"]').val();
    var usuario     =   $('[name="usuariosUser"]').val();
    var nombre      =   $('[name="usuariosNombre"]').val();
    var tipo        =   $('[name="usuariosTipo"]').val();
    var direccion   =   $('[name="usuariosDireccion"]').val();
    var ciudad      =   $('[name="usuariosCiudad"]').val();     
    var pais        =   $('[name="usuariosPais"]').val();  
    var telefono    =   $('[name="usuariosTelefono"]').val();
    var correo      =   $('[name="usuariosCorreo"]').val();
    var estado      =   $('[name="usuariosEstado"]').val();

   
    if(nit == ''){
        Notiflix.Notify.Failure('Digite el nit');
        return false;
    }

    if(usuario == ''){
        Notiflix.Notify.Failure('Digite el usuario');
        $('[name="usuariosUser"]').focus();
        return false;
    }

    if(nombre == ''){
        Notiflix.Notify.Failure('Digite el nombre');
        $('[name="usuariosNombre"]').focus();
        return false;
    }

    if(tipo == ''){
        Notiflix.Notify.Failure('Digite el tipo');
        return false;
    }

    var formData = new FormData();
    formData.append('opcion',opcion);
    formData.append('id',id);
    formData.append('nit',nit);
    formData.append('usuario',usuario);
    formData.append('nombre',nombre);
    formData.append('tipo',tipo);
    formData.append('direccion',direccion);
    formData.append('ciudad',ciudad);
    formData.append('pais',pais);
    formData.append('telefono',telefono);
    formData.append('correo',correo);
    formData.append('estado',estado);

    $.ajax({
        type : "POST",
        url  :  urlSite+'/ControladorUsuarios/guardar',
        dataType : "JSON",
        data : formData,
        contentType: false,
        processData: false,
        success: function(data){

            if(data == 1){
                Notiflix.Report.Failure( 
                    `Alerta`, 
                    `Este usuario ya se encuentra registrado, 
                    Favor ingresar otro usuario. <br><br>- APPs Cake`, 'Click' ); 
            }else if(data == 0){

                Notiflix.Report.Success( 
                    `Mensaje`, 
                    `El usuario fue registrado exitosamente. <br><br>- APPs Cake`, 'Click' ); 

                    tablaUsuarios();
                $("#exampleModal").modal('hide');//ocultamos el modal
            }else if(data == 2){

                Notiflix.Report.Success( 
                    `Mensaje`, 
                    `El usuario fue editada exitosamente. <br><br>- APPs Cake`, 'Click' ); 

                    tablaUsuarios();
                $("#exampleModal").modal('hide');//ocultamos el modal
            }
           
        }
    });
    
});

$('#tablaUsuarios tbody').on('click','tr',function() {

 
    var data = table.row( $(this) ).data();

    var id          = data.us_id;
    var nit         = data.us_nitempresa;
    var nitNombre   = data.nitnombre;
    var usuario     = data.us_usuario;
    var nombre      = data.us_nombre;
    var tipo        = data.us_tipo;
    var tipoNombre  = data.tiponombre;
    var direccion   = data.us_direccion	;
    var ciudad      = data.us_ciudad;
    var pais        = data.us_pais;
    var telefono    = data.us_telefono;
    var correo      = data.us_correo;
    var estado      = data.us_estado;
   
    $('#exampleModalLabel').html('<i class="mdi mdi-table-edit btn-icon-prepend"></i> Editar Usuario');
    $('[name="usuariosOpcion"]').val(2);
    $('[name="usuariosId"]').val(id);
    $('[name="usuariosNit"]').append($('<option>', {
        val: nit,
        text:nitNombre,
        selected: true
    }));
    $('[name="usuariosUser"]').val(usuario);     
    $('[name="usuariosNombre"]').val(nombre);
    $('[name="usuariosTipo"]').append($('<option>', {
        val: tipo,
        text:tipoNombre,
        selected: true
    }));
    $('[name="usuariosDireccion"]').val(direccion);     
    $('[name="usuariosCiudad"]').val(ciudad);  
    $('[name="usuariosPais"]').val(pais);  
    $('[name="usuariosTelefono"]').val(telefono);
    $('[name="usuariosCorreo"]').val(correo);
    $('[name="usuariosEstado"]').val(estado);

    if(estado == 1){
        $('#btnBloquearUsuarios').text('Bloquear');
    }else if(estado == 2){
        $('#btnBloquearUsuarios').text('Desbloquear');
    }

    $("#btnBloquearUsuarios").removeClass("invisible");
  

   
    $('#exampleModal').appendTo("body").modal('show');

   
});

$('#btnBloquearUsuarios').on('click',function(){
    
    var opcion      =   3;
    var id          =   $('[name="usuariosId"]').val();
    var nombre      =   $('[name="usuariosUser"]').val();
    var estado      =   $('[name="usuariosEstado"]').val();

    var titulo      =  $('#btnBloquearUsuarios').text();
    var titulo2     =  '';

    if(titulo == 'Bloquear'){
        titulo2 = 'Bloqueado';
    }else{
        titulo2 = 'Desbloqueado';
    }

    var formData = new FormData();
    formData.append('opcion',opcion);
    formData.append('id',id);
    formData.append('estado',estado);
    
    Notiflix.Confirm.Show( 
            'Eliminar', 
            'Deseas '+titulo+' el usuario '+nombre+'?', 
            'Yes', 'No', 
            function(){ // Yes button callback 
                $.ajax({
                    type : "POST",
                    url  :  urlSite+'/ControladorUsuarios/guardar',
                    dataType : "JSON",
                    data : formData,
                    contentType: false,
                    processData: false,
                    success: function(data){
            
                        Notiflix.Report.Success( 
                            `Mensaje`, 
                            `El usuario fue `+titulo2+` exitosamente. <br><br>- APPs Cake`, 'Click' 
                        ); 
            
                        tablaUsuarios();
                        $("#exampleModal").modal('hide');//ocultamos el modal
                    }
                });
            }, 
            function(){ // No button callback 
                Notiflix.Notify.Failure('La Accion fue cancelada');
            } ); 
    
    
});