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

    if (! validate_form_field_is_filled('email')) {
        $form_error = "The username field is required";
    }

    if (! validate_form_field_is_filled('password')) {
        $form_error = "The password field is required";
    }

    if ($form_error == null) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = fetch_user_by_email($connection, $email);

        if (! $user) {
            $form_error = "The provided details do not match any account";
        }

        if ($form_error == null && ! password_verify($password, $user['password'])) {
            $form_error = "The provided details do not match any account";
        }

        if ($form_error == null) {
            login_user($user['id']);

            redirect('marketplace.php');
        }
    }
}
?>

<?php $pageTitle = "Login | Universal Marketplace" ?>
<?php include __DIR__.'/partials/page_start.php' ?>

<?php include __DIR__.'/partials/guest_header.php' ?>

<main class="main-content">
    <h2 class="section-heading">Sign In</h2>

    <form class="form" method="POST">
        <?php if ($form_error) : ?>
            <p class="form-field__error"><?= $form_error ?></p>
        <?php endif; ?>

        <div class="form__input-field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter Email" required><br>
        </div>

        <div class="form__input-field">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" required><br>
        </div>

        <button class="form__submit" type="submit" name="login">Login</button>
    </form>
</main>


<?php include __DIR__.'/partials/page_end.php' ?>
<?php include __DIR__.'/scripts/end.php' ?>