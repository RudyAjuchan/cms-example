var table, table2;
window.onload = function () {
    $("#loaders").fadeOut();
}
$(document).ready(function () {
    table = $('#table_data').DataTable({
        responsive: true,
        "language": {
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente"
            },
            "lengthMenu": "Mostrar _MENU_ entradas",
            "zeroRecords": "No hay ningun registro",
            "info": "Mostrando _PAGE_ de _PAGES_",
            "infoEmpty": "No hay ningun registro",
            "search": "Buscar"
        },
        'columnDefs': [
            {
                'targets': 1,
                'checkboxes': {
                    'selectRow': true
                }
            }
        ],
    });

    table2 = $('#table_data2').DataTable({
        responsive: true,
        "language": {
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente"
            },
            "lengthMenu": "Mostrar _MENU_ entradas",
            "zeroRecords": "No hay ningun registro",
            "info": "Mostrando _PAGE_ de _PAGES_",
            "infoEmpty": "No hay ningun registro",
            "search": "Buscar"
        },
        'columnDefs': [
            {
                'targets': 1,
                'checkboxes': {
                    'selectRow': true
                }
            }
        ],
    });

    /*     $("#selectAll").on( "click", function(e) {
            if ($(this).is( ":checked" )) {
                table.rows().select();        
            } else {
                table.rows().deselect(); 
            }
        });
    
        $("#selectAll2").on( "click", function(e) {
            if ($(this).is( ":checked" )) {
                table2.rows().select();        
            } else {
                table2.rows().deselect(); 
            }
        }); */

    $(".papelera").hide();
});

function mostrarPapelera() {
    $("#loaders").show();
    if ($("#toggle3").is(":checked")) {
        $(".papelera").show();
        $(".no-papelera").hide();
        $("#btn-new").hide();
    } else {
        $(".papelera").hide();
        $(".no-papelera").show();
        $("#btn-new").show();
    }
    $("#loaders").fadeOut();
}

function deleteAll() {
    var data = table.column(1).checkboxes.selected();
    let idsDelete = [];
    $.each(data, function(key, id){
        idsDelete.push(id);
    });
    console.log(idsDelete);
}

function restaurarAll() {
    var data = table2.column(1).checkboxes.selected();
    let idsRestore = [];
    $.each(data, function(key, id){
        idsRestore.push(id);
    });
    console.log(idsRestore);
}