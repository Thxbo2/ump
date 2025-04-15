<?php
include __DIR__.'/scripts/start.php';
require_once __DIR__.'/scripts/functions.php';
require_once __DIR__.'/scripts/database.php';
require_once __DIR__.'/scripts/auth.php';

if (! session_has_user()) {
    redirect('index.php');
}

$products = get_user_products($connection, get_session_user_id());

$user = fetch_user_by_id($connection, get_session_user_id());
?>


<?php $pageTitle = "Marketplace | Universal Marketplace" ?>
<?php include __DIR__.'/partials/page_start.php' ?>
<?php include __DIR__.'/partials/auth_header.php' ?>

<main class="main-content">

    <h2 class="section-heading">Welcome, <?php echo $user['username']; ?>!</h2>

    <?php if (empty($products)) : ?>
        <h2 class="section-heading">No Products Found</h2>
    <?php else : ?>
        <ul class="products-list__container">
            <?php foreach ($products as $product) : ?>
                <div class="products-list__item">
                    <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <div class="product-list__item-content">
                        <h3><?php echo $product['name']; ?></h3>
                        <p><?php echo $product['description']; ?></p>
                        <p>MWK<?php echo $product['price']; ?></p>
                    </div>
                    <a class="products-list__item-order-button" href="order.php?id=<?php echo $product['id']; ?>">Order Now</a>
                </div>
            <?php endforeach; ?>

        </ul>
    <?php endif; ?>
</main>

<?php include __DIR__.'/partials/page_end.php' ?>
<?php include __DIR__.'/scripts/end.php' ?>