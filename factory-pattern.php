<?php
// Oyun geliştirmede karakter oluşturma odaklı factory pattern örneği
interface Character {
    public function attack(): void;
}

class Warrior implements Character {
    public function attack(): void {
        echo "Warrior attacks with a sword\n";
    }
}

class Archer implements Character {
    public function attack(): void {
        echo "Archer attacks with a bow\n";
    }
}

class CharacterFactory {
    public static function create(string $type): Character {
        return match ($type) {
            'warrior' => new Warrior(),
            'archer' => new Archer(),
            default => throw new Exception("Invalid character type"),
        };
    }
}

$char = CharacterFactory::create('warrior');
$char->attack();

// Ulaştırma servisi örneği
// Use case: E-commerce shipping calculation, extensible for new providers.
interface ShippingMethod {
    public function calculateCost(float $weight): float;
}

class FedExShipping implements ShippingMethod {
    public function calculateCost(float $weight): float {
        return $weight * 1.2;
    }
}

class DHLShipping implements ShippingMethod {
    public function calculateCost(float $weight): float {
        return $weight * 1.5;
    }
}

class ShippingFactory {
    public static function create(string $provider) : ShippingMethod {
        return match ($provider) {
            'fedex' => new FedExShipping(),
            'dhl' => new DHLShipping(),
            default => throw new Exception("Invalid shipping provider"),
        };
    }
}

$shipping = ShippingFactory::create('fedex');
echo "Shipping cost : " . $shipping->calculateCost(10). "\n";

//Generate invoices in different formats — useful for export modules.
interface InvoiceExporter {
    public function export(array $data): string;
}

class PdfInvoiceExporter implements InvoiceExporter {
    public function export(array $data): string {
        return "PDF invoice data: ". json_encode($data);
    }
}

class CsvExporter implements InvoiceExporter {
    public function export(array $data): string {
        return "CSV invoice data: ". json_encode($data);
    }
}

class InvoiceFactory {
    public static function create(string $format) : InvoiceExporter {
        return match (strtolower($format)){
            'pdf' => new PdfInvoiceExporter(),
            'csv' => new CsvExporter(),
            default => throw new Exception("Invalid invoice format"),
        };
    }
}

$exporter = InvoiceFactory::create('pdf');
echo $exporter->export(['amount' => 100, 'customer' => 'John Doe']);