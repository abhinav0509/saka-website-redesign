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
                <div class="col-xl-8 col-lg-8">
                    <div class="search-wrapper">
                        <div class="search-input-group">
                            <i class="las la-search"></i>
                            <input type="text" id="productSearch" class="form-control" placeholder="Search products...">
                            <div class="search-results-dropdown" id="searchResults"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="filter-wrapper">
                        <div class="dropdown">
                            <button class="filter-btn dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="las la-filter"></i> Filter Products
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                                <li><a class="dropdown-item filter-option active" href="#" data-filter="all">All Products</a></li>
                                <li><a class="dropdown-item filter-option" href="#" data-filter="granulation">Granulation</a></li>
                                <li><a class="dropdown-item filter-option" href="#" data-filter="dryers">Dryers</a></li>
                                <li><a class="dropdown-item filter-option" href="#" data-filter="coolers">Coolers</a></li>
                                <li><a class="dropdown-item filter-option" href="#" data-filter="air-heater">Air Heater</a></li>
                                <li><a class="dropdown-item filter-option" href="#" data-filter="pollution-control">Air Pollution Control</a></li>
                                <li><a class="dropdown-item filter-option" href="#" data-filter="thermic-fluid">Thermic Fluid Heater</a></li>
                                <li><a class="dropdown-item filter-option" href="#" data-filter="plant-engineering">Plant Engineering</a></li>
                                <li><a class="dropdown-item filter-option" href="#" data-filter="other">Other Products</a></li>
                            </ul>
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
}

.search-results-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    display: none;
    z-index: 1000;
}

.filter-wrapper {
    display: flex;
    justify-content: flex-end;
}

.filter-btn {
    background: #fff;
    border: 1px solid #ddd;
    padding: 10px 20px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    justify-content: space-between;
}

.filter-btn:hover {
    background: #f8f9fa;
    border-color: #01a0e2;
}

.filter-btn.active {
    background: #01a0e2;
    color: #fff;
    border-color: #01a0e2;
}

.dropdown-menu {
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border: none;
    padding: 10px 0;
    width: 100%;
}

.dropdown-item {
    padding: 8px 20px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.dropdown-item:hover {
    background: #f8f9fa;
    color: #01a0e2;
}

.dropdown-item.active {
    background: #01a0e2;
    color: #fff;
}

.product-grid-section {
    min-height: 100vh;
    position: relative;
}

.product-grid-section.loading::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255,255,255,0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.product-item {
    margin-bottom: 30px;
    transition: all 0.3s ease;
}

.product-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    height: 100%;
    transition: all 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.product-image {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.3s ease;
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
}

.product-card:hover .product-overlay {
    opacity: 1;
}

.quick-view-btn {
    color: #fff;
    font-size: 24px;
    transition: all 0.3s ease;
}

.quick-view-btn:hover {
    transform: scale(1.2);
}

.product-content {
    padding: 20px;
}

.product-content h4 {
    margin-bottom: 10px;
    color: #333;
}

.product-content p {
    color: #666;
    margin-bottom: 15px;
}

.product-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 15px;
}

.product-category {
    background: #f8f9fa;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 12px;
    color: #666;
}

.know-more-btn {
    color: #01a0e2;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.know-more-btn:hover {
    color: #0077b3;
}

.modal-content {
    border-radius: 12px;
    border: none;
}

.modal-header {
    border-bottom: 1px solid #eee;
    padding: 20px;
}

.modal-body {
    padding: 30px;
}

.product-details h6 {
    color: #333;
    margin-bottom: 15px;
}

.product-specs {
    margin-top: 20px;
}

.product-specs ul {
    list-style: none;
    padding: 0;
}

.product-specs ul li {
    margin-bottom: 8px;
    padding-left: 20px;
    position: relative;
}

.product-specs ul li:before {
    content: "•";
    color: #01a0e2;
    position: absolute;
    left: 0;
}

@media (max-width: 991px) {
    .search-filter-section {
        padding: 15px 0;
    }
    
    .product-image {
        height: 200px;
    }
}

@media (max-width: 767px) {
    .search-wrapper,
    .filter-wrapper {
        margin-bottom: 15px;
    }
    
    .product-image {
        height: 180px;
    }
}

/* Add dropdown arrow */
.filter-btn::after {
    content: '';
    display: inline-block;
    width: 0;
    height: 0;
    margin-left: 5px;
    vertical-align: middle;
    border-top: 5px solid #666;
    border-right: 5px solid transparent;
    border-left: 5px solid transparent;
}

/* Product Grid Styles */
#productGrid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 30px;
    padding: 20px 0;
}

.product-item {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    aspect-ratio: 1;
}

.product-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.product-item.large {
    grid-column: span 2;
    grid-row: span 2;
}

.product-item.medium {
    grid-column: span 2;
}

.product-image {
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.product-item:hover .product-image img {
    transform: scale(1.1);
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0.2));
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 20px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-item:hover .product-overlay {
    opacity: 1;
}

.product-title {
    color: #fff;
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 10px;
    transform: translateY(20px);
    transition: transform 0.3s ease;
}

.product-category {
    color: rgba(255,255,255,0.8);
    font-size: 0.9rem;
    background: rgba(1,160,226,0.8);
    padding: 5px 10px;
    border-radius: 20px;
    display: inline-block;
    transform: translateY(20px);
    transition: transform 0.3s ease 0.1s;
}

.product-item:hover .product-title,
.product-item:hover .product-category {
    transform: translateY(0);
}

/* Loading Animation */
.loading {
    position: relative;
    overflow: hidden;
}

.loading::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

/* Responsive Grid */
@media (max-width: 1200px) {
    #productGrid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    }
}

@media (max-width: 768px) {
    #productGrid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
    }
    
    .product-item.large,
    .product-item.medium {
        grid-column: span 1;
        grid-row: span 1;
    }
}
</style>

<script>
// Product Data
const products = [
    // Granulation Category
    {
        id: 1,
        name: "Granulation Calcium Chloride",
        image: "assets/img/products/granulation-calcium-chloride.jpg",
        category: "granulation",
        tags: ["granulation", "chemical"]
    },
    {
        id: 2,
        name: "Granulation Sodium Benzoate",
        image: "assets/img/products/granulation-sodium-benzoate.jpg",
        category: "granulation",
        tags: ["granulation", "chemical"]
    },
    {
        id: 3,
        name: "Granulation Calcium Nitrate",
        image: "assets/img/products/granulation-calcium-nitrate.jpg",
        category: "granulation",
        tags: ["granulation", "chemical"]
    },
    // Dryers Category
    {
        id: 4,
        name: "Spray Dryer",
        image: "assets/img/products/spray-dryer.jpg",
        category: "dryers",
        tags: ["dryer", "industrial"]
    },
    {
        id: 5,
        name: "Rotary Dryer",
        image: "assets/img/products/rotary-dryer.jpg",
        category: "dryers",
        tags: ["dryer", "industrial"]
    },
    {
        id: 6,
        name: "Fluid Bed Dryer",
        image: "assets/img/products/fluid-bed-dryer.jpg",
        category: "dryers",
        tags: ["dryer", "industrial"]
    },
    {
        id: 7,
        name: "Flash Dryer",
        image: "assets/img/products/flash-dryer.jpg",
        category: "dryers",
        tags: ["dryer", "industrial"]
    },
    // Coolers Category
    {
        id: 8,
        name: "Spray Cooler",
        image: "assets/img/products/spray-cooler.jpg",
        category: "coolers",
        tags: ["cooler", "industrial"]
    },
    {
        id: 9,
        name: "Rotary Cooler",
        image: "assets/img/products/rotary-cooler.jpg",
        category: "coolers",
        tags: ["cooler", "industrial"]
    },
    {
        id: 10,
        name: "Fluid Bed Cooler",
        image: "assets/img/products/fluid-bed-cooler.jpg",
        category: "coolers",
        tags: ["cooler", "industrial"]
    },
    // Air Heater Category
    {
        id: 11,
        name: "Thermic Fluid",
        image: "assets/img/products/thermic-fluid.jpg",
        category: "air-heater",
        tags: ["heater", "thermal"]
    },
    {
        id: 12,
        name: "Heat Exchanger",
        image: "assets/img/products/heat-exchanger.jpg",
        category: "air-heater",
        tags: ["heater", "thermal"]
    },
    // Hot Air Generator Category
    {
        id: 13,
        name: "Hot Air Generator",
        image: "assets/img/products/hot-air-generator.jpg",
        category: "hot-air-generator",
        tags: ["generator", "thermal"]
    },
    {
        id: 14,
        name: "Air Pollution Control Equipment",
        image: "assets/img/products/pollution-control.jpg",
        category: "hot-air-generator",
        tags: ["control", "environmental"]
    },
    // Other Products Category
    {
        id: 15,
        name: "Shugi Mixer",
        image: "assets/img/products/shugi-mixer.jpg",
        category: "other",
        tags: ["mixer", "processing"]
    },
    {
        id: 16,
        name: "Turnkey Projects",
        image: "assets/img/products/turnkey-projects.jpg",
        category: "other",
        tags: ["projects", "industrial"]
    },
    // Add more products as needed...
];

document.addEventListener('DOMContentLoaded', function() {
    const productGrid = document.getElementById('productGrid');
    let currentFilter = 'all';

    // Initialize Bootstrap dropdowns
    var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
    var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
        return new bootstrap.Dropdown(dropdownToggleEl)
    });

    // Search functionality
    const searchInput = document.getElementById('productSearch');
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        filterProducts(currentFilter, searchTerm);
    });

    // Filter functionality
    document.querySelectorAll('.filter-option').forEach(option => {
        option.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all options
            document.querySelectorAll('.filter-option').forEach(opt => {
                opt.classList.remove('active');
            });
            
            // Add active class to clicked option
            this.classList.add('active');
            
            // Update current filter and filter products
            currentFilter = this.dataset.filter;
            const searchTerm = searchInput.value.toLowerCase();
            filterProducts(currentFilter, searchTerm);
            
            // Update button text
            const filterBtn = document.querySelector('.filter-btn');
            filterBtn.innerHTML = `<i class="las la-filter"></i> ${this.textContent}`;
        });
    });

    function filterProducts(filter, searchTerm = '') {
        const filteredProducts = products.filter(product => {
            const matchesFilter = filter === 'all' || product.category === filter;
            const matchesSearch = searchTerm === '' || 
                                product.name.toLowerCase().includes(searchTerm) || 
                                product.tags.some(tag => tag.includes(searchTerm));
            return matchesFilter && matchesSearch;
        });

        updateProductGrid(filteredProducts);
    }

    function updateProductGrid(products) {
        // Clear existing grid
        productGrid.innerHTML = '';

        // Add filtered products
        products.forEach((product, index) => {
            const productElement = createProductElement(product, index);
            productGrid.appendChild(productElement);
        });

        // Show no results message if no products match
        if (products.length === 0) {
            const noResults = document.createElement('div');
            noResults.className = 'col-12 text-center';
            noResults.innerHTML = '<p>No products found matching your criteria</p>';
            productGrid.appendChild(noResults);
        }
    }

    function createProductElement(product, index) {
        const div = document.createElement('div');
        div.className = 'product-item';
        
        // Add size classes for bento grid effect
        if (index % 7 === 0) {
            div.classList.add('large');
        } else if (index % 3 === 0) {
            div.classList.add('medium');
        }

        div.innerHTML = `
            <div class="product-image">
                <img src="${product.image}" alt="${product.name}" loading="lazy">
                <div class="product-overlay">
                    <h3 class="product-title">${product.name}</h3>
                    <span class="product-category">${product.category.replace('-', ' ').toUpperCase()}</span>
                </div>
            </div>
        `;

        return div;
    }

    // Initial render
    filterProducts('all');
});
</script>
                
