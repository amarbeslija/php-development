<?php

spl_autoload_register('autoloader');

function autoloader($class_name) {
  $path = APP . "/class/";
  $extension = ".class.php";
  $full_path = $path . $class_name . $extension;

  require_once $full_path;
}