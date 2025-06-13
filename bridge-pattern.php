<?php

// Notification System
interface Notifier {
    public function send(string $title, string $message): void;
}

class EmailNotifier implements Notifier {
    public function send(string $title, string $message): void {
        echo "Email $title - $message\n";
    }
}

class SmsNotifier implements Notifier {
    public function send(string $title, string $message) : void {
        echo "SMS $title - $message\n";
    }
}

abstract class Notification {
    protected Notifier $notifier;

    public function __construct(Notifier $notifier) {
        $this->notifier = $notifier;
    }

    abstract public function notify(string $title, string $message): void;
}

class AlertNotification extends Notification {
    public function notify(string $title, string $message): void {
        $this->notifier->send("[ALERT] $title", $message);
    }
}

class InfoNotification extends Notification {
    public function notify(string $title, string $message): void {
        $this->notifier->send("[INFO] $title", $message);
    }
}

$alert = new AlertNotification(new EmailNotifier());
$info = new InfoNotification(new SmsNotifier());

$alert->notify("Disk Full", "the /var partition is full");
$info->notify("Welcome", "thanks for signing up");


// File Exporter

interface Exporter {
    public function export(array $data): string;
}

class PdfExporter implements Exporter {
    public function export(array $data): string {
        return "Exported ". count($data) . " items to PDF\n";
    }
}

class CsvExporter implements Exporter {
    public function export(array $data): string {
        return "Exported ". count($data). " items to CSV";
    }
}

abstract class Document {
    protected Exporter $exporter;

    public function __construct(Exporter $exporter) {
        $this->exporter = $exporter;
    }

    abstract public function output(): string;
}

class ReportDocument extends Document {
    public function output(): string {
        $data = ['type' => 'report', 'content' => 'This is a report'];
        return $this->exporter->export($data);
    }
}

class InvoiceDocument extends Document {
    public function output(): string {
        $data = ['type' => 'invoice', 'content' => 'This is an invoice'];
        return $this->exporter->export($data);
    }
}

$invoice = new InvoiceDocument(new PdfExporter());
echo $invoice->output();

$report = new ReportDocument(new CsvExporter());
echo $report->output();
