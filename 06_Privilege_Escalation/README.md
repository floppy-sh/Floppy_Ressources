# Privilege Escalation

- [Privilege Escalation](#privilege-escalation)
  - [Linux](#linux)
    - [Check Local Privesc](#check-local-privesc)
      - [linPEAS](#linpeas)
  - [Windows](#windows)
    - [Check Local Privesc](#check-local-privesc-1)
      - [winPEAS](#winpeas)
      - [PrivescCheck](#privesccheck)
      - [Windows Exploit Suggester - Next Generation (WES-NG)](#windows-exploit-suggester---next-generation-wes-ng)
    - [Impersonation](#impersonation)
      - [JuicyPotatoNG](#juicypotatong)

## Linux

### Check Local Privesc

#### linPEAS

LinPEAS is a script that search for possible paths to escalate privileges on Linux/Unix*/MacOS hosts. The checks are explained on [book.hacktricks.xyz](https://book.hacktricks.xyz/linux-hardening/privilege-escalation).

> **linPEAS:** https://github.com/carlospolop/PEASS-ng/tree/master/linPEAS

## Windows

### Check Local Privesc

#### winPEAS

Check the Local Windows Privilege Escalation checklist from [book.hacktricks.xyz](https://book.hacktricks.xyz/windows-hardening/checklist-windows-privilege-escalation).

> **winPEAS:** https://github.com/carlospolop/PEASS-ng/tree/master/winPEAS

#### PrivescCheck

This script aims to enumerate common Windows configuration issues that can be leveraged for local privilege escalation. It also gathers various information that might be useful for exploitation and/or post-exploitation.

> **PrivescCheck:** https://github.com/itm4n/PrivescCheck

#### Windows Exploit Suggester - Next Generation (WES-NG)

WES-NG is a tool based on the output of Windows' `systeminfo` utility which provides the list of vulnerabilities the OS is vulnerable to, including any exploits for these vulnerabilities. Every Windows OS between Windows XP and Windows 11, including their Windows Server counterparts, is supported.

> **WES-NG:** https://github.com/bitsadmin/wesng

### Impersonation

#### JuicyPotatoNG

Allow a Windows Service Accounts to privesc to NT AUTHORITY\SYSTEM when `SeImpersonate` or `SeAssignPrimaryToken` privilege are enabled.

```bash
# Get a shell on the machine
.\JuicyPotatoNG.exe -t * -p "C:\windows\system32\cmd.exe" -i
```

> **JuicyPotatoNG:** https://github.com/ohpe/juicy-potato