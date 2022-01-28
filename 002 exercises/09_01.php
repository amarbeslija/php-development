<?php
namespace phpdevelopment;
?>

Zadatak 09.01

Zadatak koji smo imali u prethodnoj lekciji modifikovati tako da posjeduje prostor imena oko njegovih klasa.
Također, koristeći docblock način komentarisanja i korištenja anotacija iskomentarisati konstruktor i metodu info barem unutar jedne klase.

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

    /**
     * Constructor which will take in all the parameters we need for this class to function properly.
     *
     * @param [string] $manifacturer
     * @param [string] $model
     * @param [string] $price
     * @param [string] $touchscreen
     */

    public function __construct($manifacturer, $model, $price, $touchscreen){
        $this->manifacturer = $manifacturer;
        $this->model = $model;
        $this->price = $price;
        $this->touchscreen = $touchscreen;
    }

    /**
     * Method which will return formatted string with HTML with all the data for this class/object.
     *
     * @return string
     */

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


echo "<hr>";

$surface_book = new MicrosoftLaptop("Microsoft", "Surface Book", "3000", "Yes");
echo $surface_book->info();
