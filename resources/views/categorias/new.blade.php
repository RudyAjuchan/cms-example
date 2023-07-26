@extends('layouts.layout')

@section('contenido')
<!-- ===== Main Content Start ===== -->
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
        </div>
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Nueva Categoria
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li><a class="font-medium" href="/dashboard">Dashboard /</a></li>
                    <li><a class="font-medium" href="#">Contenido /</a></li>
                    <li><a class="font-medium" href="/categorias">Categorias /</a></li>
                    <li class="font-medium text-primary">Nuevo</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <!-- ====== Form Elements Section Start -->
        <div class="grid grid-cols-1 gap-9 sm:grid-cols-1">
            <div class="flex flex-col gap-9">
                <form method="POST" action="{{ url('/categorias') }}">
                    @csrf
                    <!-- Input Fields -->
                    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                        <div class="border-b border-stroke py-4 px-6.5 dark:border-strokedark">
                            <h3 class="font-medium text-black dark:text-white">
                                Complete los campos
                            </h3>
                        </div>
                        <div class="flex flex-col gap-5.5 p-6.5" style="padding: 25px 15rem;">
                            <div>
                                <label class="mb-3 block font-medium text-sm text-black dark:text-white">
                                    Nombre
                                </label>
                                <input type="text" name="nombre" placeholder="Nombre Categoria" class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                                @error('nombre')
                                    <b><small style="color: red"> {{$message}} </small></b>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                <div x-data="{ switcherToggle: true }" style="width: 160;">
                                    <label for="toggle4" class="flex cursor-pointer select-none items-center">
                                        Publicado:&nbsp;
                                        <div class="relative">
                                            <input type="checkbox" name="publicado" id="toggle4" class="sr-only" @change="switcherToggle = !switcherToggle" onchange="prueba();" checked/>
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
                            </div>

                            <div>
                                <button type="submit" class="inline-flex items-center justify-center rounded-md bg-primary py-2 px-5 text-center font-medium text-white hover:bg-opacity-90 lg:px-8 xl:px-10">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
</main>
<!-- ===== Main Content End ===== -->
@endsection