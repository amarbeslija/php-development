Zadatak 10.01

Iskoristiti kod iz zadatka 08.01.
Potrebno je nakon samog instanciranja objekata te pozivanja metoda pozvati funkcije get_class() i get_class_methods()
koje pripadaju Refleksiji nad samim objektom te prikazati dobijene vrijednosti na izlazu.

Napomena: Primjer rješenja ovog zadatka možete pogledati unutar repozitorijuma ovog kursa ili na sljedećem linku: https://github.com/amarbeslija/php-development


<?php
interface iLaptop{
    public function info();
}

trait laptop{
    public $manifacturer;
    public $model;
    public $price;
}

class MicrosoftLaptop implements iLaptop{
    use laptop;
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

class AppleLaptop implements iLaptop{
    use laptop;
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
echo "<br>";
var_dump(get_class($surface_book)); 
echo "<br>"; 
var_dump(get_class_methods($surface_book)); 

echo "<hr>";

$macbook_pro = new AppleLaptop("Apple", "MacBook Pro", "4000", "Yes");
echo $macbook_pro->info();
echo "<br>";
var_dump(get_class($macbook_pro)); 
echo "<br>"; 
var_dump(get_class_methods($macbook_pro)); 