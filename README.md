# CSRF Demonstration Example

## Overview

This example demonstrates a Cross-Site Request Forgery (CSRF) attack using PHP, SQLite, and HTML. It consists of a vulnerable website and a malicious website that performs the attack.

## Directory Structure
```
csrf_demo/
├── README.md
├── db.sqlite
├── vulnerable/
│   ├── index.php
│   ├── change_email.php
│   └── db.php
└── malicious/
    └── attack.html
    └── ifram_attack.html
```
## Setup and Running the Example

### Prerequisites

- **PHP** installed on your system.
- **SQLite** installed.
- A local web server (e.g., Apache) or use PHP's built-in server.

### Steps

1. **Clone or Download the Repository:**

   Navigate to your desired directory and clone the example.

   ```bash
   git clone <repository_url> csrf_demo
    ```
2. **Terminal 1**
    ```bash
    cd vulnerable
    php -S localhost:8000
	```
3. **Terminal 2**
    ```bash
	cd malicious
	php -S localhost:8001
	```
4. **Access vulnerable website**

	Open your browser and navigate to http://localhost:8000/index.php. This page displays the current email and includes a form to change it.

5. **Access malicious website**

In a new tab, navigate to http://localhost:8001/attack.html. This page loads an iframe (iframe_attack.html) that automatically submits a POST request to the vulnerable site to change the user's email.

6. ** Refresh the vulnerable website and check the attack **

Go back to the vulnerable website tab (http://localhost:8000/index.php) and refresh the page. The email has now changed to attacker@example.com and you have become a victim! :))

**Fix the attack**
Uncomment the commented code inside all the files from /vulnerable/

**Important Note**
This example is for educational purposes only. Do not deploy or test these vulnerabilities on production systems or without proper authorization. Always follow best security practices to protect web applications from such attacks.

