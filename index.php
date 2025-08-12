<?php
include './header.php';



//$db = Database::getInstance();


$products = [];

//$sql = "SELECT * FROM product ORDER BY id DESC";
$sql = "SELECT product.*, IFNULL(AVG(reviews.rating), 0) as avg_rating 
          FROM product 
          LEFT JOIN reviews ON product.id = reviews.product_id 
          GROUP BY product.id";
//echo $sql;die;
$res = $db->query($sql);

while ($row = $res->fetch_object()) {
    $products[] = $row;
}

//print_r($products);die;

?>


<!-- Slider -->
<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            <div class="item-slick1" style="background-image: url(images/bg789.jpg);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">

                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">

                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">

                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1" style="background-image: url(images/bg66.jpeg);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">

                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">

                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">

                        </div>
                    </div>
                </div>
            </div>

            <div class="item-slick1" style="background-image: url(images/1111.png);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">

                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">

                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="images/12345.webp" alt="IMG-BANNER">

                    <a href="#" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                AGRO TOOLS
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                SUCCESS IN AGRICULTURE
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Buy Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="images/123.jpeg" alt="IMG-BANNER">

                    <a href="#" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">

                            </span>

                            <span class="block1-info stext-102 trans-04">

                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Buy Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="images/kk.jpeg" alt="IMG-BANNER">

                    <a href="#" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                AFFORDABLE PRICE
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                WE CARE FOR YOU!!!
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Buy Now
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Product -->
<section class="bg0 p-t-23 p-b-140" style="background-color:#b2f7f2">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                All Products
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">

            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <!--<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Filter
                </div>-->

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>

            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <form action="search-results.php" method="GET">
                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="query" placeholder="Search">
                    </form>
                </div>
            </div>


        </div>

        <div class="row isotope-grid">
    <?php foreach ($products as $product): ?>

        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
            <div class="product-card shadow-sm">
                <!-- Product Image -->
                <div class="product-image position-relative">
                    <?php $front_image = explode('/', $product->image1)[4]; ?>
                    <a href="product-details.php?id=<?php echo $product->id ?>">
                        <img src="./admin/uploaded-files/product/<?php echo $front_image ?>" alt="IMG-PRODUCT" class="img-fluid">
                    </a>
                    <div class="product-labels">
                        <!-- You can add badges here -->
                        <span class="badge badge-success">10% OFF</span>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="product-info p-3">
                    <a href="product-details.php?id=<?php echo $product->id ?>" class="product-name js-name-detail">
                        <?php echo $product->name ?>
                    </a>
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Product Price -->
                        <span class="product-price text-danger">
                            ₹<span id="price-<?php echo $product->id ?>" class="price-amount" data-price="<?php echo $product->sell_price ?>">
                                <?php echo $product->sell_price ?>
                            </span>
                        </span>
                    </div>

                    <!-- Quantity Dropdown and Add to Cart Button -->
                    <div class="cart-controls mt-3">
                        <div class="quantity-dropdown">
                            <select id="qty" class="form-control quantity-select num-product" name="num-product">
                                <option value="1">1</option>   
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <a href="javascript:void(0)" onclick="manage_cart('<?php echo $product->id ?>','add')" class="btn btn-success mt-3 w-100 js-addcart-detail">
                            Add to Cart
                        </a>
                        
                        <!-- Average Star Ratings -->
                        <div class="mt-2">
                            <?php
                            $avg_rating = round($product->avg_rating, 1); // Rounded to 1 decimal place
                            $full_stars = floor($avg_rating); // Full stars
                            $half_star = ($avg_rating - $full_stars >= 0.5) ? 1 : 0; // Half star
                            $empty_stars = 5 - $full_stars - $half_star; // Empty stars
                            ?>

                            <!-- Display Full Stars -->
                            <?php for ($i = 0; $i < $full_stars; $i++): ?>
                                <i class="fas fa-star text-warning"></i>
                            <?php endfor; ?>

                            <!-- Display Half Star -->
                            <?php if ($half_star): ?>
                                <i class="fas fa-star-half-alt text-warning"></i>
                            <?php endif; ?>

                            <!-- Display Empty Stars -->
                            <?php for ($i = 0; $i < $empty_stars; $i++): ?>
                                <i class="far fa-star text-warning"></i>
                            <?php endfor; ?>

                            <span class="ml-2">(<?php echo $avg_rating ?>)</span> <!-- Display numeric rating -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>


        
    </div>
</section>


<?php include './footer.php'; ?>
<script>
    $(document).ready(function () {
        // Listen for changes in the quantity dropdown
        $('.quantity-select').on('change', function () {
            var productId = $(this).closest('.product-info').find('.js-addcart-detail').attr('onclick').match(/\d+/)[0];
            var quantity = $(this).val(); // Get the selected quantity
            var priceElement = $('#price-' + productId); // Get the price element by ID
            var basePrice = priceElement.data('price'); // Get the base price stored in the data attribute

            // Calculate the new price based on the selected quantity
            var newPrice = basePrice * quantity;

            // Update the displayed price
            priceElement.text(newPrice.toFixed(2));
        });
    });

</script>

<script src="https://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate">
</script>
<script>
    function loadGoogleTranslate() {
        new google.translate.TranslateElement("google_element");
    }
</script>