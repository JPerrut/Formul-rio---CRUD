<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';


$allowed_pages = ['home', 'about', 'service', 'contact'];
if (!in_array($page, $allowed_pages)) {
    $page = '404';
}
?>