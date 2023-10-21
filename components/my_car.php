<!DOCTYPE html>
<html lang="en">
<head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    img {
        max-width: 100px;
    }

    #total {
        font-size: 18px;
        margin-top: 20px;
    }
</style>
</head>
<body>
    <h1>Mi Carrito</h1>
    <div id="cart-items"></div>
    <div id="total">Total: $0.00</div> <!-- Elemento para mostrar el total -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Recupera el carrito del localStorage
            var cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Obtén el contenedor donde se mostrarán los elementos del carrito
            var cartItems = document.getElementById('cart-items');
            var totalElement = document.getElementById('total'); // Elemento para mostrar el total

            if (!cart.length) {
                // Si el carrito está vacío, muestra un mensaje
                cartItems.innerHTML = '<p>Tu carrito está vacío.</p>';
            } else {
                // Si hay elementos en el carrito, construye la tabla de productos
                var table = document.createElement('table');
                var thead = document.createElement('thead');
                var tbody = document.createElement('tbody');

                var total = 0; // Inicializa el total en 0

                // Cabecera de la tabla
                var headerRow = thead.insertRow(0);
                headerRow.innerHTML = '<th>Nombre</th><th>Descripción</th><th>Precio</th><th>Imagen</th><th>Acción</th>';
                table.appendChild(thead);

                // Contenido del carrito
                for (var i = 0; i < cart.length; i++) {
                    var product = cart[i];
                    var row = tbody.insertRow(i);
                    row.innerHTML = '<td>' + product.name + '</td><td>' + product.description + '</td><td>$' + product.price + '</td><td><img src="' + product.img + '"></td><td><button onclick="removeFromCart(' + i + ')" class="btn btn-danger">Eliminar</button></td>';

                    total += product.price; // Suma el precio del producto al total
                }

                table.appendChild(tbody);
                cartItems.appendChild(table);

                // Muestra el total calculado
                totalElement.textContent = 'Total: $' + total.toFixed(2); // Formatea el total con 2 decimales
            }
        });

        // Función para eliminar un producto del carrito
        function removeFromCart(index) {
            var cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            // Vuelve a cargar la página para reflejar los cambios
            location.reload();
        }
    </script>
</body>
</html>
