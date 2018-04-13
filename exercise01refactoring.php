<?php

interface Refrigerator {
  public function add($beverage);
}

class IceBoxRefrigerator implements Refrigerator{
    public $height, $width, $depth;
    public function add($beverage) { }
}

class BrokenRefrigerator implements Refrigerator{
    public $height, $width, $depth;
    public function add($beverage) { }
}

interface Beverage {}

class RootBeer implements Beverage { }
class Kombucha implements Beverage { }

class Kitchen {

    private $refrigerator;

    public function __construct() {
        $this->refrigerator = new IceBoxRefrigerator();
    }

    public function addBeverageToRefrigerator(Beverage $beverage) {
        $this->refrigerator->add( $beverage );
    }

    public function __toString() {
        $fridgeVolume = ($this->refrigerator->height * $this->refrigerator->width * $this->refrigerator->depth);
        $fridgeVolumeGallons = $fridgeVolume * 7.48052;
        return "Kitchen. Fridge volume = " . $fridgeVolumeGallons . " gallons";
    }

}

// Current usage example:

$kitchen = new Kitchen();
$kitchen->addBeverageToRefrigerator(new RootBeer());
echo (string)$kitchen;

// $kitchen has an IceBoxRefrigerator with a RootBeer in it.

// Problem: you can't create a kitchen with a different fridge, and you can't
//          add any beverage other than beer.

// Goal: Create a kitchen with a BrokenRefrigerator, and add Kombucha to it.

?>

