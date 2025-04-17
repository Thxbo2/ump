<?php

include __DIR__.'/scripts/start.php';
require_once __DIR__.'/scripts/functions.php';
require_once __DIR__.'/scripts/database.php';
require_once __DIR__.'/scripts/auth.php';
require_once __DIR__.'/scripts/forms.php';

if (! session_has_user()) {
    redirect('index.php');
}

$form_error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (! validate_form_field_is_filled("name")) {
        $form_error = "The name field is required";
    }

    if (! validate_form_field_is_filled("price")) {
        $form_error = "The price field is required";
    }

    if (! validate_form_field_is_filled("description")) {
        $form_error = "The price field is required";
    }

    if (! isset($_FILES['image'])) {
        $form_error = "The image field is required";
    }

    if ($form_error == null) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        $image = $_FILES['image'];
        $file_name = $image['name'];

        $user = fetch_user_by_id($connection, get_session_user_id());

        move_uploaded_file($_FILES['image']['tmp_name'], "images/$file_name");

        create_product($connection, $user['id'], $name, $price, $file_name, $description);

        redirect("marketplace.php");
    }
}
?>



<?php $pageTitle = "Admin Panel | Universal Marketplace" ?>
<?php include __DIR__.'/partials/page_start.php' ?>
<?php include __DIR__.'/partials/auth_header.php' ?>

<main class="main-content">
    <h2 class="section-heading w-full text-center">Create Product</h2>

    <form class="form" method="POST" enctype="multipart/form-data">
        <?php if ($form_error) : ?>
            <p class="form-field__error"><?= $form_error ?></p>
        <?php endif; ?>


        <div class="form__input-field">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter Product Name" required>
        </div>


        <div class="form__input-field">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" placeholder="Enter Product Price" required>
        </div>

        <div class="form__input-field">
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Enter Product Description" required></textarea>
        </div>

        <div class="form__input-field">
            <label for="image">Image</label>
            <input accept="image/*" type="file" name="image" id="image" required>
        </div>

        <button class="form__submit" type="submit">Add Product</button>
    </form>

</main>


<?php include __DIR__.'/partials/page_end.php' ?>
<?php include __DIR__.'/scripts/end.php' ?>