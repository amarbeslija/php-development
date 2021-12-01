<?php
class GetterSetter {
  private $field_one;
  private $field_two;

  public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
  }

  public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }

    return $this;
  }
}

$getter_setter = new GetterSetter();
$getter_setter->field_one = "Some value!";
echo $getter_setter->field_one;
?>