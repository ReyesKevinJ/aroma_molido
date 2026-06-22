let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

function actualizarContador() {
    let cartCount = carrito.length;
    let contadorElement = document.getElementById('cart-count');
    let contadorElement1 = document.getElementById('cart-count-1');
    if (contadorElement || contadorElement1) {
        if(contadorElement) contadorElement.innerText = cartCount;
        if(contadorElement1) contadorElement1.innerText = cartCount;
    }
}

function guardarCarrito() {
    localStorage.setItem('carrito', JSON.stringify(carrito));
    actualizarContador();
}

window.vaciarCarritoCompletamente = function() {
    carrito = [];
    localStorage.removeItem('carrito');
    localStorage.removeItem('checkout');
    actualizarContador();
    renderizarCarrito();
}

// NUEVO: Funciones para manejar el input del Modal
window.aumentarInput = function(id, maxStock) {
    let input = document.getElementById(`qty-${id}`);
    if (input && Number(input.value) < Number(maxStock)) {
        input.value = Number(input.value) + 1;
    }
}

window.disminuirInput = function(id) {
    let input = document.getElementById(`qty-${id}`);
    if (input && Number(input.value) > 1) {
        input.value = Number(input.value) - 1;
    }
}

// ACTUALIZADO: Manejo de stock, precio y cantidad múltiple
window.agregarAlCarrito = function(id, nombre, precio, imagen, stock, cantidadDeseada = 1) {
    id = Number(id);
    precio = Number(precio);
    stock = Number(stock);
    cantidadDeseada = Number(cantidadDeseada);

    const productoExistente = carrito.find(p => Number(p.id) === id);

    if (productoExistente) {
        let mensajeAlerta = "";

        // 1. DETECTAR CAMBIOS EN LA BASE DE DATOS
        if (productoExistente.precio !== precio) {
            mensajeAlerta += `- El precio se ha actualizado a $${precio}.\n`;
            productoExistente.precio = precio;
        }
        if (productoExistente.stock !== stock) {
            productoExistente.stock = stock;
        }

        // 2. VALIDAR CANTIDAD + STOCK
        if (productoExistente.cantidad + cantidadDeseada > stock) {
            mensajeAlerta += `- Solo hay ${stock} unidades disponibles en total.\n`;
            productoExistente.cantidad = stock; // Lo topamos al máximo permitido
            alert(`¡Atención con "${nombre}"!\n${mensajeAlerta}Se ajustó tu carrito al máximo posible.`);
        } else {
            productoExistente.cantidad += cantidadDeseada;
            if (mensajeAlerta) {
                alert(`Actualización en "${nombre}":\n${mensajeAlerta}`);
            } else {
                // Mensaje opcional de éxito
                console.log('Agregado con éxito');
            }
        }
    } else {
        // Es un producto nuevo en el carrito
        if (cantidadDeseada > stock) {
            cantidadDeseada = stock;
            alert(`Solo hay ${stock} unidades disponibles. Se ajustó la cantidad automáticamente.`);
        }

        carrito.push({
            id: id,
            nombre: nombre,
            precio: precio,
            imagen: imagen,
            stock: stock, // Guardamos el stock en caché para la vista del carrito
            cantidad: cantidadDeseada
        });
    }

    guardarCarrito();
    renderizarCarrito();
}

window.aumentarCantidad = function(id) {
    id = Number(id);
    const producto = carrito.find(p => Number(p.id) === id);

    if (producto) {
        // VALIDACIÓN: Evitar que el usuario sume más del stock con el botón "+" del carrito
        if (producto.cantidad < producto.stock) {
            producto.cantidad++;
            guardarCarrito();
            renderizarCarrito();
        } else {
            alert(`No puedes agregar más. El stock máximo disponible es de ${producto.stock} unidades.`);
        }
    }
}

window.disminuirCantidad = function(id) {
    id = Number(id);
    const producto = carrito.find(p => Number(p.id) === id);

    if (producto) {
        producto.cantidad--;
        if (producto.cantidad <= 0) {
            carrito = carrito.filter(p => Number(p.id) !== id);
        }
        guardarCarrito();
        renderizarCarrito();
    }
}

function renderizarCarrito() {
    const contenedor = document.getElementById('contenedor-carrito');
    if (!contenedor) return;

    contenedor.innerHTML = '';
    let total = 0;

    carrito.forEach(producto => {
        const subtotal = producto.precio * producto.cantidad;
        total += subtotal;

        contenedor.innerHTML += `
            <div class="border rounded-xl p-3 flex gap-3 items-center">
                <img src="${producto.imagen}" class="w-20 h-20 object-cover rounded-lg">
                <div class="flex-1">
                    <div class="flex items-center justify-between">
                        <h3 class="font-bold text-lg">${producto.nombre}</h3>
                        <p class="font-semibold">Subtotal: $${subtotal.toFixed(2)}</p>
                    </div>
                    <div class="mt-2 flex items-center justify-between">
                        <p class="text-sm text-gray-600">Unitario: $${producto.precio}</p>
                        <div class="flex items-center gap-3 mt-3">
                            <button onclick="disminuirCantidad(${producto.id})" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded-lg">-</button>
                            <span class="font-bold text-lg">${producto.cantidad}</span>
                            <button onclick="aumentarCantidad(${producto.id})" class="bg-brand-soft hover:opacity-80 px-3 py-1 rounded-lg">+</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });

    const totalCarrito = document.getElementById('total-carrito');
    if (totalCarrito) {
        totalCarrito.innerHTML = `Total a pagar: $${total.toFixed(2)}`;
    }
}

window.irAPagar = function (){
    if (carrito.length === 0) {
        alert("El carrito está vacío");
        return;
    }

    localStorage.setItem('checkout', JSON.stringify(carrito));


        window.location.href = '/metodo-pagos';

}
async function sincronizarCarritoConBD() {
    // Si no hay nada en el carrito, no hacemos peticiones a la base de datos
    if (carrito.length === 0) return;

    // Obtenemos solo los IDs de los productos en el carrito
    const ids = carrito.map(p => Number(p.id));
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    if (!csrfToken) {
        console.error("Falta el token CSRF en el head del HTML");
        return;
    }

    try {
        // Hacemos la consulta en segundo plano a Laravel
        const response = await fetch('/carrito/sincronizar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ ids: ids })
        });

        if (!response.ok) return;

        const productosDB = await response.json();
        let carritoActualizado = false;
        let mensajesCambios = [];

        // Filtramos el carrito actual comparándolo con la base de datos
        carrito = carrito.filter(itemLocal => {
            const datoReal = productosDB[itemLocal.id];

            // CASO 1: El administrador eliminó el producto de la tienda
            if (!datoReal) {
                mensajesCambios.push(`"${itemLocal.nombre}" ya no está disponible en la tienda.`);
                carritoActualizado = true;
                return false; // Lo sacamos del carrito
            }

            // CASO 2: El precio cambió
            if (Number(itemLocal.precio) !== Number(datoReal.price)) {
                itemLocal.precio = Number(datoReal.price);
                carritoActualizado = true;
                // Opcional: Puedes avisar del cambio de precio descomentando la línea de abajo
                // mensajesCambios.push(`El precio de "${itemLocal.nombre}" se actualizó a $${datoReal.price}.`);
            }

            // Actualizamos el stock local en caché por si acaso
            itemLocal.stock = Number(datoReal.stock);

            // CASO 3: El cliente tiene más unidades en el carrito de las que quedan en stock
            if (itemLocal.cantidad > datoReal.stock) {
                if (datoReal.stock === 0) {
                    mensajesCambios.push(`"${itemLocal.nombre}" se ha agotado por completo.`);
                    carritoActualizado = true;
                    return false; // Lo sacamos del carrito
                } else {
                    itemLocal.cantidad = datoReal.stock;
                    mensajesCambios.push(`Tu cantidad de "${itemLocal.nombre}" se ajustó a ${datoReal.stock} porque es nuestro último stock.`);
                    carritoActualizado = true;
                }
            }

            return true; // Conservamos el producto en el carrito
        });

        // Si detectamos discrepancias y las corregimos, repintamos todo
        if (carritoActualizado) {
            localStorage.setItem('carrito', JSON.stringify(carrito)); // Guardamos en silencio
            actualizarContador();
            renderizarCarrito();

            // Le avisamos al cliente por qué su carrito se ve diferente
            if (mensajesCambios.length > 0) {
                alert("Actualizamos tu carrito de compras:\n\n" + mensajesCambios.join("\n"));
            }
        }

    } catch (error) {
        console.error("Error al sincronizar el carrito:", error);
    }
}
document.addEventListener('DOMContentLoaded', () => {
    renderizarCarrito();
    actualizarContador();
    sincronizarCarritoConBD();
});
