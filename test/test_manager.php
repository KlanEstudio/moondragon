<?php

define('MOONDRAGON_PATH', '../');
require_once MOONDRAGON_PATH.'moondragon.core.php';

require_once 'moondragon.manager.php';

class Home extends Manager
{
    public function index() {
        echo 'Hola Mundo!';
    }
    
    public function hola() {
    	echo 'definiendo tarea hola';
    }
}

MoonDragon::run(new Home());

