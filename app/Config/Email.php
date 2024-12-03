<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public $fromEmail = 'your_email@example.com';  // Replace with your email
    public $fromName = 'Your Application Name';    // Your app's name
    public $SMTPHost = 'smtp.example.com';         // SMTP server host (e.g., smtp.gmail.com)
    public $SMTPUser = 'your_email@example.com';   // SMTP username (same as fromEmail)
    public $SMTPPass = 'your_email_password';      // SMTP password
    public $SMTPPort = 587;                        // SMTP Port (use 465 for SSL, 587 for TLS)
    public $SMTPCrypto = 'tls';                    // Encryption method (tls or ssl)
}

