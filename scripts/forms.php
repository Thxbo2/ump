<?php

function validate_form_field_is_filled($name)
{
    return isset($_POST[$name]) && ! empty($_POST[$name]);
}
