<?php

if(defined('MOONDRAGON_PATH')) {
    set_include_path(get_include_path() . PATH_SEPARATOR . MOONDRAGON_PATH);
}

assert("defined('MOONDRAGON_PATH')");

require_once 'include/core/exceptions.php';
