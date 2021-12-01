<?php

class Singleton{

    private static $instances = [];
    protected function __construct() { }
    protected function __clone() { }
    public static function get_instance(){
        $my_class = static::class;
        if (!isset(self::$instances[$my_class])) {
            self::$instances[$my_class] = new static();
        }

        return self::$instances[$my_class];
    }
    public function some_other_method(){ }
}

function singleton_test(){

    $s1 = Singleton::get_instance();
    $s2 = Singleton::get_instance();

    if ($s1 === $s2) {
        echo "Singleton is working, only one instance here.";
    }else{
        echo "Singleton failed, more than one instance here.";
    }
}

singleton_test();