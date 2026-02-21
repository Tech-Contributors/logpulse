# TechContributors LogPulse

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
    'User Login',   // action
    'Auth',         // resource
    [               // meta (optional extra data)
        'user_id' => auth()->id(),
        'ip' => request()->ip(),
        'message' => 'User accessed logs page'
    ],
    auth()->id()    // app user id (optional)
);
```

---

## 📌 Parameters

| Parameter | Required | Description |
|---|---|---|
| action | Yes | What happened |
| resource | Yes | Where it happened |
| meta | No | Extra contextual data |
| appUserId | No | Application user ID |

---

## ✅ Example Use Cases

- User login / logout tracking  
- Model create / update / delete  
- Order actions  
- Admin activities  
- Security monitoring  
- Custom business events  

---

## 💡 Notes

- Logging runs safely in background when queue is enabled.
- If queue worker is not running, logs will still be processed.
- No database setup required.

---