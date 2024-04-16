<?php
define('MODAL_PARAM_NAME', md5(sprintf("mparam-%s", $_SERVER['HTTP_HOST'])));

/**
 * @return bool
 */
function modalAccepted()
{
    return !empty($_COOKIE[MODAL_PARAM_NAME]);
}

/**
 * @return false|string
 */
function modalDisplay()
{
    if (modalAccepted()) {
        return '';
    }


    ob_start();
    require_once __DIR__ . '/modal.html.php';

    return ob_get_clean();
}
