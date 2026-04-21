<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>

    <head class="my-12">
        @include('components.navbar')
    </head>
    <main>
        @yield('content')
    </main>
    <footer class="bg-neutral-primary-soft">
        @include('components.footer')
    </footer>
</body>
<script>
    // seccion terminos y condiciones
    const items = document.querySelectorAll(".accordion-item");

    items.forEach(item => {
        const button = item.querySelector("button");
        const content = item.querySelector(".accordion-content");
        const icon = button.querySelector("span");

        button.addEventListener("click", () => {
            const isOpen = !content.classList.contains("hidden");

            // cerrar todos
            document.querySelectorAll(".accordion-content").forEach(c => c.classList.add("hidden"));
            document.querySelectorAll(".accordion-item").forEach(i => {
                i.style.backgroundColor = "#F3E5D7";
            });
            document.querySelectorAll(".accordion-item span").forEach(s => s.textContent = "+");

            // abrir actual
            if (!isOpen) {
                content.classList.remove("hidden");
                item.style.backgroundColor = "#E4C7A7"; // tono más fuerte (pero suave)
                icon.textContent = "−";
            }
        });
    });
</script>

</html>