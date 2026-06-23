<x-layouts.app>

    @section('title', 'Método de Pago')

    @section('content')
    @if ($errors->any())
    <div id="alert-4"
        class="flex smitems-center flex items-center p-4 mb-4 text-sm text-fg-warning rounded-base bg-warning-soft"
        role="alert">
        <svg class="w-4 h-4 shrink-0 mt-0.5 md:mt-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <span class="sr-only">Atencion!, corrigue lo siguiente:</span>
        <div class="ms-2 text-sm ">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            <a href="{{route('products')}}" class="font-medium underline hover:no-underline">Volver al catalogo</a>.
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 rounded focus:ring-2 focus:ring-warning-medium p-1.5 hover:bg-warning-medium inline-flex items-center justify-center h-8 w-8 shrink-0 shrink-0"
            data-dismiss-target="#alert-4" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18 17.94 6M18 18 6.06 6" />
            </svg>
        </button>
    </div>
    @endif
    <form action="{{route('orders.store')}}" method="POST" class="max-w-4xl mx-auto p-8">
        @csrf
        <div class="mt-8">
            <input type="hidden" name="cart" id="cart-data">

            <h2 class="text-xl font-bold mb-4">
                Datos de Envío
            </h2>

            <input name="address" id="address" type="text" placeholder="Dirección"
                class="w-full border p-2 mb-3 rounded">

            <input name="city" id="city" type="text" placeholder="Ciudad" class="w-full border p-2 mb-3 rounded">

            <input name="postal_code" id="postal_code" type="text" placeholder="Código Postal"
                class="w-full border p-2 mb-3 rounded">

        </div>

        <h1 class="text-3xl font-bold mb-8">
            Método de Pago
        </h1>

        <div class="space-y-4">

            <label class="flex items-center gap-3">

                <input type="radio" name="payment_method" value="efectivo">

                Efectivo
            </label>

            <label class="flex items-center gap-3">

                <input type="radio" name="payment_method" value="tarjeta">

                Tarjeta Débito / Crédito
            </label>

        </div>

        <div id="card-form" class="hidden mt-8 border rounded-xl p-5">

            <input name="number_card" type="text" placeholder="Número de tarjeta" class="w-full border p-2 mb-3">

            <input name="titular" type="text" placeholder="Titular" class="w-full border p-2 mb-3">

            <div class="grid grid-cols-2 gap-3">

                <input name="expiry_date" type="text" placeholder="MM/AA" class="border p-2">

                <input name="cvv" type="text" placeholder="CVV" class="border p-2">

            </div>

        </div>

        <button type='submit' class="bg-brand text-white my-5 px-5 py-3 rounded-xl">

            Confirmar Compra

        </button>

    </form>


    <script>
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        let dataInput = document.getElementById('cart-data');
        dataInput.value = JSON.stringify(carrito);
        document.querySelectorAll('input[name="payment"]')
            .forEach(radio => {

                radio.addEventListener('change', () => {

                    const cardForm =
                        document.getElementById('card-form');

                    if (radio.value === 'efectivo') {

                        cardForm.classList.remove('hidden');

                    } else {

                        cardForm.classList.add('hidden');

                    }
                });

            });

        async function confirmarCompra() {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            const address =
                document.getElementById('address').value;

            const city =
                document.getElementById('city').value;

            const postalCode =
                document.getElementById('postal_code').value;

            const metodo =
                document.querySelector(
                    'input[name="payment"]:checked'
                )?.value;

            if (!metodo) {

                alert('Seleccione un método de pago');

                return;
            }

            const response = await fetch('/orders', {
                method: 'POST',

                headers: {
                    'Content-Type': 'application/json',

                    'X-CSRF-TOKEN': document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content
                },

                body: JSON.stringify({
                    cart: carrito,
                    address: address,
                    city: city,
                    postal_code: postalCode,
                    payment_method: metodo
                })
            });

            const data = await response.json();
            console.log(data);

            if (data.success) {

                localStorage.removeItem('carrito');

                alert('Pedido realizado correctamente');

                window.location.href = '/metodo-pagos';
            }
        }
    </script>
    @endsection
</x-layouts.app>