<!-- James Martinez
CS 362 - Exercise 2 -->

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

    public function __construct(Refrigerator $refrigerator) {
        $this->refrigerator = $refrigerator;
    }

    //we can just add any beverage

    public function addBeverageToRefrigerator(Beverage $beverage) {
        $this->refrigerator->add( $beverage );
    }

    //or be more specific

    public function addBeerToRefrigerator(RootBeer $rootbeer) {
      $this->refrigerator->add( $rootbeer );
    }

    public function addKombuchaToRefrigerator(Kombucha $kombucha) {
      $this->refrigerator->add( $kombucha );
    }

    public function calculateFridgeVolume() {
      return $this->refrigerator->height * $this->refrigerator->width * $this->refrigerator->depth;
    } 

    public function calculateFridgeVolumeGallons($fridgeVolume) {
      return $fridgeVolume * 7.48052;
    }

    public function __toString() {
        $fridgeVolume = $this->calculateFridgeVolume();
        $fridgeVolumeGallons = $this->calculateFridgeVolumeGallons($fridgeVolume);
        return "Kitchen. Fridge volume = " . $fridgeVolumeGallons . " gallons";
    }

}

// Current usage example:

$kitchen = new Kitchen(new IceBoxRefrigerator());
$kitchen->addBeerToRefrigerator(new RootBeer());
echo (string)$kitchen;

// $kitchen has an IceBoxRefrigerator with a RootBeer in it.

// Problem: you can't create a kitchen with a different fridge, and you can't
//          add any beverage other than beer.

// Goal: Create a kitchen with a BrokenRefrigerator, and add Kombucha to it.
$kitchenWithBrokenFridge1 = new Kitchen(new BrokenRefrigerator());
$kitchenWithBrokenFridge1->addKombuchaToRefrigerator(new Kombucha());

$kitchenWithBrokenFridge2 = new Kitchen(new BrokenRefrigerator());
$kitchenWithBrokenFridge2->addBeverageToRefrigerator(new Kombucha());

?>

