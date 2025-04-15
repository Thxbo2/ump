<?php

function login_user($id)
{
    $_SESSION['user_id'] = $id;
}

function get_session_user_id()
{
    return $_SESSION['user_id'] ?? null;
}

function session_has_user()
{
    return isset($_SESSION['user_id']);
}


function logout_user()
{
    unset($_SESSION['user_id']);
}
