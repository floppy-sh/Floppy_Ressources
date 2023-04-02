---
description: List of plugins for Mac profile based on volatility wiki
---

# Plugins for Mac

## Display available plugins

```bash
python3 vol.py -f memory.dmp -h #volatility3
python2 vol.py --profile=MacMountainLion_10_8_1_AMDx64 -f memory.dmp -h #volatility2
```

## Profile Finding

* [mac\_get\_profile](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_get\_profile)

## Processes

* [mac\_pslist](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_pslist)
* [mac\_tasks](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_tasks)
* [mac\_pstree](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_pstree)
* [mac\_lsof](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_lsof)
* [mac\_pgrp\_hash\_table](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_pgrp\_hash\_table)
* [mac\_pid\_hash\_table](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_pid\_hash\_table)
* [mac\_psaux](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_psaux)
* [mac\_dead\_procs](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_dead\_procs)
* [mac\_psxview](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_psxview)

## Process Memory

* [mac\_proc\_maps](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_proc\_maps)
* [mac\_dump\_maps](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_dump\_maps)

## Kernel Memory and Objects

* [mac\_list\_sessions](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_list\_sessions)
* [mac\_list\_zones](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_list\_zones)
* [mac\_lsmod](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_lsmod)
* [mac\_mount](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_mount)

## Networking

* [mac\_arp](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_arp)
* [mac\_ifconfig](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_ifconfig)
* [mac\_netstat](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_netstat)
* [mac\_route](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_route)

## Malware/Rootkits

* [mac\_check\_sysctl](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_check\_sysctl)
* [mac\_check\_syscalls](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_check\_syscalls)
* [mac\_check\_trap\_table](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_check\_trap\_table)
* [mac\_ip\_filters](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_ip\_filters)
* [mac\_notifiers](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_notifiers)
* [mac\_trustedbsd](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_trustedbsd)

## System Information

* [mac\_dmesg](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_dmesg)
* [mac\_find\_aslr\_shift](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_find\_aslr\_shift)
* [mac\_machine\_info](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_machine\_info)
* [mac\_version](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_version)
* [mac\_print\_boot\_cmdline](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_print\_boot\_cmdline)

## Miscellaneous

* [mac\_volshell](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_volshell)
* [mac\_yarascan](https://github.com/volatilityfoundation/volatility/wiki/Mac-Command-Reference#mac\_yarascan)
