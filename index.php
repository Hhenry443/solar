<?php
$products = [
    ['product_id' => 1, 'product_name' => 'Product 1', 'image' => './assets/image/product1.jpg'],
    ['product_id' => 2, 'product_name' => 'Product 2', 'image' => './assets/image/product2.jpg'],
    ['product_id' => 3, 'product_name' => 'Product 3', 'image' => './assets/image/product3.jpg'],
    ['product_id' => 4, 'product_name' => 'Product 4', 'image' => './assets/image/product4.jpg'],
    ['product_id' => 5, 'product_name' => 'Product 5', 'image' => './assets/image/product5.jpg'],
    ['product_id' => 6, 'product_name' => 'Product 6', 'image' => './assets/image/product6.jpg'],
    ['product_id' => 7, 'product_name' => 'Product 7', 'image' => './assets/image/product7.jpg'],
    ['product_id' => 8, 'product_name' => 'Product 8', 'image' => './assets/image/product8.jpg'],
    ['product_id' => 9, 'product_name' => 'Product 9', 'image' => './assets/image/product9.jpg'],
    ['product_id' => 10, 'product_name' => 'Product 10', 'image' => './assets/image/product10.jpg'],
    ['product_id' => 11, 'product_name' => 'Product 11', 'image' => './assets/image/product11.jpg'],
    ['product_id' => 12, 'product_name' => 'Product 12', 'image' => './assets/image/product12.jpg'],
    ['product_id' => 13, 'product_name' => 'Product 13', 'image' => './assets/image/product13.jpg'],

];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Product Carousel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/b664604463.js" crossorigin="anonymous"></script>
</head>
<body class='flex flex-col items-center h-screen bg-[#EFF1ED]'>
    <p class='text-3xl mt-28'>Explore Products</p>

    <div id='productsCarousel' class='w-full mt-8 grid grid-cols-4 justify-items-center'>
        <!-- Products will be inserted here dynamically -->
    </div>

    <div id='navigationButtons' class='w-full h-16 flex'>
        <div class='w-1/2 h-16 flex justify-start'>
            <button id="prevBtn" class='h-full w-24 bg-[#717744] rounded-xl ml-10'>
                <i class="fa-solid fa-arrow-left text-2xl text-[#EFF1ED]"></i>
            </button>
        </div>
        <div class='w-1/2 h-16 flex justify-end'>
            <button id="nextBtn" class='h-full w-24 bg-[#717744] rounded-xl mr-10'>
                <i class="fa-solid fa-arrow-right text-2xl text-[#EFF1ED]"></i>
            </button>
        </div>
    </div>

    <script>
        const products = <?php echo json_encode($products); ?>;
        let startIndex = 0;
        const itemsPerPage = 4;
        const carousel = document.getElementById('productsCarousel');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        function loadProducts() {
            carousel.innerHTML = '';
            const endIndex = Math.min(startIndex + itemsPerPage, products.length);
            for (let i = startIndex; i < endIndex; i++) {
                const product = products[i];
                const productCard = `
                    <a href='/product.php?id=${product.product_id}' class='bg-white shadow-lg rounded-2xl p-4 flex flex-col items-center w-64'>
                        <img src='${product.image}' alt='${product.product_name}' class='w-full h-48 object-cover rounded-lg'>
                        <p class='text-lg font-semibold text-green-900 mt-3'>${product.product_name}</p>
                    </a>
                `;
                carousel.innerHTML += productCard;
            }
        }

        prevBtn.addEventListener('click', () => {
            startIndex = Math.max(0, startIndex - itemsPerPage);
            loadProducts();
        });

        nextBtn.addEventListener('click', () => {
            if (startIndex + itemsPerPage < products.length) {
                startIndex += itemsPerPage;
                loadProducts();
            }
        });

        loadProducts(); // Initial load
    </script>
</body>
</html>