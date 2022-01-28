Zadatak 03.01

Kreirati jednu klasu koja će služiti za prikaz laptopa.
Bitno je da klasa ima konstruktor koji će primati sljedeće informacije o laptopima: proizvođač, model, cijena.
Nakon konstruktora bitno je da definišemo i jednu metodu koja će formatirano uraditi ispis ovih polja.
Nakon toga kreirati minimalno dva objekta i pozvati metodu info() za ispis podataka.

Napomena: Primjer rješenja ovog zadatka možete pogledati unutar repozitorijuma ovog kursa ili na sljedećem linku: https://github.com/amarbeslija/php-development

<?php
class Laptop{
    public $manifacturer;
    public $model;
    public $price;

    public function __construct($manifacturer, $model, $price){
        $this->manifacturer = $manifacturer;
        $this->model = $model;
        $this->price = $price;
    }

    public function info(){
        return 
        "<ul>
            <li>Manifacturer: " . $this->manifacturer . "</li>
            <li>Model: " . $this->model . "</li>
            <li>Price: " . $this->price . "</li>
        </ul>";
    }
}

$surface_pro = new Laptop("Microsoft", "Surface Pro", "2000");
echo $surface_pro->info();

$surface_book = new Laptop("Microsoft", "Surface Book", "4000");
echo $surface_book->info();


