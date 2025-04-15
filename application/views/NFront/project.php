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
    margin-bottom: 30px;
}

.search-input-group {
    position: relative;
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
    height: 50px;
    border-radius: 8px;
    border: 1px solid #ddd;
    width: 100%;
    font-size: 16px;
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
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px 0;
}

.product-item {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    transition: all 0.3s ease;
    aspect-ratio: 1;
}

.product-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.product-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-item:hover img {
    transform: scale(1.05);
}

.product-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 20px;
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    color: white;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-item:hover .product-overlay {
    opacity: 1;
}

.product-title {
    font-size: 1.2rem;
    margin-bottom: 5px;
    font-weight: 600;
}

.product-category {
    font-size: 0.9rem;
    opacity: 0.8;
}

/* Bento Grid Layout */
.product-item:nth-child(3n+1) {
    grid-column: span 2;
    grid-row: span 2;
}

.product-item:nth-child(3n+2) {
    grid-column: span 1;
    grid-row: span 1;
}

.product-item:nth-child(3n+3) {
    grid-column: span 1;
    grid-row: span 1;
}

@media (max-width: 768px) {
    #productGrid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    }
    
    .product-item:nth-child(3n+1) {
        grid-column: span 1;
        grid-row: span 1;
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
    padding: 40px;
    color: #666;
    font-size: 1.2rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Product data array
    const products = [
        // Granulation Category
        {
            id: 1,
            name: "Granulation Calcium Chloride",
            image: "assets/img/products/granulation/calcium-chloride.jpg",
            category: "granulation",
            tags: ["granulation", "chemical"]
        },
        {
            id: 2,
            name: "Granulation Sodium Benzoate",
            image: "assets/img/products/granulation/sodium-benzoate.jpg",
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
            name: "Spray Dryer",
            image: "assets/img/products/dryers/spray-dryer.jpg",
            category: "dryers",
            tags: ["dryer", "industrial"]
        },
        {
            id: 5,
            name: "Rotary Dryer",
            image: "assets/img/products/dryers/rotary-dryer.jpg",
            category: "dryers",
            tags: ["dryer", "industrial"]
        },
        {
            id: 6,
            name: "Fluid Bed Dryer",
            image: "assets/img/products/dryers/fluid-bed-dryer.jpg",
            category: "dryers",
            tags: ["dryer", "industrial"]
        },
        {
            id: 7,
            name: "Flash Dryer",
            image: "assets/img/products/dryers/flash-dryer.jpg",
            category: "dryers",
            tags: ["dryer", "industrial"]
        },
        // Coolers Category
        {
            id: 8,
            name: "Spray Cooler",
            image: "assets/img/products/coolers/spray-cooler.jpg",
            category: "coolers",
            tags: ["cooler", "industrial"]
        },
        {
            id: 9,
            name: "Rotary Cooler",
            image: "assets/img/products/coolers/rotary-cooler.jpg",
            category: "coolers",
            tags: ["cooler", "industrial"]
        },
        {
            id: 10,
            name: "Fluid Bed Cooler",
            image: "assets/img/products/coolers/fluid-bed-cooler.jpg",
            category: "coolers",
            tags: ["cooler", "industrial"]
        },
        // Air Heater Category
        {
            id: 11,
            name: "Thermic Fluid",
            image: "assets/img/products/air-heater/thermic-fluid.jpg",
            category: "air-heater",
            tags: ["heater", "thermal"]
        },
        {
            id: 12,
            name: "Heat Exchanger",
            image: "assets/img/products/air-heater/heat-exchanger.jpg",
            category: "air-heater",
            tags: ["heater", "thermal"]
        },
        {
            id: 13,
            name: "Air Cooler, Air Moisture Separator",
            image: "assets/img/products/air-heater/air-cooler.jpg",
            category: "air-heater",
            tags: ["cooler", "separator"]
        },
        // Hot Air Generator Category
        {
            id: 14,
            name: "Hot Air Generator",
            image: "assets/img/products/hot-air/hot-air-generator.jpg",
            category: "hot-air",
            tags: ["generator", "thermal"]
        },
        {
            id: 15,
            name: "Air Pollution Control Equipment",
            image: "assets/img/products/hot-air/pollution-control.jpg",
            category: "hot-air",
            tags: ["control", "environmental"]
        },
        {
            id: 16,
            name: "Thermic Fluid Heater",
            image: "assets/img/products/hot-air/thermic-fluid-heater.jpg",
            category: "hot-air",
            tags: ["heater", "thermal"]
        },
        // Other Products Category
        {
            id: 17,
            name: "Shugi Mixer",
            image: "assets/img/products/other/shugi-mixer.jpg",
            category: "other",
            tags: ["mixer", "processing"]
        },
        {
            id: 18,
            name: "Turnkey Projects",
            image: "assets/img/products/other/turnkey-projects.jpg",
            category: "other",
            tags: ["projects", "engineering"]
        },
        {
            id: 19,
            name: "Material Handling System",
            image: "assets/img/products/other/material-handling.jpg",
            category: "other",
            tags: ["handling", "system"]
        },
        {
            id: 20,
            name: "Pin Mill",
            image: "assets/img/products/other/pin-mill.jpg",
            category: "other",
            tags: ["mill", "processing"]
        },
        {
            id: 21,
            name: "Lump Breaker",
            image: "assets/img/products/other/lump-breaker.jpg",
            category: "other",
            tags: ["breaker", "processing"]
        },
        {
            id: 22,
            name: "Blender (Fast Mixer)",
            image: "assets/img/products/other/blender.jpg",
            category: "other",
            tags: ["mixer", "processing"]
        },
        {
            id: 23,
            name: "Vertical Blender",
            image: "assets/img/products/other/vertical-blender.jpg",
            category: "other",
            tags: ["mixer", "processing"]
        },
        {
            id: 24,
            name: "Plow Mixer",
            image: "assets/img/products/other/plow-mixer.jpg",
            category: "other",
            tags: ["mixer", "processing"]
        },
        {
            id: 25,
            name: "Ribbon Blender",
            image: "assets/img/products/other/ribbon-blender.jpg",
            category: "other",
            tags: ["mixer", "processing"]
        },
        {
            id: 26,
            name: "Twin Feed Screw",
            image: "assets/img/products/other/twin-feed-screw.jpg",
            category: "other",
            tags: ["screw", "feeding"]
        },
        {
            id: 27,
            name: "Rapid Mixer",
            image: "assets/img/products/other/rapid-mixer.jpg",
            category: "other",
            tags: ["mixer", "processing"]
        },
        {
            id: 28,
            name: "Rotary Air Lock Valve",
            image: "assets/img/products/other/air-lock-valve.jpg",
            category: "other",
            tags: ["valve", "control"]
        },
        {
            id: 29,
            name: "Bag Filter",
            image: "assets/img/products/other/bag-filter.jpg",
            category: "other",
            tags: ["filter", "environmental"]
        },
        {
            id: 30,
            name: "Blower",
            image: "assets/img/products/other/blower.jpg",
            category: "other",
            tags: ["blower", "air"]
        },
        {
            id: 31,
            name: "Atomizer",
            image: "assets/img/products/other/atomizer.jpg",
            category: "other",
            tags: ["atomizer", "spray"]
        },
        {
            id: 32,
            name: "Bucket Elevator",
            image: "assets/img/products/other/bucket-elevator.jpg",
            category: "other",
            tags: ["elevator", "handling"]
        },
        {
            id: 33,
            name: "Coal Crusher",
            image: "assets/img/products/other/coal-crusher.jpg",
            category: "other",
            tags: ["crusher", "processing"]
        },
        {
            id: 34,
            name: "Screw Feeder",
            image: "assets/img/products/other/screw-feeder.jpg",
            category: "other",
            tags: ["feeder", "feeding"]
        },
        {
            id: 35,
            name: "Pneumatic Conveyor",
            image: "assets/img/products/other/pneumatic-conveyor.jpg",
            category: "other",
            tags: ["conveyor", "handling"]
        },
        {
            id: 36,
            name: "Plough Mixer",
            image: "assets/img/products/other/plough-mixer.jpg",
            category: "other",
            tags: ["mixer", "processing"]
        },
        // Plant Engineering Category
        {
            id: 37,
            name: "Food Preservative Manufacturing",
            image: "assets/img/products/plant/food-preservative.jpg",
            category: "plant-engineering",
            tags: ["food", "manufacturing"]
        },
        {
            id: 38,
            name: "Material Handling System",
            image: "assets/img/products/plant/material-handling.jpg",
            category: "plant-engineering",
            tags: ["handling", "system"]
        },
        {
            id: 39,
            name: "PPT Silica Manufacturing",
            image: "assets/img/products/plant/silica-manufacturing.jpg",
            category: "plant-engineering",
            tags: ["silica", "manufacturing"]
        },
        {
            id: 40,
            name: "Klin Plants",
            image: "assets/img/products/plant/klin-plants.jpg",
            category: "plant-engineering",
            tags: ["klin", "plants"]
        }
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
        
        card.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <div class="product-overlay">
                <h3 class="product-title">${product.name}</h3>
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
                
