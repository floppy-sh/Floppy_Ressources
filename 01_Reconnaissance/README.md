# Reconnaissance

- [Reconnaissance](#reconnaissance)
  - [DNS](#dns)
    - [NMAP script](#nmap-script)
    - [nslookup](#nslookup)
    - [DNS Zone transfer](#dns-zone-transfer)

## DNS

### NMAP script

```bash
# get all nmap dns scripts
ls /usr/share/nmap/scripts | grep dns | cut -d'.' -f 1 | tr '\n' ',' | sed 's/.$//'

# start nmap w/ all scripts
nmap -vvvv --script=<ALL_SCRIPTS> $IP_ADDRESS -p 53
```

### nslookup

Get Domain Name using `nslookup`

```sh
nslookup
> SERVER $IP_ADDRESS
[...]
> $IP_ADDRESS
[...]
```

### DNS Zone transfer

```sh
dig axfr @$IP_ADDRESS DNS
```