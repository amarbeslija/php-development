<?php

// Three functions which can't have access modifiers
// We can call them however we want

function i_am_private(){
    echo "I am private!";
}

function i_am_protected(){
    echo "I am protected!";
}

function i_am_public(){
    echo "I am public!";
}


// Class with access modifiers where we can't call private or protected methods from outside
class OrdinaryClass{
    public function i_am_public(){
        echo "I am public!";
    }

    protected function i_am_protected(){
        echo "I am protected!";
    }

    private function i_am_private(){
        echo "I am public!";
    }
}

$ordinary_class = new OrdinaryClass;
$ordinary_class->i_am_public();
#$ordinary_class->i_am_protected();
#$ordinary_class->i_am_private();