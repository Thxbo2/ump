<?php
include __DIR__.'/scripts/start.php';
require_once __DIR__.'/scripts/functions.php';
require_once __DIR__.'/scripts/database.php';
require_once __DIR__.'/scripts/auth.php';
require_once __DIR__.'/scripts/forms.php';

if (session_has_user()) {
    redirect('marketplace.php');
}

$form_error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (! validate_form_field_is_filled('name')) {
        $form_error = "The name field is required";
    }

    if (! validate_form_field_is_filled('email')) {
        $form_error = "The email field is required";
    }

    if (! validate_form_field_is_filled('password')) {
        $form_error = "The password field is required";
    }


    if ($form_error == null) {

        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $user = fetch_user_by_email($connection, $email);

        if ($user) {
            $form_error = "The email was already taken";
        }

        if ($form_error == null) {
            create_user($connection, $name, $email, $password);

            $user = fetch_user_by_email($connection, $email);

            login_user($user['id']);

            redirect('marketplace.php');
        }
    }
}
?>

<?php $pageTitle = "Register | Universal Marketplace" ?>
<?php include __DIR__.'/partials/page_start.php' ?>
<?php include __DIR__.'/partials/guest_header.php' ?>

<main class="main-content">

    <h2 class="section-heading">Create Account</h2>

    <form class="form" method="POST">
        <?php if ($form_error) : ?>
            <p class="form-field__error"><?= $form_error ?></p>
        <?php endif; ?>


        <div class="form__input-field">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter Name" required><br>
        </div>

        <div class="form__input-field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter Email" required><br>
        </div>

        <div class="form__input-field">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" required><br>
        </div>

        <button class="form__submit" type="submit" name="login">Register</button>

    </form>
</main>


<?php include __DIR__.'/partials/page_end.php' ?>
<?php include __DIR__.'/scripts/end.php' ?>