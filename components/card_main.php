<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/boostrap.php'; ?>
</head>
<body>

<?php 
include 'conection.php'; 
?>

<style>
    /* Estilos personalizados para las imágenes de las tarjetas */
    .card {
        margin-top: 20%;
    }

    .card-img {
        width: 100%;
        height: 150px; /* Ajusta la altura según tus necesidades */
        object-fit: cover; /* Mantiene la relación de aspecto y rellena el espacio de la imagen */
    }

    /* Estilo personalizado para el margen izquierdo */
    .left-margin {
        margin-left: 10px; /* Ajusta el margen izquierdo según tus necesidades */
    }

    .vertical-image {
        width: 100%;
    }

    /* Clase personalizada para centrar vertical y horizontalmente las tarjetas */
    .centered-card {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    /* Estilos para los botones en las tarjetas */
    .card-btn {
        position: absolute;
        bottom: 10px; /* Ajusta el espacio entre el borde de la tarjeta y el botón */
        width: calc(100% - 20px); /* Ajusta el ancho del botón descontando el espacio */
        left: 10px; /* Ajusta la posición izquierda para centrar el botón */
    }

    .modal-body.text{
        text-align: center;
    }

    .correct{
        width: 30%;
    }
</style>

<div class="container-left"> <!-- Cambiamos container por container-left -->
    <div class="row">
        <div class="col-md-8 left-margin"> <!-- Añadimos la clase left-margin para el margen izquierdo -->
            <div class="row">
                <?php
                // Tu consulta a la base de datos
                $sql = "SELECT * FROM school_products"; // Reemplaza con tu consulta
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="col-md-3 mb-4"> <!-- Ajustamos el ancho para 4 tarjetas por fila -->
                        <div class="card no-padding-card centered-card" style="width: 18rem;"> <!-- Aplicamos la clase personalizada centered-card -->
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($row["img"]); ?>" class="card-img" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                                <p class="card-text"><?php echo $row["description"]; ?></p>
                                <p class="price-label"><?php echo "$",$row["value"]; ?></p>
                                <!-- Agregamos el botón "Agregar al Carrito" con el atributo data-bs-toggle -->
                                <button type="button" class="btn btn-primary card-btn" data-bs-toggle="modal" data-bs-target="#successModal">
                                    Agregar al Carrito
                                </button>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                } else {
                    echo '<div class="col-12"><p>No se encontraron resultados.</p></div>';
                }
                ?>
            </div>
        </div>
        <div class="col-md-3"> <!-- Columna para la imagen vertical (20%) -->
            <div class="vertical-image-container">
                <img src="img/banner_vertical.png" class="vertical-image" alt="Imagen Vertical">
            </div>
        </div>
    </div>
</div>

<!-- Modal de éxito para mostrar el mensaje de producto agregado -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Producto Agregado al Carrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text">
                El producto se ha agregado correctamente al carrito.
                <img src="img/correcto.png" class="correct">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Función para agregar un producto al carrito
        function addToCart(product) {
            let cart = JSON.parse(localStorage.getItem('cart')) || []; // Obtiene el carrito o crea uno vacío
            cart.push(product); // Agrega el producto al carrito
            localStorage.setItem('cart', JSON.stringify(cart)); // Almacena el carrito actualizado en localStorage

            // Agrega un console.log para verificar si el producto se ha agregado al carrito
            console.log('Producto agregado al carrito:', product);
        }

        // Evento clic para los botones "Agregar al Carrito"
        document.querySelectorAll('.card-btn').forEach(function (button, index) {
            button.addEventListener('click', function () {
                const card = button.closest('.card'); // Encuentra la tarjeta más cercana al botón
                const productInfo = {
                    id: index, // Un identificador único para el producto
                    name: card.querySelector('.card-title').textContent, // Nombre del producto
                    description: card.querySelector('.card-text').textContent, // Descripción del producto
                    price: parseFloat(card.querySelector('.price-label').textContent.replace('$', '')), // Precio del producto
                    img: card.querySelector('.card-img').getAttribute('src'),
                    // Agrega otros datos relevantes del producto aquí
                };

                addToCart(productInfo); // Llama a la función para agregar el producto al carrito
            });
        });
    });
</script>


</body>
</html>