# 🧠 PHP Design Patterns — Adapter, Bridge, Proxy

This repository showcases clean and real-world PHP implementations of three classic **Structural Design Patterns**:

- 🧩 Adapter Pattern
- 🌉 Bridge Pattern
- 🛡️ Proxy Pattern

Each pattern is demonstrated with **multiple use cases**, comments, and practical structure for faster understanding.

---

## 🧩 Adapter Pattern

> **Purpose:** Converts the interface of a class into another interface the client expects. Used to **integrate incompatible interfaces**.

### ✔️ Use Cases
- Integrating **third-party libraries** (e.g., Stripe, Monolog)
- Wrapping **legacy code** to work with new systems

### 🗂️ Examples
- `StripePaymentAdapter`: Adapts Stripe to your `PaymentInterface`
- `LoggerAdapter`: Makes `Monolog` compatible with your own logger
- `DatabaseAdapter`: Allows switching between `PDO` and `MySQLi`

📁 Folder: `/Adapter`

---

## 🌉 Bridge Pattern

> **Purpose:** Decouples abstraction from its implementation so both can **evolve independently**.

### ✔️ Use Cases
- Decoupling **message types** from **delivery channels**
- Building **UI renderers** across multiple output formats
- Exporting data in **various formats**

### 🗂️ Examples
- `AlertMessage` + `EmailSender`
- `InvoiceDocument` + `CSVExporter`

📁 Folder: `/Bridge`

---

## 🛡️ Proxy Pattern

> **Purpose:** Provides a **surrogate or placeholder** to control access, add caching, lazy loading, or access control logic.

### ✔️ Use Cases
- **Virtual proxies** to delay resource-intensive tasks
- **Protection proxies** to restrict access
- **Remote/caching proxies** for optimizing API calls

### 🗂️ Examples
- `ProxyFile`: Loads large files only when needed
- `WeatherServiceProxy`: Caches external API responses

📁 Folder: `/Proxy`

---

## 🛠️ How to Run

```bash
php adapter-pattern.php
php bridge-pattern.php
php proxy-pattern.php
