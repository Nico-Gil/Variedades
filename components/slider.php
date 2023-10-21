<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'components/boostrap.php'; ?>
</head>
<body>

<style>
.carousel-control-prev-icon,
.carousel-control-next-icon {
  background-color: lightblue; /* Cambia "red" por el color deseado */
}
</style>

<div id="carouselExampleIndicators" class="carousel slide slider_main">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner" style="max-width: 80%; margin-left: auto; margin-right: auto; margin-top:5%">
    <div class="carousel-item active">
      <img src="img/slider_1.avif" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item active">
      <img src="img/slider_1.avif" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item active">
      <img src="img/slider_1.avif" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</body>
</html>