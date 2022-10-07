<?php

use Framework\View\View;

/**
 * @param string $view
 * @param array $data
 * @return bool|string
 */
function view (string $view, array $data=[]): bool|string
{
    return View::render($view, $data);
}

function redirect (string $uri)
{
    header('Location: '.$uri);
    return '';
}