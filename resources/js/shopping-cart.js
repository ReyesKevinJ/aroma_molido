let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

function guardarCarrito() {

    localStorage.setItem(
        'carrito',
        JSON.stringify(carrito)
    );
}

window.agregarAlCarrito = function(id, nombre, precio, imagen) {

    id = Number(id);

    const productoExistente = carrito.find(
        p => Number(p.id) === id
    );

    if (productoExistente) {

        productoExistente.cantidad++;

    } else {

        carrito.push({
            id: id,
            nombre: nombre,
            precio: precio,
            imagen: imagen,
            cantidad: 1
        });
    }

    guardarCarrito();

    renderizarCarrito();
}

window.aumentarCantidad = function(id) {

    id = Number(id);

    const producto = carrito.find(
        p => Number(p.id) === id
    );

    if (producto) {

        producto.cantidad++;

        guardarCarrito();

        renderizarCarrito();
    }
}

window.disminuirCantidad = function(id) {

    id = Number(id);

    const producto = carrito.find(
        p => Number(p.id) === id
    );

    if (producto) {

        producto.cantidad--;

        if (producto.cantidad <= 0) {

            carrito = carrito.filter(
                p => Number(p.id) !== id
            );
        }

        guardarCarrito();

        renderizarCarrito();
    }
}

function renderizarCarrito() {

    const contenedor = document.getElementById(
        'contenedor-carrito'
    );

    if (!contenedor) return;

    contenedor.innerHTML = '';

    let total = 0;

    carrito.forEach(producto => {

        const subtotal = producto.precio * producto.cantidad;
        total += subtotal;

        contenedor.innerHTML += `

            <div class="border rounded-xl p-3 flex gap-3 items-center">

                <img
                    src="${producto.imagen}"
                    class="w-20 h-20 object-cover rounded-lg"
                >

                <div class="flex-1">
                    <div class="flex items-center justify-between">
                        <h3 class="font-bold text-lg">
                            ${producto.nombre}
                        </h3>
                        <p class="font-semibold">
                            Subtotal: $${subtotal.toFixed(2)}
                        </p>

                    </div>


                    <div class="mt-2 flex items-center justify-between">
                        <p class="text-sm text-gray-600">
                            Unitario: $${producto.precio}
                        </p>
                        <div class="flex items-center gap-3 mt-3">

                            <button
                                onclick="disminuirCantidad(${producto.id})"
                                class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded-lg"
                            >
                                -
                            </button>

                            <span class="font-bold text-lg">
                                ${producto.cantidad}
                            </span>

                            <button
                                onclick="aumentarCantidad(${producto.id})"
                                class="bg-brand-soft hover:opacity-80 px-3 py-1 rounded-lg"
                            >
                                +
                            </button>
                        </div>


                    </div>

                </div>

            </div>
        `;
    });

    const totalCarrito = document.getElementById('total-carrito');

    if (totalCarrito) {

        totalCarrito.innerHTML = `
            Total a pagar:
            $${total.toFixed(2)}
        `;
    }
}

document.addEventListener(
    'DOMContentLoaded',
    renderizarCarrito
);
