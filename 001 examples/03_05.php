<?php
class Getter {
  private $field_one = "Value One";
  private $field_two = "Value Two";

  public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }
}

$getter = new Getter();
echo $getter->field_one;
?>