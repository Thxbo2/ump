<?php


function redirect($path)
{
    header(sprintf('Location: %s', $path));
    exit;
}
