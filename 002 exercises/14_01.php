Zadatak 14.01

Kreirati jednu klasu Form.
Unutar konstruktora ove forme primiti parametre za metodu forme (GET ili POST) te za action forme (gdje će nas voditi).
Također, definisati i enctype koji nam je potreban za sam upload fajlova.
Formirati početak HTML forme na osnovu ovih parametara te to sačuvati unutar jednog polja u klasi.
Zatim kreirati metodu koja će dodavati input tipove elemenata.
Ova metoda može da primi tip input polja, name te da li je polje required i da li ima predefinisanu vrijednost.
Koristeći konkatenaciju, formirati ovo polje i dodati ga u polje gdje smo već formirali i sačuvali početak form elementa.
Uz to je potrebno kreirati i metodu za dodavanje labela koja će primati vrijednost za for atribute i vrijednost za ispis.
Na isti način dodati formiranu labelu u polje gdje nam je ostatak definisanog HTML-a.
Također, potrebno je kreirati i metode za select element i option elemente, textarea element.
Na kraju kreirati i metodu koja će završiti form element i vratiti njegovu vrijednost na izlaz.
Instancirati ovu klasu i kreirati jednu formu.

Napomena: Primjer rješenja ovog zadatka možete pogledati unutar repozitorijuma ovog kursa ili na sljedećem linku: https://github.com/amarbeslija/php-development

<?php

class Form{
    public $form;

    public function __construct($method = "GET", $action = "", $enctype = "", $id = ""){
        if(empty($enctype)){
            $enctype = "application/x-www-form-urlencoded";
        }
        $this->form = "<form id=$id method=$method enctype=$enctype $id=id>";
        return $this;
    }

    public function input($type = "text", $name, $required, $value = ""){
        if(!empty($required)){
            $required = "required";
        }
        $this->form .= "<input type=$type name=$name $required>";
        return $this;
    }

    public function label($for, $text){
        $this->form .= "<label for='$for'>$text</label>";
        return $this;
    }

    public function select($name, $required){
        if(!empty($required)){
            $required = "required";
        }
        $this->form .= "<select name=$name $required>";
        return $this;
    }

    public function end_select(){
        $this->form .= "</select>";
        return $this;
    }

    public function option($value, $text, $selected){
        if(!empty($selected)){
            $selected = "selected";
        }

        $this->form .= "<option value='$value' $selected>$text</option>";
        return $this;
    }

    public function textarea($name, $required, $value){
        if(!empty($required)){
            $required = "required";
        }
        $this->form .= "<textarea name='$name' $required>$value</textarea>";
        return $this;
    }

    public function br(){
        $this->form .= "<br>";
        return $this;
    }

    public function end_form(){
        $this->form .= "</form>";
        return $this->form;
    }
}


echo "<hr>";

$form = new Form("POST", "index.php", "", "test");
$form = $form->label("username", "Insert your username")
             ->input("text", "username", true)
             ->br()
             ->label("password", "Insert your password")
             ->input("password", "password", true)
             ->br()
             ->br()
             ->input("submit", "", "", "Log in here!")
             ->end_form();
echo $form;