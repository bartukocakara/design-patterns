<?php

// Targer Interface
interface PaymentInterface{
    public function pay(float $amount);
}

// Adaptee(third-party)
class StripePayment{
    public function makePayment(float $amount){
        echo "Paid " . ($amount / 100) .  "via Stripe\n";
    }
}

class StripePaymentAdapter implements PaymentInterface {
    protected $stripe;

    public function __construct(StripePayment $stripe){
        $this->stripe = $stripe;
    }

    public function pay(float $amount){
        $this->stripe->makePayment($amount * 100);
    }
}

// Client Code
function processPayment(PaymentInterface $payment) {
    $payment->pay(49.50);
}

processPayment(new StripePaymentAdapter(new StripePayment));

// Loglama Örneği
// Target Interface
interface LoggerInterface {
    public function log(string $messages);
}

// Adaptee
class MonologLogger {
    public function writeLog($text) {
        echo "Monolog: " . $text . "\n";
    }
}

// Adapter
class MonologAdapter implements LoggerInterface  {
    protected $monolog;

    public function __construct(MonologLogger $monologLogger){
        $this->monolog = $monologLogger;
    }

    public function log(string $message){
        $this->monolog->writeLog($message);
    }
}

$logger = new MonologAdapter(new MonologLogger());
$logger->log("Log message");

// Database adapteri yapalım
// Target Interface
interface DatabaseAdapterInterface {
    public function connect();
    public function query(string $sql);
}

// Adaptee 1 PDO

class PDOAdapter implements DatabaseAdapterInterface{
    protected $pdo;

    public function connect() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=test", "root", "123456");
    }

    public function query(string $sql) {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Adapte 2: Mysqli
class MysqliAdapter implements DatabaseAdapterInterface{
    protected $mysqli;

    public function connect(){
        $this->mysqli = new mysqli("localhost", "root", "", "test");
    }

    public function query(string $sql) {
        $result = $this->mysqli->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

// client
function runQuery(DatabaseAdapterInterface $db) {
    $db->connect();
    print_r($db->query("SELECT * FROM users"));
}

runQuery(new PDOAdapter);
runQuery(new MysqliAdapter);