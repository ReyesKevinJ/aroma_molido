<nav class="bg-white sticky w-full z-20 top-0 start-0 border-b border-default">
    <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4 xl:px-16">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <svg class="h-10 w-10" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                <g>
                    <path style="fill:#CEA67B;" d="M392.835,512h-273.62c-9.754,0-17.655-7.901-17.655-17.655v-52.966
                    c-57.98-135.583-59.825-245.822,0-370.759V17.655C101.56,7.901,109.46,0,119.215,0h273.62c9.754,0,17.655,7.901,17.655,17.655
                    v52.966c59.833,130.216,57.838,240.675,0,370.759v52.966C410.49,504.099,402.589,512,392.835,512" />
                    <g>
                        <path style="fill:#986632;" d="M410.49,70.621H101.56V17.655C101.56,7.901,109.46,0,119.215,0h273.62
                c9.754,0,17.655,7.901,17.655,17.655V70.621z" />
                        <path style="fill:#986632;" d="M392.835,512h-273.62c-9.754,0-17.655-7.901-17.655-17.655v-52.966h308.93v52.966
                C410.49,504.099,402.589,512,392.835,512" />
                        <path style="fill:#986632;" d="M101.539,70.657c-59.798,124.902-57.953,235.123,0,370.67
                C159.351,311.279,161.346,200.837,101.539,70.657" />
                        <path style="fill:#986632;" d="M410.482,70.621c-59.798,124.902-57.953,235.123,0,370.67
                C468.294,311.243,470.289,200.801,410.482,70.621" />
                    </g>
                    <path style="fill:#291209;" d="M204.878,326.621h-15.086v-15.086c0-64.795,52.533-117.327,117.327-117.327h15.086v15.086
                C322.205,274.088,269.672,326.621,204.878,326.621" />
                    <path style="fill:#A87153;" d="M322.206,194.207h-9.331c-10.558,30.694-24.876,50.82-63.753,62.146
                c-35.866,10.443-49.329,22.987-58.739,43.467c-0.38,3.858-0.591,7.759-0.591,11.714v15.086h9.304
                c10.443-31.267,16.622-42.161,54.952-53.319c36.838-10.717,55.57-29.396,67.663-54.148c0.265-3.257,0.494-6.532,0.494-9.86V194.207
                z" />
                </g>
            </svg>
            <span class="crimson-pro italic self-center text-xl text-heading font-extrabold whitespace-nowrap">AROMA
                MOLIDO</span>
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-default rounded-base bg-neutral-secondary-soft md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-neutral-primary">
                <li>
                    <a href="{{route('welcome')}}"
                        class="block py-2 px-3 rounded md:p-0 {{ request()->routeIs('welcome') ? 'text-white bg-brand md:bg-transparent md:text-fg-brand' : 'text-heading hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:dark:hover:bg-transparent' }}"
                        {{ request()->routeIs('welcome') ? 'aria-current="page"' : '' }}>
                        Principal
                    </a>
                </li>
                <li>
                    <a href="{{route('products')}}"
                        class="block py-2 px-3 rounded md:p-0 {{ request()->routeIs('products') ? 'text-white bg-brand md:bg-transparent md:text-fg-brand' : 'text-heading hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:dark:hover:bg-transparent' }}"
                        {{ request()->routeIs('products') ? 'aria-current="page"' : '' }}>
                        Catalogo Productos
                    </a>
                </li>
                <li>
                    <a href="{{route('about')}}"
                        class="block py-2 px-3 rounded md:p-0 {{ request()->routeIs('about') ? 'text-white bg-brand md:bg-transparent md:text-fg-brand' : 'text-heading hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:dark:hover:bg-transparent' }}"
                        {{ request()->routeIs('about') ? 'aria-current="page"' : '' }}>
                        Quienes Somos
                    </a>
                </li>
                <li>
                    <button id="dropdownNvbarButton2" data-dropdown-toggle="dropdownNavbar2"
                        class="hidden md:flex items-center py-2 px-3 rounded md:p-0 {{ request()->routeIs(['contact','privacy-policy','terms-and-conditions','comercializacion']) ? 'text-white bg-brand md:bg-transparent md:text-fg-brand' : 'text-heading hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:dark:hover:bg-transparent' }}">
                        Informacion
                        <svg class="w-4 h-4 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar2"
                        class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-full md:w-44">
                        <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownNvbarButton2">
                            <li>
                                <a href="{{route('terms-and-conditions')}}"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Terminos
                                    y Usos</a>
                            </li>
                            <li>
                                <a href="comercializacion"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Comercializacion</a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Contacto</a>
                            </li>

                        </ul>
                    </div>

                    <div id="accordion-arrow" data-accordion="collapse"
                        data-active-classes="bg-neutral-primary text-body" data-inactive-classes="text-body">
                        <h2 id="accordion-arrow-heading-1">
                            <button type="button"
                                class="flex items-center justify-between w-full py-2 px-3 rounded font-medium text-heading md:hidden "
                                data-accordion-target="#accordion-arrow-body-1" aria-expanded="false"
                                aria-controls="accordion-arrow-body-1">
                                <span>Informacion</span>
                                <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m5 15 7-7 7 7" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-arrow-body-1" class="hidden" aria-labelledby="accordion-arrow-heading-1">
                            <ul class="p-2 text-sm text-body ">
                                <li>
                                    <a href="{{route('terms-and-conditions')}}"
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Terminos
                                        y Usos</a>
                                </li>
                                <li>
                                    <a href="comercializacion"
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Comercializacion</a>
                                </li>
                                <li>
                                    <a href="{{route('contact')}}"
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Contacto</a>
                                </li>

                            </ul>
                        </div>
                    </div>

                </li>
                <!-- <li class="md:hidden">
                    <a href="/"
                        class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Carrito</a>
                </li> -->
                <li class="md:hidden">
                    <button id="dropdownNvbarButton1" data-dropdown-toggle="dropdownNavbar1"
                        class="hidden md:flex items-center justify-between w-full py-2 px-3 rounded font-medium text-heading md:w-auto hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0">
                        Usuario
                        <svg class="w-4 h-4 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar1"
                        class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-full md:w-44">
                        <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownNvbarButton1">
                            <li>
                                <a href="{{route('login')}}"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Iniciar
                                    Sesion</a>
                            </li>
                            <li>
                                <a href="{{route('register')}}"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Registrarse</a>
                            </li>
                            <!-- <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Earnings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Sign
                                    out</a>
                            </li> -->
                        </ul>
                    </div>

                    <div id="accordion-arrow-1" data-accordion="collapse"
                        data-active-classes="bg-neutral-primary text-body" data-inactive-classes="text-body">
                        <h2 id="accordion-arrow-1-heading-1">
                            <button type="button"
                                class="flex items-center justify-between w-full py-2 px-3 rounded font-medium text-heading md:hidden"
                                data-accordion-target="#accordion-arrow-1-body-1" aria-expanded="false"
                                aria-controls="accordion-arrow-1-body-1">
                                <span>Usuario</span>
                                <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m5 15 7-7 7 7" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-arrow-1-body-1" class="hidden" aria-labelledby="accordion-arrow-1-heading-1">
                            <ul class="p-2 text-sm text-body ">
                                <li>
                                    <a href="{{route('login')}}"
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Iniciar
                                        Sesion</a>
                                </li>
                                <li>
                                    <a href="{{route('register')}}"
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Registrarse</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class=" gap-4 hidden md:flex">
            <!-- <button id="dropdownNvbarButton" data-dropdown-toggle="dropdownNavbar"
                class="flex items-center justify-between w-full py-2 px-3 rounded font-medium text-heading md:w-auto hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </button>
            <div id="dropdownNavbar"
                class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44">
                <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownNvbarButton">
                    <li>
                        <a href="#"
                            class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Dashboard</a>
                    </li>
                    <li>
                        <a href="#"
                            class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Settings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Earnings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Sign
                            out</a>
                    </li>
                </ul>
            </div> -->
            <a href="{{ route('register') }}"
                class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Registrarse</a>
            <a href="{{route('login')}}"
                class="block py-2 px-3 text-heading rounded hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0 md:dark:hover:bg-transparent">Iniciar
                Sesion</a>
            <button class="" data-modal-target="default-modal-cart" data-modal-toggle="default-modal-cart">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </button>

        </div>
    </div>
</nav>
