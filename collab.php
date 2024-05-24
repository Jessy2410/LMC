<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrousel de Marques</title>
    <link rel="stylesheet" href="stylecar.css">
</head>
<body>
    <div class="carousel-container">
        <div class="carousel">
            <div class="carousel-slide"><a href="https://www.amd.com/fr"><img src="https://www.flowup.shop/web/image/website_flowup.img_logo-amd" alt="Marque 1"></a></div>
            <div class="carousel-slide"><a href="https://fr.msi.com/"><img src="https://www.flowup.shop/web/image/website_flowup.img_logo-msi" alt="Marque 2"></a></div>
            <div class="carousel-slide"><a href="https://www.nvidia.com/fr-fr/"><img src="https://www.flowup.shop/web/image/website_flowup.img_logo-nvidia" alt="Marque 3"></a></div>
            <div class="carousel-slide"><a href="https://www.asus.com/fr/"><img src="https://www.flowup.shop/web/image/website_flowup.img_logo-asus" alt="Marque 4"></a></div>
        </div>
    </div>
    <script>
        let currentSlide = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.carousel-slide');
    if (index >= slides.length) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = slides.length - 1;
    } else {
        currentSlide = index;
    }
    const carousel = document.querySelector('.carousel');
    carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
}

function moveSlides(step) {
    showSlide(currentSlide + step);
}

setInterval(() => {
    moveSlides(1);
}, 3000);

document.addEventListener('DOMContentLoaded', () => {
    showSlide(currentSlide);
});

    </script>
</body>
</html>
