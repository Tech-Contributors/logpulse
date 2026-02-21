# TechContributors Audit Logger

Simple and lightweight audit logging for Laravel applications.

Log important actions from your application and send them securely to your centralized logging service.

---

## 🚀 Installation

Install the package via Composer:

```bash
composer require techcontributors/logpulse
```

---

## ⚙️ Publish Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=log-pulse-config
```

This will create:

config/log-pulse.php

---

## 🔑 Environment Setup

Add the following to your `.env` file:

```env
LOG_PULSE_ENABLED=true
LOG_PULSE_API_KEY=your_api_key_here
```

---

## 🧠 Configuration Options

| Option | Description |
|---|---|
| LOG_PULSE_ENABLED | Enable or disable logging |
| LOG_PULSE_API_KEY | Your application API key |

---

## ✍️ Usage

You can log any action using the LogPulse facade.

```php
use LogPulse;

LogPulse::log(
    'User Login',  //action
    'Auth', //resource
    2, //app id 
    [
        'user_id' => auth()->id(),
        'ip' => request()->ip(),
        'message' => 'User accessed the logs page'
    ] //meta
);
```

---

## ✅ Example Use Cases

- User created / updated / deleted
- Order placed or cancelled
- Admin actions
- Authentication events
- Any custom business activity

---

## 📄 License

MIT License.