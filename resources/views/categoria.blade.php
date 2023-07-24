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
                <a href="#" class="inline-flex items-center justify-center rounded-md bg-primary py-2 px-5 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-5">
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
                            <th>Acciones</th>
                            <th>Acciones</th>
                            <th>Acciones</th>
                            <th>Acciones</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td class="text-center">
                                <a href="#" class="inline-flex items-center justify-center rounded-md bg-danger py-2 px-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-2 xl:px-2">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="#" class="inline-flex items-center justify-center rounded-md bg-warning py-2 px-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-2 xl:px-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td class="text-center">
                                <a href="#" class="inline-flex items-center justify-center rounded-md bg-danger py-2 px-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-2 xl:px-2">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="#" class="inline-flex items-center justify-center rounded-md bg-warning py-2 px-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-2 xl:px-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    <tr>
                        <td colspan="8">
                            <label for="deleteItems">Para los elementos seleccionados: </label><br>
                            <select name="deleteItems" id="deleteItems">
                                <option value="1">Eliminar</option>
                                <option value="2">Eliminar Definitivamente</option>
                            </select>
                            <button type="button" onclick="deleteAll()" class="inline-flex items-center justify-center rounded-md bg-primary py-2 px-3 text-center font-medium text-white hover:bg-opacity-90 lg:px-3 xl:px-3">
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
                            <th>Acciones</th>
                            <th>Acciones</th>
                            <th>Acciones</th>
                            <th>Acciones</th>
                            <th>Restaurar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>3</td>
                            <td>3</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td class="text-center">
                                <a href="#" class="inline-flex items-center justify-center rounded-md bg-primary py-2 px-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-2 xl:px-2">
                                    <i class="fa-solid fa-rotate-left"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>4</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td>Tecnología</td>
                            <td class="text-center">
                                <a href="#" class="inline-flex items-center justify-center rounded-md bg-primary py-2 px-2 text-center font-medium text-white hover:bg-opacity-90 lg:px-2 xl:px-2">
                                    <i class="fa-solid fa-rotate-left"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    <tr>
                        <td colspan="8">
                            <label for="restoreItems">Para los elementos seleccionados: </label><br>
                            <select name="restoreItems" id="restoreItems">
                                <option value="3">Restaurar Todos</option>
                            </select>
                            <button type="button" onclick="restaurarAll();" class="inline-flex items-center justify-center rounded-md bg-primary py-2 px-3 text-center font-medium text-white hover:bg-opacity-90 lg:px-3 xl:px-3">
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
@endsection