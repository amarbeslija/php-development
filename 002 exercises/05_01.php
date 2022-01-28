Zadatak 05.01

Kreirati jednu klasu koja će služiti za izračuvanje površine i obima kruga.
Bitno je da unutar klase imamo definisano jednu konstantu PI koju ćemo koristiti unutar računanja.
Klasa treba da ima konstruktor koji će primit parametar za sam radijus kruga.
Nakon konstruktora definisati jednu metodu koja će ispisati obim kruga i drugu metodu koja će ispisati površinu kruga.
Nakon toga kreirati barem dva objekta i pozvati metode za obim i krug.

Napomena: Primjer rješenja ovog zadatka možete pogledati unutar repozitorijuma ovog kursa ili na sljedećem linku: https://github.com/amarbeslija/php-development


<?php
class Circle{
    const PI = 3.14;
    public $radius;

    public function __construct($radius){
        $this->radius = $radius;
    }
    
    public function volume(){
        return "Volume: " . 2 * $this->radius * Circle::PI . "<br>";
    }

    public function surface(){
        return "Surface: " . $this->radius * $this->radius * Circle::PI;
    }
}

echo "<hr>";

$cirle_one = new Circle(5);
echo $cirle_one->volume();
echo $cirle_one->surface();

echo "<hr>";

$circle_two = new Circle(7);
echo $circle_two->volume();
echo $circle_two->surface();