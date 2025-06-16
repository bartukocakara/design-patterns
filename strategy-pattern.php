<?php
// Use case: Dynamic pricing logic in court reservation or e-commerce systems.
interface PricingStrategyInterface {
    public function calculatePrice(float $price): float;
}

class RegularPricing implements PricingStrategyInterface {
    public function calculatePrice(float $basePrice): float {
        return $basePrice;
    }
}

class WeekendPricing implements PricingStrategyInterface {
    public function calculatePrice(float $basePrice): float {
        return $basePrice * 1.2; // +%20 on weekends
    }
}

class SpecialEventPricing implements PricingStrategyInterface {
    public function calculatePrice(float $basePrice): float {
        return $basePrice * 1.5; // +%50 on special events
    }
}

class CourtRental {
    public function __construct(private PricingStrategyInterface $pricingStrategy) {}

    public function getPrice(float $base): float {
        return $this->pricingStrategy->calculatePrice($base);
    }
}

$rental = new CourtRental(new WeekendPricing());
echo "Total :" . $rental->getPrice(100). "\n"; 

// Switch character movement logic dynamically (e.g., walking vs flying).
interface MovementStrategyInterface {
    public function move(): string;
}

class WalkMovement implements MovementStrategyInterface {
    public function move(): string {
        return "Walking on the ground";
    }
}

class FlyMovement implements MovementStrategyInterface {
    public function move(): string {
        return "Flying through the air";
    }
}

class GameCharacter {
    public function __construct(private MovementStrategyInterface $movementStrategy) {}

    public function setStrategy(MovementStrategyInterface $movementStrategy) {
        $this->movementStrategy = $movementStrategy;
    }

    public function move(): void {
        echo $this->movementStrategy->move(). "\n";
    }
}

$player = new GameCharacter(new WalkMovement());
$player->move(); // Walking on the ground

$player->setStrategy(new FlyMovement());
$player->move(); // Flying throuhgh the air

// Use case: Region/product-specific pricing logic in e-commerce, accounting apps.

interface TaxStrategy {
    public function calculate(float $amount) : float;
}

class NoTax implements TaxStrategy {
    public function calculate(float $amount): float {
        return $amount;
    }
}

class StandartTax implements TaxStrategy {
    public function calculate(float $amount): float {
        return $amount * 1.18;
    }
}

class LuxuryTax implements TaxStrategy{
    public function calculate(float $amount): float {
        return $amount * 1.28;
    }
}

class Checkout {
    public function __construct(private TaxStrategy $taxStrategy ) {}

    public function getTotal(float $subTotal) : float {
        return $this->taxStrategy->calculate($subTotal);
    }
}

$checkout = new Checkout(new StandartTax());
echo "Total: ". $checkout->getTotal(100). "\n"; // 118

$checkout = new Checkout(new LuxuryTax());
echo "Total: ". $checkout->getTotal(100). "\n"; // 128