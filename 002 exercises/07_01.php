Zadatak 07.01

Slično kao u prethodnom zadatku (06.01) kreirati jednu apstraktnu klasu za laptope.
Unutar te klase je potrebno definisati sve ono što generički svaki laptop posjeduje: proizvođač, model, cijena.
Također, potrebno je deklarisati apstraktnu metodu info.
Nakon toga kreirati dvije konkretne klase (recimo klase MicrosoftLaptop i AppleLaptop).
Unutar tih klasa naslijedi generičku klasu za laptope i definisati neke pojedinačnosti za ove dvije klase.
Npr. Microsoft Surface Laptopi imaju touchscreen dok Apple laptopi imaju touchbar.
Instancirati ove klase i ispisati sve informacije koje imamo o njima.
Naravno, koristiti konstruktor kao i metodu za ispis.

Napomena: Primjer rješenja ovog zadatka možete pogledati unutar repozitorijuma ovog kursa ili na sljedećem linku: https://github.com/amarbeslija/php-development

<?php
abstract class Laptop{
    public $manifacturer;
    public $model;
    public $price;

    public abstract function info();
}

class MicrosoftLaptop extends Laptop{
    public $touchscreen;

    public function __construct($manifacturer, $model, $price, $touchscreen){
        $this->manifacturer = $manifacturer;
        $this->model = $model;
        $this->price = $price;
        $this->touchscreen = $touchscreen;
    }

    public function info(){
        return 
        "<ul>
            <li>Manifacturer: " . $this->manifacturer . "</li>
            <li>Model: " . $this->model . "</li>
            <li>Price: " . $this->price . "</li>
            <li>Touchscreen: " . $this->touchscreen . "</li>
        </ul>";
    }
}

class AppleLaptop extends Laptop{
    public $touchbar;

    public function __construct($manifacturer, $model, $price, $touchbar){
        $this->manifacturer = $manifacturer;
        $this->model = $model;
        $this->price = $price;
        $this->touchbar = $touchbar;
    }

    public function info(){
        return 
        "<ul>
            <li>Manifacturer: " . $this->manifacturer . "</li>
            <li>Model: " . $this->model . "</li>
            <li>Price: " . $this->price . "</li>
            <li>Touchbar: " . $this->touchbar . "</li>
        </ul>";
    }

}

echo "<hr>";

$surface_book = new MicrosoftLaptop("Microsoft", "Surface Book", "3000", "Yes");
echo $surface_book->info();

echo "<hr>";

$macbook_pro = new AppleLaptop("Apple", "MacBook Pro", "4000", "Yes");
echo $macbook_pro->info();