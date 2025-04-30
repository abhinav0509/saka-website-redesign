<div id="smooth-content">

    <!-- Breadcrumb Area  -->
    <div class="breadcrumb-area mt-50">
        <div class="container" style="width:100%;">
            <div class="row" >
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>                          
                        <li class="breadcrumb-item active" aria-current="page">Product Catalogue</li>
                    </ol>
                </nav>
                
            </div>
        </div>
    </div>
   

    <!-- Hero Area -->

    <!-- <div class="hero-area section-padding pt-100 pb-50">
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
    </div> -->



    <!-- Search and Filter Section -->
    <div class="search-filter-section section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-wrapper">
                        <div class="search-input-group">
                            <i class="las la-search"></i>
                            <input type="text" id="productSearch" class="form-control" placeholder="Search products here...">
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
    margin-bottom: 10px;
    margin-top: 20px;
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

/* Search Suggestions Styles */
.search-suggestions {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    max-height: 300px;
    overflow-y: auto;
    z-index: 1001;
    display: none;
}

.search-suggestions.show {
    display: block;
}

.suggestion-item {
    padding: 12px 15px;
    cursor: pointer;
    transition: background-color 0.2s;
    border-bottom: 1px solid #eee;
}

.suggestion-item:last-child {
    border-bottom: none;
}

.suggestion-item:hover {
    background-color: #f5f5f5;
}

.suggestion-item .product-name {
    font-weight: 500;
    color: #333;
}

.suggestion-item .product-category {
    font-size: 0.8em;
    color: #666;
    margin-top: 4px;
}

.product-grid-section {
    min-height: 100vh;
    position: relative;
}

#productGrid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
    padding: 20px 0;
    width: 100%;
}

.product-item {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    aspect-ratio: 1/1;
    background: #f8f9fa;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
    background: rgba(0, 0, 0, 0.7);
    color: white;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-item:hover .product-overlay {
    opacity: 1;
}

.product-title {
    font-size: 1.2rem;
    margin-bottom: 3px;
    font-weight: 600;
    line-height: 1.3;
}

.product-category {
    font-size: 0.8rem;
    opacity: 0.8;
}

/* Remove the bento grid pattern styles */
.product-item:nth-child(3n+1),
.product-item:nth-child(3n+2),
.product-item:nth-child(3n+3),
.product-item:nth-child(5n+1) {
    grid-column: auto;
    grid-row: auto;
}

@media (max-width: 1200px) {
    #productGrid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    }
}

@media (max-width: 768px) {
    #productGrid {
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 15px;
    }
    
    .search-input-group {
        max-width: 100%;
    }
    
    .search-input-group input {
        height: 50px;
    }
}

@media (max-width: 480px) {
    #productGrid {
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        gap: 10px;
    }
    
    .product-title {
        font-size: 0.9rem;
    }
    
    .product-category {
        font-size: 0.7rem;
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
.product-item img{
    width: 100%;
    height: 100%;
    object-fit: contain;
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
            image: "assets/img/products/Atomizer.JPG",
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

    // Create search suggestions container
    const suggestionsContainer = document.createElement('div');
    suggestionsContainer.className = 'search-suggestions';
    searchInput.parentNode.appendChild(suggestionsContainer);

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
                <h3 class="product-title" style="color:#fff;">${product.name}</h3>
                <span class="product-category">${product.category.replace('-', ' ').toUpperCase()}</span>
            </div>
        `;
        
        return card;
    }

    // Function to show search suggestions
    
    function showSuggestions(searchTerm) {
        if (!searchTerm) {
            suggestionsContainer.classList.remove('show');
            return;
        }

        const filteredProducts = products.filter(product => {
            const productName = product.name.toLowerCase();
            const productCategory = product.category.toLowerCase();
            const productTags = product.tags.join(' ').toLowerCase();
            
            return productName.includes(searchTerm) || 
                   productCategory.includes(searchTerm) || 
                   productTags.includes(searchTerm);
        });

        if (filteredProducts.length > 0) {
            suggestionsContainer.innerHTML = filteredProducts.map(product => `
                <div class="suggestion-item" data-product-id="${product.id}">
                    <div class="product-name">${product.name}</div>
                    <div class="product-category">${product.category}</div>
                </div>
            `).join('');

            suggestionsContainer.classList.add('show');

            // Add click event listeners to suggestions
            suggestionsContainer.querySelectorAll('.suggestion-item').forEach(item => {
                item.addEventListener('click', function() {
                    const productId = parseInt(this.getAttribute('data-product-id'));
                    const selectedProduct = products.find(p => p.id === productId);
                    if (selectedProduct) {
                        searchInput.value = selectedProduct.name;
                        suggestionsContainer.classList.remove('show');
                        updateProductGrid([selectedProduct]);
                    }
                });
            });
        } else {
            suggestionsContainer.classList.remove('show');
        }
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

    // Add event listeners for search input
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const searchTerm = this.value.toLowerCase().trim();
        
        searchTimeout = setTimeout(() => {
            showSuggestions(searchTerm);
            filterProducts(searchTerm);
        }, 300);
    });

    // Close suggestions when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !suggestionsContainer.contains(e.target)) {
            suggestionsContainer.classList.remove('show');
        }
    });
});
</script>
                
