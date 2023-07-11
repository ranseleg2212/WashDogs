<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Wash Dogs') }}</title> --}}
    <title>Wash Dogs</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- Icons -->
    <script src="https://kit.fontawesome.com/2a3b3d5bf4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    <link rel="icon" type="image/x-icon" href="{{ asset('logop.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles
</head>

<body class="fondo-body">
    <div id="app">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">

            <div class="barra flex flex-wrap justify-between items-center px-4 py-2.5">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{ asset('logo_prin.ico') }}" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Wash Dogs</span>
                </a>
                <div class="flex items-center">
                    <a href="tel:8297993862"
                        class="mr-6 text-sm font-medium text-gray-500 dark:text-white hover:text-gray-300 hover:font-bold"></a>

                    @if (!Auth::check())
                    <a href="{{ route('login') }}"
                        class="text-sm text-neutral-900  hover:font-extrabold font-bold">Login</a>
                    @endif
                    @if (Auth::check() && Auth::user()->admin == 1)
                    <a href="{{ url('/administrador') }}"
                        class="text-sm text-neutral-900 hover:font-extrabold font-bold">Administrador</a>
                    @endif


                </div>
            </div>
        </nav>
        <nav class="sub-barra">
            <div class="max-w-screen-xl px-4 py-3 mx-auto md:px-6">
                <div class="flex items-center">
                    <ul class="flex flex-row mt-0 mr-6 space-x-5 text-sm font-medium">
                        @if (Auth::check())
                        <li>
                            <a href="{{ route('control_pedido_cliente') }}"
                                class="dark:text-white hover:text-gray-300 focus:text-neutral-50">
                                Compras</a>
                        </li>
                        @else
                        @endif


                        @if (Auth::check())
                        <li>
                            <a href="#" class="text-gray-900 dark:text-white hover:text-gray-300">
                                <livewire:cart />
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown"
                                class="nav-link dropdown-toggle dark:text-white hover:text-gray-300 focus:text-neutral-50"
                                href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                Mascotas
                            </a>


                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-gray-600" href="{{ route('mascotas.create') }}">
                                    Registrar
                                </a>

                                <a class="dropdown-item text-gray-600" href="{{ route('mascotas.index') }}">
                                    Consultar
                                </a>
                            </div>
                        </li>
                        @else
                        @endif

                        @if (!Auth::check())
                        <li>
                            <a href="{{ route('register') }}"
                                class="text-gray-900 dark:text-white hover:text-gray-300">Registrarme</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown"
                                class="nav-link dropdown-toggle dark:text-white hover:text-gray-300 focus:text-neutral-50"
                                href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>


                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-gray-600" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endif
                        @yield('enlace')
                    </ul>
                </div>
            </div>
        </nav>
        </header>

        {{-- ! --}}
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">

                <div class="carousel-item active relative overflow-hidden bg-no-repeat bg-cover">
                    <img src="{{ asset('perro1.jpg') }}" class="img-fluid h-6 mr-3 sm:h-9">
                    <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
                        style="background-color: rgba(0, 0, 0, 0.5)">
                        <div class="flex justify-center items-center h-full">
                            <div class="text-center text-white px-6 md:px-12">
                                <h1 class="text-5xl font-bold mt-0 mb-6"></h1>
                                <h3 class="text-3xl font-bold mb-8">Especialistas en brindar el mejor servicio</h3>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item active relative overflow-hidden bg-no-repeat bg-cover">
                    <img src="{{ asset('perro2.jpg') }}" class="img-fluid h-6 mr-3 sm:h-9">
                </div>
                <div class="carousel-item active relative overflow-hidden bg-no-repeat bg-cover">
                    <img src="{{ asset('banner.png') }}" class="img-fluid h-6 mr-3 sm:h-9">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        {{-- ! --}}


        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @livewireScripts
    @stack('scripts')
</body>
<footer class="footer p-4 shadow md:px-6 md:py-8 dark:bg-gray-900">
    <div class="sm:flex sm:items-center sm:justify-between">
        <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0">
            <img src="{{ asset('logo_prin.ico') }}" class="h-8 mr-3" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Wash Dogs</span>
        </a>
        <ul class="flex flex-wrap items-center mb-6 text-sm text-white sm:mb-0 space-x-8">
            <li>
                <a href="https://www.instagram.com/marleny_home1/"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor"
                        class="bi bi-instagram hover:text-orange-600 hover:font-extrabold" viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg></a>
            </li>
            <li>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-facebook hover:text-orange-600 hover:font-extrabold" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg></a>
            </li>
            <li>
                <a href="mailto:marlenyshome1@gmail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" class="bi bi-envelope hover:text-orange-600 hover:font-extrabold"
                        viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                    </svg></a>
            </li>
        </ul>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400 ">© 2023 <a href="https://flowbite.com/"
            class="hover:underline hover:text-orange-600">Wash Dogs™</a>.
        {{ __('All rights reserved.') }}

    </span>
</footer>

</html>
