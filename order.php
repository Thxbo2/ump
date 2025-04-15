<?php
include __DIR__.'/scripts/start.php';
require_once __DIR__.'/scripts/functions.php';
require_once __DIR__.'/scripts/database.php';
require_once __DIR__.'/scripts/auth.php';

if (! session_has_user()) {
    redirect('index.php');
}

$id = $_GET['id'];
$product = get_product_by_id($connection, $id);
?>

<?php $pageTitle = "Order Confirmation | Universal Marketplace" ?>
<?php include __DIR__.'/partials/page_start.php' ?>
<?php include __DIR__.'/partials/auth_header.php' ?>

<main class="main-content">

    <?php if ($product) : ?>
        <h2 class="section-heading">Order Confirmation</h2>

        <div class="product-order">
            <img src="images/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" />
            <p>You are ordering: <strong><?php echo $product['name']; ?></strong></p>
            <p>Price: $<?php echo $product['price']; ?></p>
            <p><strong>Order successful!</strong> The seller will contact you soon.</p>
        </div>

    <?php else : ?>
        <h2 class="section-heading">Product was not found</h2>
    <?php endif ?>
</main>

<?php include __DIR__.'/partials/page_end.php' ?>
<?php include __DIR__.'/scripts/end.php' ?>