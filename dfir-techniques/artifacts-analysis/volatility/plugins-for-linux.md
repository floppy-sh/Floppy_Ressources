---
description: List of plugins for Linux profile based on volatility wiki
---

# Plugins for Linux

## Display available plugins

```bash
python3 vol.py -f memory.dmp -h #volatility3
python2 vol.py --profile=LinuxUbuntu2004x64 -f memory.dmp -h #volatility2
```

## Processes

* [linux\_pslist](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_pslist)
* [linux\_psaux](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_psaux)
* [linux\_pstree](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_pstree)
* [linux\_pslist\_cache](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_pslist\_cache)
* [linux\_pidhashtable](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_pidhashtable)
* [linux\_psxview](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_psxview)
* [linux\_lsof](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_lsof)

## Process Memory

* [linux\_memmap](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_memmap)
* [linux\_proc\_maps](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_proc\_maps)
* [linux\_dump\_map](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_dump\_map)
* [linux\_bash](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_bash)

## Kernel Memory and Objects

* [linux\_lsmod](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_lsmod)
* [linux\_moddump](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_moddump)
* [linux\_tmpfs](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_tmpfs)

## Rootkit Detection

* [linux\_check\_afinfo](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_check\_afinfo)
* [linux\_check\_tty](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_check\_tty)
* [linux\_keyboard\_notifier](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_keyboard\_notifier)
* [linux\_check\_creds](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_check\_creds)
* [linux\_check\_fop](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_check\_fop)
* [linux\_check\_idt](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_check\_idt)
* [linux\_check\_syscall](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_check\_syscall)
* [linux\_check\_modules](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_check\_modules)

## Networking

* [linux\_arp](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_arp)
* [linux\_ifconfig](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_ifconfig)
* [linux\_route\_cache](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_route\_cache)
* [linux\_netstat](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_netstat)
* [linux\_pkt\_queues](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_pkt\_queues)
* [linux\_sk\_buff\_cache](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_sk\_buff\_cache)

## System Information

* [linux\_cpuinfo](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_cpuinfo)
* [linux\_dmesg](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_dmesg)
* [linux\_iomem](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_iomem)
* [linux\_slabinfo](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_slabinfo)
* [linux\_mount](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_mount)
* [linux\_mount\_cache](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_mount\_cache)
* [linux\_dentry\_cache](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_dentry\_cache)
* [linux\_find\_file](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_find\_file)
* [linux\_vma\_cache](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_vma\_cache)

## Miscellaneous

* [linux\_volshell](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_volshell)
* [linux\_yarascan](https://github.com/volatilityfoundation/volatility/wiki/Linux-Command-Reference#linux\_yarascan)
