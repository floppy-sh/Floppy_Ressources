# 📚 Glossary

<details>

<summary>Table of Content</summary>

* [CRLF injection](glossary.md#crlf-injection)
* [CSRF Injection](glossary.md#csrf-injection)
* [CSV Injection](glossary.md#csv-injection)
* [File Inclusion](glossary.md#file-inclusion)
  * [LFI](glossary.md#lfi)
  * [RFI](glossary.md#rfi)
* [SSRF](glossary.md#ssrf)
* [SSTI](glossary.md#ssti)

</details>

## CRLF injection

**Carriage Return Line Feed Injection**

_A Carriage Return Line Feed (CRLF) Injection vulnerability occurs when an application does not sanitize user input correctly and allows for the insertion of carriage returns and line feeds, input which for many internet protocols, including HTML, denote line breaks and have special significance._

> Reference: [OWASP Foundation](https://owasp.org/www-community/vulnerabilities/CRLF\_Injection)

Consequences of a successful CRLF attack can be serious and include:

1. **HTTP response splitting:** An attacker can manipulate the HTTP response by injecting a CRLF sequence, causing the web server to return a malformed response.
2. **Redirection to malicious sites:** An attacker can use CRLF injection to redirect users to a malicious website, potentially exposing them to further attacks.
3. **Information disclosure:** An attacker can use CRLF injection to disclose sensitive information, such as system files, database contents, and application source code.

## CSRF Injection

**Cross Site Request Forgery**

_Cross-Site Request Forgery (CSRF) is an attack that forces an end user to execute unwanted actions on a web application in which they're currently authenticated. An attacker may trick the users of a web application into executing actions of the attacker's choosing._

> Reference: [OWASP Foundation](https://owasp.org/www-community/attacks/csrf)

The consequences of a successful CSRF attack can include:

1. **Unauthorized actions:** An attacker can use a CSRF attack to perform unauthorized actions on behalf of the victim, such as changing their password, making purchases, or transferring funds.
2. **Data theft:** A CSRF attack can be used to steal sensitive information, such as financial data or personal information, from the victim's account.

## CSV Injection

_CSV Injection, also known as Formula Injection, occurs when websites embed untrusted input inside CSV files. When a spreadsheet program such as Microsoft Excel or LibreOffice Calc is used to open a CSV, any cells starting with = will be interpreted by the software as a formula._

> Reference: [OWASP Foundation](https://owasp.org/www-community/attacks/CSV\_Injection)

The consequences of a successful CSV injection attack can include:

1. **Data theft or manipulation:** An attacker can use a CSV injection attack to steal or manipulate sensitive data, such as financial or personal information, that is stored in a vulnerable application.
2. **Unauthorized actions:** An attacker can use a CSV injection attack to perform unauthorized actions, such as adding or modifying records, or triggering malicious code to run within the vulnerable application.

## File Inclusion

### LFI

_Local file inclusion (also known as LFI) is the process of including files, that are already locally present on the server. Allowing directory traversal characters (such as `../`) to be injected._

> Reference: [OWASP Foundation](https://owasp.org/www-project-web-security-testing-guide/v42/4-Web\_Application\_Security\_Testing/07-Input\_Validation\_Testing/11.1-Testing\_for\_Local\_File\_Inclusion)

### RFI

_Remote File Inclusion (also known as RFI) is the process of including remote files through the exploiting of vulnerable inclusion procedures implemented in the application. This vulnerability occurs, for example, when a page receives, as input, the path to the file that has to be included and this input is not properly sanitized, allowing external URL to be injected._

> Reference: [OWASP Foundation](https://owasp.org/www-project-web-security-testing-guide/v42/4-Web\_Application\_Security\_Testing/07-Input\_Validation\_Testing/11.2-Testing\_for\_Remote\_File\_Inclusion)

The consequences of a successful LFI/RFI attack can include:

1. **Information disclosure:** An attacker can use a LFI vulnerability to access sensitive information, such as system files, configuration files, and logs, which can be used to further compromise the system.
2. **Code execution:** An attacker can use a LFI vulnerability to execute malicious code on the vulnerable server, potentially compromising the system and stealing sensitive information.

## XSS

_Cross-Site Scripting (XSS) attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user._

> Reference: [OWASP Foundation](https://owasp.org/www-community/attacks/xss/)

The consequences of a successful XSS attack can include:

1. **Information disclosure:** An attacker can access any cookies, session tokens, or other sensitive information retained by the browser and used with that site.
2. **Code execution:** An attacker could inject scripts that can rewrite the content of the HTML page.

## SSRF

_In a Server-Side Request Forgery (SSRF) attack, the attacker can abuse functionality on the server to read or update internal resources. The vulnerability allows an attacker to induce the server-side application to make HTTP requests to an arbitrary domain of the attacker's choosing._

> Reference: [OWASP Foundation](https://owasp.org/www-community/attacks/Server\_Side\_Request\_Forgery) Reference: [HackTricks](https://book.hacktricks.xyz/pentesting-web/ssrf-server-side-request-forgery)

1. **Information disclosure:** An attacker can use SSRF to access sensitive information, such as internal network configuration, system files, and logs, which can be used to further compromise the system.
2. **Unauthorized access:** An attacker can use SSRF to gain unauthorized access to internal resources, such as databases or other systems, potentially compromising the security of sensitive information.

## SSTI

_Web applications commonly use server side templating technologies (Jinja2, Twig, FreeMaker, etc.) to generate dynamic HTML responses. Server Side Template Injection vulnerabilities (SSTI) occur when user input is embedded in a template in an unsafe manner and results in remote code execution on the server._

> Reference: [OWASP Foundation](https://owasp.org/www-project-web-security-testing-guide/v41/4-Web\_Application\_Security\_Testing/07-Input\_Validation\_Testing/18-Testing\_for\_Server\_Side\_Template\_Injection)

1. **Code execution:** An attacker can use SSTI to execute malicious code on the vulnerable server, potentially compromising the system and stealing sensitive information.
2. **Information disclosure:** An attacker can use SSTI to access sensitive information, such as system files, configuration files, and logs, which can be used to further compromise the system.
