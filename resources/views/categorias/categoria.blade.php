@extends('layouts.layout')

@section('contenido')
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
        </div>
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Categorias
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li><a class="font-medium" href="index.html">Dashboard /</a></li>
                    <li><a class="font-medium" href="#">Contenido /</a></li>
                    <li class="font-medium text-primary">Categorias</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <!-- Table Start -->

        <div class="rounded-sm border border-stroke bg-white px-5  pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-14">
            <div class="flex justify-end" id="btn-new">
                <a href="/categorias/create" class="inline-flex items-center justify-center rounded-md bg-primary py-2 px-5 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-5">
                    <i class="fa-solid fa-plus"></i>&nbsp;Nuevo
                </a>
            </div>
            <div x-data="{ switcherToggle: false }" style="width: 160px;">
                <label for="toggle3" class="flex cursor-pointer select-none items-center">
                    Papelera:&nbsp;
                    <div class="relative">
                        <input type="checkbox" id="toggle3" class="sr-only" @change="switcherToggle = !switcherToggle" onchange="mostrarPapelera();" />
                        <div class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"></div>
                        <div :class="switcherToggle && '!right-1 !translate-x-full !bg-primary dark:!bg-white'" class="dot absolute left-1 top-1 flex h-6 w-6 items-center justify-center rounded-full bg-white transition">
                            <span :class="switcherToggle && '!block'" class="hidden">
                                <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z" fill="white" stroke="white" stroke-width="0.4"></path>
                                </svg>
                            </span>
                            <span :class="switcherToggle && 'hidden'">
                                <svg class="h-4 w-4 stroke-current" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </label>
            </div><br>
            <div class="no-papelera">
                <table id="table_data" class="display nowrap" style="width:100%">
                    <thead class="bg-boxdark-2 text-white">
                        <tr>
                            <th>Id</th>
                            <th></th>
                            <th>Categoria</th>
                            <th style="text-align: center;">Publicado</th>
                            <th style="text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $CAT)
                        <tr>
                            <td>{{ $CAT['id'] }}</td>
                            <td>{{ $CAT['id'] }}</td>
                            <td>{{ $CAT['nombre'] }}</td>
                            <td class="text-center">
                                @if($CAT['publicado']==1)
                                    <span class="text-white bg-success px-2 py-1 rounded-lg"><b>Si</b></span>
                                @elseif($CAT['publicado']==0)
                                    <span class="text-white bg-danger px-2 py-1 rounded-lg"><b>No</b></span>
                                @endif
                            </td>
                            <td class="text-center">
                                <form method="POST" action="/categorias/{{$CAT['id']}}" name="formD" id="formD" style="display:none">
                                    @method('DELETE')
                                    @csrf
                                    <button style="heigth:0px" id="buttonSubmit{{ $CAT['id'] }}"></button>
                                </form>
                                <button type="button" 
                                    class="inline-flex items-center justify-center rounded-md bg-danger py-2 px-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-2 xl:px-2"
                                    onclick="eliminar({{$CAT['id']}})"
                                    >
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                <a href="/categorias/{{$CAT['id']}}/edit" class="inline-flex items-center justify-center rounded-md bg-warning py-2 px-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-2 xl:px-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach                        
                    </tbody>
                    <tr>
                        <td colspan="8">
                            <label for="deleteItems">Para los elementos seleccionados: </label><br>
                            <select name="deleteItems" id="deleteItems">
                                <option value="1">Eliminar</option>
                                <option value="2">Eliminar Definitivamente</option>
                            </select>
                            <button type="button" onclick="deletes()" class="inline-flex items-center justify-center rounded-md bg-primary py-2 px-3 text-center font-medium text-white hover:bg-opacity-90 lg:px-3 xl:px-3">
                                Ok
                            </button>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="papelera">
                <table id="table_data2" class="display nowrap" style="width:100%">
                    <thead class="bg-boxdark-2 text-white">
                        <tr>
                            <th>Id</th>
                            <th></th>
                            <th>Categoria</th>
                            <th style="text-align: center;">Restaurar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoriasPapelera as $CATP)
                        <tr>
                            <td>{{ $CATP['id'] }}</td>
                            <td>{{ $CATP['id'] }}</td>
                            <td>{{ $CATP['nombre'] }}</td>
                            <td class="text-center">
                                <form method="POST" action="/categorias/restore/{{$CATP['id']}}" name="formR" id="formR" style="display:none">
                                    @csrf
                                    <button style="heigth:0px" id="buttonSubmitR{{ $CATP['id'] }}"></button>
                                </form>
                                <button type="button" 
                                class="inline-flex items-center justify-center rounded-md bg-primary py-2 px-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-2 xl:px-2"
                                onclick="restore({{$CATP['id']}})"
                                >
                                    <i class="fa-solid fa-rotate-left"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <td colspan="8">
                            <label for="restoreItems">Para los elementos seleccionados: </label><br>
                            <select name="restoreItems" id="restoreItems">
                                <option value="3">Restaurar</option>
                                <option value="4">Eliminar definitivamente</option>
                            </select>
                            <button type="button" onclick="restores();" class="inline-flex items-center justify-center rounded-md bg-primary py-2 px-3 text-center font-medium text-white hover:bg-opacity-90 lg:px-3 xl:px-3">
                                Ok
                            </button>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
        <!-- Table End -->
    </div>
    </div>
</main>

<script>
    function eliminar(id){
        swal({
            title: "¿Está seguro eliminar el dato",
            text: "Esta acción es irreversible",
            icon: "warning",
            buttons: {
                confirm: { text: "Si deseo eliminarlo", className: "sweet-warning" },
                cancel: "Cancelar",
            },
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                document.getElementById("buttonSubmit"+id).click();
            } else {
                swal("No se eliminó el dato");
            }
        });
    }

    function deletes(){
        var select = document.getElementById("deleteItems").value;
        if(select==1){
            deleteAll();
        }else if( select==2){
            deleteAllDefinitive();
        }
    }
    function deleteAll() {
        var data = table.column(1).checkboxes.selected();
        let idsDelete = [];
        $.each(data, function(key, id){
            idsDelete.push(id);
        });
        console.log(idsDelete.length);
        if(idsDelete.length>0){
            swal({
                title: "¿Está seguro eliminar los datos",
                text: "Los datos iran a la palelera",
                icon: "warning",
                buttons: {
                    confirm: { text: "Si deseo eliminarlo", className: "sweet-warning" },
                    cancel: "Cancelar",
                },
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {                
                    var formData = new FormData();
                    formData.append('ids',idsDelete);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "/categorias/delete",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                    }).done(function (response) {
                        console.log(response);
                        swal({
                            icon: "success",
                            title: "Atención",
                            text: "¡Se ha eliminado correctamente!",
                        }).then(function () {
                            window.location.href = "/categorias";
                        });
                    });
                } else {
                    swal("No se eliminó los datos");
                }            
            });
        }else{
            swal({
                icon: "warning",
                title: "Atención",
                text: "¡No hay elementos seleccionados!",
            })
        }
    }
    function deleteAllDefinitive() {
        var data = table.column(1).checkboxes.selected();
        let idsDelete = [];
        $.each(data, function(key, id){
            idsDelete.push(id);
        });
        console.log(idsDelete.length);
        if(idsDelete.length>0){
            swal({
                title: "¿Está seguro eliminar los datos",
                text: "Los datos se borraran definitivamente",
                icon: "warning",
                buttons: {
                    confirm: { text: "Si deseo eliminarlo", className: "sweet-warning" },
                    cancel: "Cancelar",
                },
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {                
                    var formData = new FormData();
                    formData.append('ids',idsDelete);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "/categorias/deleteDefinitive",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                    }).done(function (response) {
                        console.log(response);
                        swal({
                            icon: "success",
                            title: "Atención",
                            text: "¡Se ha eliminado correctamente!",
                        }).then(function () {
                            window.location.href = "/categorias";
                        });
                    });
                } else {
                    swal("No se eliminó los datos");
                }            
            });
        }else{
            swal({
                icon: "warning",
                title: "Atención",
                text: "¡No hay elementos seleccionados!",
            })
        }
    }
    function deleteAllDefinitive2() {
        var data = table2.column(1).checkboxes.selected();
        let idsDelete = [];
        $.each(data, function(key, id){
            idsDelete.push(id);
        });
        console.log(idsDelete.length);
        if(idsDelete.length>0){
            swal({
                title: "¿Está seguro eliminar los datos",
                text: "Los datos se borraran definitivamente",
                icon: "warning",
                buttons: {
                    confirm: { text: "Si deseo eliminarlo", className: "sweet-warning" },
                    cancel: "Cancelar",
                },
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {                
                    var formData = new FormData();
                    formData.append('ids',idsDelete);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "/categorias/deleteDefinitive",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                    }).done(function (response) {
                        console.log(response);
                        swal({
                            icon: "success",
                            title: "Atención",
                            text: "¡Se ha eliminado correctamente!",
                        }).then(function () {
                            window.location.href = "/categorias";
                        });
                    });
                } else {
                    swal("No se eliminó los datos");
                }            
            });
        }else{
            swal({
                icon: "warning",
                title: "Atención",
                text: "¡No hay elementos seleccionados!",
            })
        }
    }

    function restore(id){
        swal({
            title: "¿Está seguro restaurar el dato",
            text: "Esta acción es irreversible",
            icon: "info",
            buttons: {
                confirm: { text: "Si deseo restaurarlo", className: "sweet-primary" },
                cancel: "Cancelar",
            },
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                document.getElementById("buttonSubmitR"+id).click();
            } else {
                swal("No se restauró el dato");
            }
        });
    }

    function restores(){
        var select = document.getElementById("restoreItems").value;
        if(select==3){
            restoreAll();
        }else if( select==4){
            deleteAllDefinitive2();
        }
    }
    function restoreAll() {
        var data = table2.column(1).checkboxes.selected();
        let idsRestore = [];
        $.each(data, function(key, id){
            idsRestore.push(id);
        });
        if(idsRestore.length>0){
            swal({
                title: "¿Está seguro restaurar los datos",
                text: "Los datos regresaran a la bandeja principal",
                icon: "info",
                buttons: {
                    confirm: { text: "Si deseo restaurarlos", className: "sweet-primary" },
                    cancel: "Cancelar",
                },
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {                
                    var formData = new FormData();
                    formData.append('ids',idsRestore);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "/categorias/restores",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                    }).done(function (response) {
                        console.log(response);
                        swal({
                            icon: "success",
                            title: "Atención",
                            text: "¡Se ha eliminado correctamente!",
                        }).then(function () {
                            window.location.href = "/categorias";
                        });
                    });
                } else {
                    swal("No se eliminó los datos");
                }            
            });
        }else{
            swal({
                icon: "warning",
                title: "Atención",
                text: "¡No hay elementos seleccionados!",
            })
        }
    }
</script>

@if(Session::has('delete'))
<script>
    swal({
        icon: "success",
        title: "Atención",
        text: "¡Se ha eliminado correctamente!",
    })
</script>
@endif

@if(Session::has('restore'))
<script>
    swal({
        icon: "success",
        title: "Atención",
        text: "¡Se ha restablecido correctamente!",
    })
</script>
@endif

@if(Session::has('success'))
<script>
    swal({
        icon: "success",
        title: "Atención",
        text: "¡Se ha registrado correctamente!",
    })
</script>
@endif

@if(Session::has('edit'))
<script>
    swal({
        icon: "success",
        title: "Atención",
        text: "¡Se ha actualizado correctamente!",
    })
</script>
@endif
@endsection