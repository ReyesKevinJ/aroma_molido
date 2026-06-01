<x-layouts.app>

    @section('title', 'Método de Pago')

    @section('content')

    <div class="max-w-4xl mx-auto p-8">
        <div class="mt-8">

            <h2 class="text-xl font-bold mb-4">
                Datos de Envío
            </h2>

            <input
                id="address"
                type="text"
                placeholder="Dirección"
                class="w-full border p-2 mb-3 rounded">

            <input
                id="city"
                type="text"
                placeholder="Ciudad"
                class="w-full border p-2 mb-3 rounded">

            <input
                id="postal_code"
                type="text"
                placeholder="Código Postal"
                class="w-full border p-2 mb-3 rounded">

        </div>

        <h1 class="text-3xl font-bold mb-8">
            Método de Pago
        </h1>

        <div class="space-y-4">

            <label class="flex items-center gap-3">

                <input
                    type="radio"
                    name="payment"
                    value="cash">

                Efectivo
            </label>

            <label class="flex items-center gap-3">

                <input
                    type="radio"
                    name="payment"
                    value="credit_card">

                Tarjeta Débito / Crédito
            </label>

        </div>

        <div
            id="card-form"
            class="hidden mt-8 border rounded-xl p-5">

            <input
                type="text"
                placeholder="Número de tarjeta"
                class="w-full border p-2 mb-3">

            <input
                type="text"
                placeholder="Titular"
                class="w-full border p-2 mb-3">

            <div class="grid grid-cols-2 gap-3">

                <input
                    type="text"
                    placeholder="MM/AA"
                    class="border p-2">

                <input
                    type="text"
                    placeholder="CVV"
                    class="border p-2">

            </div>

        </div>

        <button
            onclick="confirmarCompra()"
            class="bg-brand text-white my-5 px-5 py-3 rounded-xl">

            Confirmar Compra

        </button>

    </div>


    <script>
        document.querySelectorAll('input[name="payment"]')
            .forEach(radio => {

                radio.addEventListener('change', () => {

                    const cardForm =
                        document.getElementById('card-form');

                    if (radio.value === 'credit_card') {

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

            if (data.success) {

                localStorage.removeItem('carrito');

                alert('Pedido realizado correctamente');

                window.location.href = '/metodo-pagos';
            }
        }
    </script>
    @endsection
</x-layouts.app>