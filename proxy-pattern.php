<?php

// Lazy File Loader Proxy
interface FileInterface {
    public function display(): void;
}

class RealFile implements FileInterface {
    private string $filename;

    public function __construct(string $filename){
        $this->filename = $filename;
        $this->loadFromDisk();
    }

    private function loadFromDisk(){
        echo "Loading {$this->filename} from disk\n";
    }

    public function display(): void {
        echo "Displaying file : {$this->filename}\n";
    }
}

class ProxyFile implements FileInterface {
    private string $filename;
    private ?RealFile $realFile = null;

    public function __construct(string $filename){
        $this->filename = $filename;
    }

    public function display(): void {
        if($this->realFile == null) {
            $this->realFile = new RealFile($this->filename);
        }

        $this->realFile->display();
    }
}

$file = new ProxyFile('test.txt');
echo "Proxy Created\n";
$file->display();
$file->display();

// API Proxy
interface WeatherService {
    public function getTemperature(string $city): float;
}

class RealWeatherService implements WeatherService {
    public function getTemperature(string $city): float {
        echo "Calling real weather API for city\n";
        return rand(-10, 40);
    }
}

class WeatherServiceProxy implements WeatherService {
    private RealWeatherService $realService;
    private array $cache = [];

    public function __construct(){
        $this->realService = new RealWeatherService();
    }

    public function getTemperature(string $city): float {
        if(!isset($this->cache[$city])){
            $this->cache[$city] = $this->realService->getTemperature($city);
        } else {
            echo "Returning cached temperature for $city\n";
        }
        return $this->cache[$city];
    }
}

$weather = new WeatherServiceProxy();
echo "İstanbul: ". $weather->getTemperature('istanbul') ."*C\n";
echo "İstanbul Again: ". $weather->getTemperature('istanbul') ."*C\n";