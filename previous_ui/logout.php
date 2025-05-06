<?php

include __DIR__.'/scripts/start.php';
require_once __DIR__.'/scripts/functions.php';
require_once __DIR__.'/scripts/auth.php';

logout_user();
session_destroy();

redirect("index.php");
