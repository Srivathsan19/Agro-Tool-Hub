<?php include './header.php';


$product_id = $_GET['id'];
//print_r($product_id);die;

// SQL query to fetch reviews for the specific product
$sql = "SELECT name, rating, review, created_at FROM reviews WHERE product_id = '$product_id' ORDER BY created_at DESC";
$result = $db->query($sql);



if (isset($_GET['id'])) {
    $product_id = mysqli_real_escape_string($db, $_GET['id']);

    if ($product_id > 0) {
        $get_product = get_product($db, '', '', $product_id);
        // print_r($get_product['0']['id']);die;
    } else {
        ?>
        <script>
            window.location.href = 'index.php';
        </script>
        <?php
    }
} else {
    ?>
    <script>
        window.location.href = 'index.php';
    </script>
    <?php
}



?>

<!-- breadcrumb -->
<div class="container ">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg ">
        <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
            tools
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>


    </div>
</div>


<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                        <?php
                        //echo $product->name;
                        $front_image1 = explode('/', $get_product['0']['image1'])[4];
                        $front_image2 = explode('/', $get_product['0']['image2'])[4];
                        $front_image3 = explode('/', $get_product['0']['image3'])[4];
                        ?>
                        <div class="slick3 gallery-lb">
                            <div class="item-slick3"
                                data-thumb="./admin/uploaded-files/product/<?php echo $front_image1 ?>">
                                <div class="wrap-pic-w pos-relative">

                                    <img src="./admin/uploaded-files/product/<?php echo $front_image1 ?>"
                                        alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="images/product-detail-01.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="item-slick3"
                                data-thumb="./admin/uploaded-files/product/<?php echo $front_image2 ?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="./admin/uploaded-files/product/<?php echo $front_image2 ?>"
                                        alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="images/product-detail-02.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="item-slick3"
                                data-thumb="./admin/uploaded-files/product/<?php echo $front_image3 ?>">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="./admin/uploaded-files/product/<?php echo $front_image3 ?>"
                                        alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="images/product-detail-03.jpg">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
    <div class="container pincode-deliveryContainer my-5 p-4 bg-light rounded">
        <h4 class="d-flex align-items-center">
            <span>Do you want to Rent this tool?</span>
            <span class="ml-auto">
                <i class="fa fa-truck"></i>
            </span>
        </h4>

        <!-- Date Pickers for Lending Period -->
        <div class="form-group">
            <label for="start_date">Start Date:</label>
          
            <input type="hidden" id="product_id" class="form-control" value="<?php echo $get_product['0']['id'] ?>">
            <input type="date" id="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" class="form-control" required>
        </div>

        <!-- Display Lending Amount -->
        <div class="form-group">
            <label for="total_amount">Renting Amount (in Rs):</label>
            <input type="text" id="total_amount" class="form-control" readonly>
        </div>

        <!-- Use GET method and dynamically create the URL -->
        <button type="button" class="btn btn-success mt-2 lend-product">
            Rent Here
        </button>
    </div>
    <form action="add_to_cart.php" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    
</form>
</div>

        <div class="col-md-6 col-lg-5 p-b-30">
            <div class="p-r-50 p-t-5 p-lr-0-lg">
                <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                    <?php echo $get_product['0']['name'] ?>
                </h4>

                <span class="mtext-106 cl2">
                    Rs.<?php echo $get_product['0']['sell_price'] ?>
                </span>
                <p class="stext-102 cl3 p-t-23">
                    
                    <?php echo $get_product['0']['description'] ?>
                </p>

                <!--  -->
                <div class="p-t-33">
                
                </div>
            </div>

            <!--  -->
            <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                <div class="flex-m bor9 p-r-10 m-r-11">
                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                        data-tooltip="Add to Wishlist">
                        <i class="zmdi zmdi-favorite"></i>
                    </a>
                </div>

                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                    data-tooltip="Facebook">
                    <i class="fa fa-facebook"></i>
                </a>

                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                    data-tooltip="Twitter">
                    <i class="fa fa-twitter"></i>
                </a>

                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                    data-tooltip="Google Plus">
                    <i class="fa fa-google-plus"></i>
                </a>
            </div>
        </div>
    </div>
    </div>

    <div class="bor10 m-t-50 p-t-43 p-b-40">
        <!-- Tab01 -->
        <div class="tab01">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item p-b-10">
                    <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                </li>

                <!-- <li class="nav-item p-b-10">
                    <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
                </li>-->

                <li class="nav-item p-b-10">
                    <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-t-43">
                <!-- - -->
                <div class="tab-pane fade show active" id="description" role="tabpanel">
                    <div class="how-pos2 p-lr-15-md">
                        <p class="stext-102 cl6">
                            <?php echo $get_product['0']['description'] ?>
                        </p>
                    </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="information" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                            <ul class="p-lr-28 p-lr-15-sm">
                                <li class="flex-w flex-t p-b-7">
                                    <span class="stext-102 cl3 size-205">
                                        Weight
                                    </span>

                                    <span class="stext-102 cl6 size-206">
                                        0.79 kg
                                    </span>
                                </li>

                                <li class="flex-w flex-t p-b-7">
                                    <span class="stext-102 cl3 size-205">
                                        Dimensions
                                    </span>

                                    <span class="stext-102 cl6 size-206">
                                        110 x 33 x 100 cm
                                    </span>
                                </li>

                                <li class="flex-w flex-t p-b-7">
                                    <span class="stext-102 cl3 size-205">
                                        Materials
                                    </span>

                                    <span class="stext-102 cl6 size-206">
                                        60% cotton
                                    </span>
                                </li>

                                <li class="flex-w flex-t p-b-7">
                                    <span class="stext-102 cl3 size-205">
                                        Color
                                    </span>

                                    <span class="stext-102 cl6 size-206">
                                        Black, Blue, Grey, Green, Red, White
                                    </span>
                                </li>

                                <li class="flex-w flex-t p-b-7">
                                    <span class="stext-102 cl3 size-205">
                                        Size
                                    </span>

                                    <span class="stext-102 cl6 size-206">
                                        XL, L, M, S
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="reviews" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                            <div class="p-b-30 m-lr-15-sm">

                                <?php if ($result->num_rows > 0): ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                        <div class="flex-w flex-t p-b-68">
                                            <div class="size-207">
                                                <div class="flex-w flex-sb-m p-b-17">
                                                    <span class="mtext-107 cl2 p-r-20">
                                                        <?php echo htmlspecialchars($row['name']); ?>
                                                    </span>
                                                    <span class="fs-18 cl11">
                                                        <!-- Display stars based on rating -->
                                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                                            <?php if ($i <= floor($row['rating'])): ?>
                                                                <i class="zmdi zmdi-star"></i>
                                                            <?php elseif ($i == ceil($row['rating'])): ?>
                                                                <i class="zmdi zmdi-star-half"></i>
                                                            <?php else: ?>
                                                                <i class="zmdi zmdi-star-outline"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </span>
                                                </div>
                                                <p class="stext-102 cl6">
                                                    <?php echo htmlspecialchars($row['review']); ?>
                                                </p>
                                                <p class="stext-102 cl6">
                                                    <?php echo date('F j, Y', strtotime($row['created_at'])); ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <p>No reviews yet for this product.</p>
                                <?php endif; ?>

                            </div>


                            <form id="login-form" class="w-full">
                                <input type="hidden" id="product_id" name="product_id"
                                    value="<?php echo $get_product['0']['id'] ?>">
                                <h5 class="mtext-108 cl2 p-b-7">
                                    Add a review
                                </h5>

                                <!--<p class="stext-102 cl6">
                                        Your email address will not be published. Required fields are marked *
                                    </p>-->

                                <div class="flex-w flex-m p-t-50 p-b-23">
                                    <span class="stext-102 cl3 m-r-16">
                                        Your Rating
                                    </span>

                                    <span class="wrap-rating fs-18 cl11 pointer">
                                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                        <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                        <input class="dis-none" type="number" id="rating" name="rating">
                                    </span>
                                </div>

                                <div class="row p-b-25">
                                    <div class="col-12 p-b-5">
                                        <label class="stext-102 cl3" for="review">Your review</label>
                                        <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review"
                                            name="review"></textarea>
                                        <span class="field_error" id="review_error"></span>
                                    </div>

                                    <div class="col-sm-6 p-b-5">
                                        <label class="stext-102 cl3" for="name">Name</label>
                                        <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text"
                                            name="name">
                                        <span class="field_error" id="name_error"></span>
                                    </div>

                                    <div class="col-sm-6 p-b-5">
                                        <label class="stext-102 cl3" for="email">Email</label>
                                        <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text"
                                            name="email">
                                        <span class="field_error" id="email_error"></span>
                                    </div>

                                </div>

                                <button type="button" class="btn btn-primary  ml-2"
                                    onclick="ratingSubmit()">Submit</button>

                            </form>
                            <div id="submitResult" class="mt-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">

    </div>
</section>


<!-- Related Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Related Products
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="images/aa.png" alt="IMG-PRODUCT">

                            <a href="#"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    Drones
                                </a>

                                <span class="stext-105 cl3">
                                    ₹2500
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
                                        alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                        src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="images/cr.jpg" alt="IMG-PRODUCT">

                            <a href="#"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    Crop Cover
                                </a>

                                <span class="stext-105 cl3">
                                    ₹1800
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
                                        alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                        src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="images/fff.webp" alt="IMG-PRODUCT">

                            <a href="#"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    Plough
                                </a>

                                <span class="stext-105 cl3">
                                    ₹450
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
                                        alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                        src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="images/pp.webp" alt="IMG-PRODUCT">

                            <a href="#"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    Pruning Shears
                                </a>

                                <span class="stext-105 cl3">
                                    ₹300
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
                                        alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                        src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="images/a2_agro-1.webp" alt="IMG-PRODUCT">

                            <a href="#"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    Sprayer
                                </a>

                                <span class="stext-105 cl3">
                                    ₹250
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
                                        alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                        src="images/icons/icon-heart-02.png" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>
                            

<?php include './footer.php'; ?>

<script>
    $(document).on('change', '#start_date, #end_date', function() {
        const startDate = new Date($('#start_date').val());
        const endDate = new Date($('#end_date').val());

        // Assuming daily lending rate is Rs 100
        const dailyRate = 100;

        if (startDate && endDate && startDate <= endDate) {
            const timeDiff = endDate.getTime() - startDate.getTime();
            const dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1;
            const totalAmount = dayDiff * dailyRate;

            $('#total_amount').val(totalAmount);
        } else {
            $('#total_amount').val('');
        }
    });

    $(document).on('click', '.lend-product', function() {
        const product_id = $('#product_id').val();
        const startDate = $('#start_date').val();
        const endDate = $('#end_date').val();
        const totalAmount = $('#total_amount').val();

        if (startDate && endDate && totalAmount) {
            // Construct the GET URL
            const url = `pay.php?product_id=${product_id}&start_date=${startDate}&end_date=${endDate}&total_amount=${totalAmount}`;
            
            // Redirect to the pay.php page with GET parameters
            window.location.href = url;
        } else {
            alert('Please select valid dates and ensure the lending amount is calculated.');
        }
    });
</script>
