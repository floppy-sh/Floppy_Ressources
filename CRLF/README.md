# CRLF injection

- [CRLF injection](#crlf-injection)
  - [Exploitation Tricks](#exploitation-tricks)
  - [Exploits](#exploits)
    - [HTTP Response Splitting](#http-response-splitting)
    - [CRLF chained with Open Redirect](#crlf-chained-with-open-redirect)
    - [CRLF Injection to XSS](#crlf-injection-to-xss)
    - [Filter Bypass](#filter-bypass)
  - [References](#references)

## Exploitation Tricks

- Try to search for parameters that lead to redirects and fuzz them
- Also test the mobile version of the website, sometimes it is different or uses a different backend

## Exploits

### HTTP Response Splitting
### CRLF chained with Open Redirect
### CRLF Injection to XSS
### Filter Bypass

## References

- PayloadAllTheThings: https://swisskyrepo.github.io/PayloadsAllTheThingsWeb/CRLF%20Injection/
- Hacktricks: https://book.hacktricks.xyz/pentesting-web/crlf-0d-0a