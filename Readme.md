🧠 PHP Design Patterns — Adapter, Bridge, Proxy, Strategy, Observer, Factory
This repository showcases clean and real-world PHP implementations of six essential design patterns — three structural and three behavioral/creational patterns.

🔹 Structural Patterns:
🧩 Adapter Pattern

🌉 Bridge Pattern

🛡️ Proxy Pattern

🔸 Behavioral & Creational Patterns:
🧠 Strategy Pattern

👁️ Observer Pattern

🏭 Factory Pattern

Each pattern is demonstrated with practical examples, rich comments, and real-world scenarios to make learning and usage faster and clearer.

🧩 Adapter Pattern
Purpose: Converts the interface of a class into another interface the client expects. Useful when integrating incompatible interfaces.

✔️ Use Cases:

Integrating third-party libraries (e.g., Stripe, Monolog)

Wrapping legacy code to work with new systems

🗂️ Examples:

StripePaymentAdapter: Adapts Stripe to your PaymentInterface

LoggerAdapter: Makes Monolog compatible with your own logger

DatabaseAdapter: Allows switching between PDO and MySQLi

📁 Folder: /Adapter

🌉 Bridge Pattern
Purpose: Decouples abstraction from its implementation so both can vary independently.

✔️ Use Cases:

Decoupling message types from delivery channels

Building UI renderers across multiple output formats

Exporting data in various formats

🗂️ Examples:

AlertMessage + EmailSender

InvoiceDocument + CSVExporter

📁 Folder: /Bridge

🛡️ Proxy Pattern
Purpose: Provides a surrogate or placeholder to control access, add caching, lazy loading, or access control logic.

✔️ Use Cases:

Virtual proxies to delay resource-intensive tasks

Protection proxies to restrict access

Remote/caching proxies for optimizing API calls

🗂️ Examples:

ProxyFile: Loads large files only when needed

WeatherServiceProxy: Caches external API responses

📁 Folder: /Proxy

🧠 Strategy Pattern
Purpose: Defines a family of algorithms, encapsulates each one, and makes them interchangeable.

✔️ Use Cases:

Switching between multiple payment methods (CreditCard, PayPal, Crypto)

Providing different sorting/compression behaviors

🗂️ Examples:

PaymentContext using StripeStrategy, PayPalStrategy

Sorter with strategies like QuickSort, MergeSort

📁 Folder: /Strategy

👁️ Observer Pattern
Purpose: A subject maintains a list of observers and notifies them automatically of any state changes.

✔️ Use Cases:

MVC architectures: updating views when models change

Event-driven systems

Real-time notifications

🗂️ Examples:

WeatherStation → notifies Display, Logger observers on update

📁 Folder: /Observer

🏭 Factory Pattern
Purpose: Encapsulates object creation logic and allows subclasses to decide which class to instantiate.

✔️ Use Cases:

Creating objects dynamically based on config/state

Managing complex object creation logic (e.g., car types, search providers)

🗂️ Examples:

SearchFactory: Produces GoogleSearch, BingSearch objects

CarFactory: Instantiates SUV, Sedan types

📁 Folder: /Factory

🛠️ How to Run
```
php adapter-pattern.php
php bridge-pattern.php
php proxy-pattern.php
php strategy-pattern.php
php observer-pattern.php
php factory-pattern.php
```
🧪 Why Use These Patterns?
Design patterns aren't just for theory. They make your code:

Easier to test

Easier to extend

More aligned with SOLID principles

But: Don’t over-engineer. Use them where abstraction or flexibility truly provides long-term benefit.