<div id="smooth-content">

    <!-- Breadcrumb Area  -->
    <div class="breadcrumb-area mt-50">
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>                          
                        <li class="breadcrumb-item active" aria-current="page">Product Catalogue</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Hero Area -->
    <div class="hero-area section-padding pt-100 pb-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title">
                        <h1>Our Product <span style="color:#01a0e2;">Catalogue</span></h1>
                        <p class="mt-20">Explore our comprehensive range of industrial solutions and equipment</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 text-end">
                    <div class="brochure-download">
                        <a href="<?php echo base_url();?>assets/documents/SAKA-INDIA-BROCHURE.pdf" class="theme-btn">Download Brochure</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="search-filter-section section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-wrapper">
                        <div class="search-input-group">
                            <i class="las la-search"></i>
                            <input type="text" id="productSearch" class="form-control" placeholder="Search products...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Grid Section -->
    <div class="product-grid-section section-padding pt-50">
        <div class="container">
            <div class="row" id="productGrid">
                <!-- Products will be dynamically inserted here -->
            </div>
        </div>
    </div>

    <!-- Client Section  -->
    <div class="client-area section-padding pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="client-wrap owl-carousel">
                        <div class="single-client">
                            <a href="#"><img src="assets/img/client/1.png" alt=""></a>
                        </div>
                        <div class="single-client">
                            <a href="#"><img src="assets/img/client/2.png" alt=""></a>
                        </div>
                        <div class="single-client">
                            <a href="#"><img src="assets/img/client/3.png" alt=""></a>
                        </div>
                        <div class="single-client">
                            <a href="#"><img src="assets/img/client/4.png" alt=""></a>
                        </div>
                        <div class="single-client">
                            <a href="#"><img src="assets/img/client/5.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Product Catalog Styles */

.search-filter-section {
    background: #f8f9fa;
    padding: 20px 0;
    position: sticky;
    top: 0;
    z-index: 1000;
}

.search-wrapper {
    position: relative;
    margin-bottom: 20px;
}

.search-input-group {
    position: relative;
    max-width: 600px;

    margin: 0 auto;
}

.search-input-group i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #666;
}

.search-input-group input {
    padding-left: 45px;
    height: 65px;
    border-radius: 8px;
    border: 1px solid #ddd;
    width: 100%;
    font-size: 15px;
    transition: all 0.3s ease;
}

.search-input-group input:focus {
    border-color: #01a0e2;
    box-shadow: 0 0 0 2px rgba(1, 160, 226, 0.1);
    outline: none;
}

.product-grid-section {
    min-height: 100vh;
    position: relative;
}

#productGrid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 15px;
    padding: 20px 0;
}

.product-item {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.3s ease;
    aspect-ratio: 1;
    background: #f8f9fa;
}

.product-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.product-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-item:hover img {
    transform: scale(1.03);
}

.product-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 15px;
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    color: white;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-item:hover .product-overlay {
    opacity: 1;
}

.product-title {
    font-size: 1rem;
    margin-bottom: 3px;
    font-weight: 600;
    line-height: 1.3;
}

.product-category {
    font-size: 0.8rem;
    opacity: 0.8;
}

/* Bento Grid Layout */
.product-item:nth-child(3n+1) {
    grid-column: span 1;
    grid-row: span 1;
}

.product-item:nth-child(3n+2) {
    grid-column: span 1;
    grid-row: span 1;
}

.product-item:nth-child(3n+3) {
    grid-column: span 1;
    grid-row: span 1;
}

/* Featured Product Highlight */
.product-item:nth-child(5n+1) {
    grid-column: span 2;
    grid-row: span 1;
}

@media (max-width: 768px) {
    #productGrid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 10px;
    }
    
    .product-item:nth-child(5n+1) {
        grid-column: span 1;
        grid-row: span 1;
    }

    .product-title {
        font-size: 0.9rem;
    }

    .product-category {
        font-size: 0.75rem;
    }
}

/* Loading Animation */
.loading {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,0.8);
}

.loading-spinner {
    width: 50px;
    height: 50px;
    border: 5px solid #f3f3f3;
    border-top: 5px solid #01a0e2;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* No Results Message */
.no-results {
    grid-column: 1 / -1;
    text-align: center;
    padding: 30px;
    color: #666;
    font-size: 1.1rem;
    background: #f8f9fa;
    border-radius: 8px;
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Product data 
    
    const products = [
        // Granulation Category
        {
            id: 1,
            name: "Granulation Calcium Chloride",
            image: "assets/img/products/granulation/CaCl2-Granulation-Plant.JPG",
            category: "granulation",
            tags: ["granulation", "chemical"]
        },
        {
            id: 2,
            name: "Granulation Sodium Benzoate",
            image: "assets/img/products/granulation/Sodium-Benzoate-Granulation-System.JPG",
            category: "granulation",
            tags: ["granulation", "chemical"]
        },
        {
            id: 3,
            name: "Granulation Calcium Nitrate",
            image: "assets/img/products/granulation/calcium-nitrate.jpg",
            category: "granulation",
            tags: ["granulation", "chemical"]
        },
        // Dryers Category
        { 
            id: 4,
            name: "Nozzle Type Spray Dryer",
            image: "assets/img/products/spray-dryers/NOZZLE-TYPE-SPRAY-DRYER.JPG",
            category: "Spray Dryers",
            tags: ["dryer", "industrial"]
        },
        {
            id: 5,
            name: "Atomiser Type Spray Dryer",
            image: "assets/img/products/spray-dryers/Atomiser-Type-Spray-Dryer.JPG",
            category: "Spary Dryers",
            tags: ["dryer", "industrial"]
        },
        {
            id: 6,
            name: "Three Stage Spray Dryer",
            image: "assets/img/products/spray-dryers/Three-Stage-Spray-Dryer.JPG",
            category: "Spray Dryers",
            tags: ["dryer", "industrial"]
        },
        {
            id: 7,
            name: "Atomiser Type Spray Dryer Zero Discharge System",
            image: "assets/img/products/spray-dryers/Atomiser-Type-Spray-Dryer-Zero-Discharge-System.JPG",
            category: "Spray Dryers",
            tags: ["dryer", "industrial"]
        },
        {
            id: 8,
            name: "Atomiser Type Spray Dryer Zero Discharge System",
            image: "assets/img/products/spray-dryers/Atomiser-Type-Spray-Dryer-Zero-Discharge-System.JPG",
            category: "Spray Dryers",
            tags: ["dryer", "industrial"]
        },
        {
            id: 9,
            name: "Atomiser Type Spray Dryer Zero Discharge System",
            image: "assets/img/products/spray-dryers/Atomiser-Type-Spray-Dryer-Zero-Discharge-System.JPG",
            category: "Spray Dryers",
            tags: ["dryer", "industrial"]
        },
        {
            id: 10,
            name: "Atomiser Type Spray Dryer Zero Discharge System",
            image: "assets/img/products/spray-dryers/Atomiser-Type-Spray-Dryer-Zero-Discharge-System.JPG",
            category: "Spray Dryers",
            tags: ["dryer", "industrial"]
        },
      
    ];

    const productGrid = document.getElementById('productGrid');
    const searchInput = document.getElementById('productSearch');
    let searchTimeout;

    // Function to create product card
    function createProductCard(product) {
        const card = document.createElement('div');
        card.className = 'product-item';
        card.setAttribute('data-category', product.category);
        card.setAttribute('data-tags', product.tags.join(','));
        const baseUrl = "<?php echo base_url(); ?>";
        card.innerHTML = `
            <img src="${baseUrl}${product.image}" alt="${product.name}">
            <div class="product-overlay">
                <h3 class="product-title text-white">${product.name}</h3>
                <span class="product-category">${product.category.replace('-', ' ').toUpperCase()}</span>
            </div>
        `;
        
        return card;
    }

    // Function to filter products based on search term
    function filterProducts(searchTerm) {
    
        const filteredProducts = products.filter(product => {
            const productName = product.name.toLowerCase();
            const productCategory = product.category.toLowerCase();
            const productTags = product.tags.join(' ').toLowerCase();
            
            return productName.includes(searchTerm) || 
                   productCategory.includes(searchTerm) || 
                   productTags.includes(searchTerm);
        });

        updateProductGrid(filteredProducts);
    }

    // Function to update product grid
    function updateProductGrid(products) {
        productGrid.innerHTML = '';
        
        if (products.length === 0) {
            const noResults = document.createElement('div');
            noResults.className = 'no-results';
            noResults.textContent = 'No products found matching your search';
            productGrid.appendChild(noResults);
            return;
        }

        products.forEach(product => {
            productGrid.appendChild(createProductCard(product));
        });
    }

    // Initialize grid with all products
    updateProductGrid(products);

    // Add event listener for search input
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const searchTerm = this.value.toLowerCase().trim();
        
        searchTimeout = setTimeout(() => {
            filterProducts(searchTerm);
        }, 300); // Debounce search for better performance
    });
});
</script>
                
