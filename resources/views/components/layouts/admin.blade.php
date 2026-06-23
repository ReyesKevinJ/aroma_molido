<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Panel - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>
    <header>
        <nav class="fixed top-0 z-50 w-full bg-neutral-primary-soft border-b border-default">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start rtl:justify-end">
                        <button data-drawer-target="top-bar-sidebar" data-drawer-toggle="top-bar-sidebar"
                            aria-controls="top-bar-sidebar" type="button"
                            class="sm:hidden text-heading bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-base text-sm p-2 focus:outline-none">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M5 7h14M5 12h14M5 17h10" />
                            </svg>
                        </button>
                        <a href="/" class="flex ms-2 md:me-24">
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
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <aside id="top-bar-sidebar"
            class="fixed top-16 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-neutral-primary-soft border-e border-default">

                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
                            <svg class="w-5 h-5 transition duration-75 group-hover:text-fg-brand" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z" />
                            </svg>
                            <span class="ms-3">Panel</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.inbox.index') }}"
                            class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
                            <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9M9 7h6m-7 3h8" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Mensajes</span>

                            @if($unreadMessagesCount > 0)
                            <span
                                class="inline-flex items-center justify-center w-4.5 h-4.5 ms-2 text-xs font-medium text-fg-danger-strong bg-danger-soft border border-danger-subtle rounded-full">
                                {{ $unreadMessagesCount }}
                            </span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}"
                            class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
                            <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.categories.index')}}"
                            class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
                            <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" width="24" height="24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                            </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap">Categorias</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.products.index')}}"
                            class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
                            <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Productos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.orders.index')}}"
                            class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
                            <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" width="24" height="24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>



                            <span class="flex-1 ms-3 whitespace-nowrap">Pedidos</span>
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
                                <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-fg-brand"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Cerrar Sesión</span>
                            </button>
                        </form>

                    </li>
                </ul>
            </div>
        </aside>


    </header>

    <body>
        <div class="sm:p-4 lg:p-10 sm:ml-64 mt-14">
            @yield('content')
        </div>
    </body>
    <footer>

    </footer>
</body>

</html>