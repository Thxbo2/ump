<?php
include __DIR__.'/scripts/start.php';
require_once __DIR__.'/scripts/functions.php';
require_once __DIR__.'/scripts/database.php';
require_once __DIR__.'/scripts/auth.php';

$search = htmlspecialchars($_GET['search'] ?? null);

if (! $search) {
    $products = get_all_products($connection);
} else {
    $products = get_products_with_search($connection, $search);
}
?>


<?php $pageTitle = "Search | Universal Marketplace" ?>
<?php include __DIR__.'/partials/page_start.php' ?>

<?php
if (session_has_user()) {
    include __DIR__.'/partials/auth_header.php';
} else {
    include __DIR__.'/partials/guest_header.php';
}
?>

<main class="main-content">
    <h2 class="section-heading">Search For Product</h2>

    <form class="search">
        <input value="<?= $search ?>" type="search" name="search" />
        <button type="submit">search</button>
    </form>

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
                        <p>$<?php echo $product['price']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

        </ul>

    <?php endif; ?>

</main>

<?php include __DIR__.'/partials/page_end.php' ?>
<?php include __DIR__.'/scripts/end.php' ?>