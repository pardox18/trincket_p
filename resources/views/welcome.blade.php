<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Trincket Place</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Utilizando la tipografía Inter */
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Animación para los resultados de búsqueda */
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Colores personalizados */
        .header {
            background-color: #0073e6; /* Azul claro */
        }

        .footer {
            background-color: #333;
        }

        .footer a {
            color: #fff;
        }

        .search-btn {
            background-color: #0073e6;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .search-btn:hover {
            background-color: #005bb5;
        }

        /* Estilo para el contenedor del carrusel */
        .carousel-container {
            position: relative;
            width: 80%;
            margin: 0 auto;
            overflow: hidden;
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item {
            min-width: 100%;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .carousel-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 2rem;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;
        }

        .carousel-button.left {
            left: 10px;
        }

        .carousel-button.right {
            right: 10px;
        }

        /* Estilo para los botones de iniciar sesión y registrarse */
        .auth-buttons {
            position: absolute;
            top: 20%; /* Ajusta la posición encima del carrusel */
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 20px;
            z-index: 20;
        }

        .auth-buttons a {
            background-color: #0073e6;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-align: center;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .auth-buttons a:hover {
            background-color: #005bb5;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="header p-4 shadow-md fixed w-full z-10 top-0 left-0">
        <div class="flex justify-between items-center">
            <div class="text-3xl font-bold text-white">
                Trincket Place
            </div>
            <nav>
                <a href="#" class="text-white text-lg px-4 py-2 hover:bg-blue-100 rounded">Inicio</a>
                <a href="#" class="text-white text-lg px-4 py-2 hover:bg-blue-100 rounded">Categorías</a>
                <a href="#" class="text-white text-lg px-4 py-2 hover:bg-blue-100 rounded">Ofertas</a>
                <a href="#" class="text-white text-lg px-4 py-2 hover:bg-blue-100 rounded">Mi Cuenta</a>
            </nav>
        </div>
    </header>

    <!-- Lupa de búsqueda en la esquina superior derecha -->
    <div class="absolute top-6 right-6">
        <button onclick="searchProducts()" class="text-white text-2xl">
            🔍
        </button>
    </div>

    <!-- Barra de búsqueda y filtros -->
    <div class="flex justify-center items-center bg-blue-500 py-12 mt-16">
        <div class="w-full max-w-3xl flex items-center space-x-4 bg-white p-4 rounded-lg shadow-md">
            <input type="text" id="searchInput" placeholder="Buscar productos..." class="w-full p-4 rounded-l-lg border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button onclick="searchProducts()" class="search-btn transition duration-300">
                🔍 Buscar
            </button>
        </div>
    </div>

    <!-- Filtro de categorías -->
    <div class="flex justify-center items-center mt-6 space-x-4">
        <select id="categoryFilter" class="p-3 rounded-lg border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Todas las categorías</option>
            <option value="tecnología">Tecnología</option>
            <option value="hogar">Hogar</option>
            <option value="ropa">Ropa</option>
            <option value="deportes">Deportes</option>
        </select>
    </div>

    <!-- Carrusel de productos -->
    <div class="carousel-container mt-16">
        <div class="carousel-inner" id="carouselInner">
            <!-- Imágenes de los productos -->
            <div class="carousel-item">
                <img src="https://via.placeholder.com/600x400?text=Celular" alt="Celular">
            </div>
            <div class="carousel-item">
                <img src="https://via.placeholder.com/600x400?text=Laptop" alt="Laptop">
            </div>
            <div class="carousel-item">
                <img src="https://via.placeholder.com/600x400?text=Auriculares" alt="Auriculares">
            </div>
            <div class="carousel-item">
                <img src="https://via.placeholder.com/600x400?text=Cámara" alt="Cámara">
            </div>
        </div>
        <!-- Botones de navegación -->
        <button class="carousel-button left" onclick="prevSlide()">❮</button>
        <button class="carousel-button right" onclick="nextSlide()">❯</button>
    </div>

    <!-- Botones de Iniciar sesión y Registrarse encima del carrusel -->
    <div class="auth-buttons">
        <a href="#">Iniciar sesión</a>
        <a href="#">Registrarse</a>
    </div>

    <!-- Resultados de búsqueda -->
    <div class="mt-8 px-4">
        <ul id="searchResults" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 hidden">
            <!-- Los resultados de productos se mostrarán aquí -->
        </ul>
    </div>

    <!-- Footer -->
    <footer class="footer text-white py-6 mt-8">
        <div class="text-center">
            <p>&copy; 2025 Trincket Place - Todos los derechos reservados.</p>
            <div class="mt-4">
                <a href="#" class="hover:underline">Facebook</a>
                <a href="#" class="ml-4 hover:underline">Instagram</a>
                <a href="#" class="ml-4 hover:underline">Twitter</a>
            </div>
        </div>
    </footer>

    <!-- Script para el carrusel -->
    <script>
        let currentSlide = 0;

        function showSlide(index) {
            const slides = document.querySelectorAll('.carousel-item');
            const carouselInner = document.getElementById('carouselInner');
            const totalSlides = slides.length;

            if (index >= totalSlides) {
                currentSlide = 0;
            } else if (index < 0) {
                currentSlide = totalSlides - 1;
            } else {
                currentSlide = index;
            }

            carouselInner.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        // Mostrar el primer slide por defecto
        showSlide(currentSlide);

        // Función para búsqueda (aún no implementada completamente)
        function searchProducts() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let category = document.getElementById("categoryFilter").value;
            let resultsContainer = document.getElementById("searchResults");

            resultsContainer.innerHTML = "";
            if (input === "") {
                resultsContainer.classList.add("hidden");
                return;
            }

            // Agregar productos de prueba como ejemplo
            const productos = [
                { nombre: "Celular", precio: "$500", imagen: "https://via.placeholder.com/200" },
                { nombre: "Laptop", precio: "$900", imagen: "https://via.placeholder.com/200" },
                { nombre: "Auriculares", precio: "$100", imagen: "https://via.placeholder.com/200" },
                { nombre: "Cámara", precio: "$400", imagen: "https://via.placeholder.com/200" }
            ];

            productos.forEach(producto => {
                let li = document.createElement("li");
                li.classList.add("bg-white", "rounded-lg", "shadow-md", "p-4", "hover:scale-105", "transition-transform", "duration-300", "animate-fade-in");

                li.innerHTML = `
                    <img src="${producto.imagen}" alt="${producto.nombre}" class="w-full h-40 object-cover rounded-md">
                    <div class="mt-4">
                        <h2 class="font-bold text-lg text-gray-800">${producto.nombre}</h2>
                        <p class="text-sm text-gray-600">${producto.precio}</p>
                    </div>
                `;

                resultsContainer.appendChild(li);
            });

            resultsContainer.classList.remove("hidden");
        }
    </script>

</body>
</html>
