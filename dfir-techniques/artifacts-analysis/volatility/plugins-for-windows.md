---
description: List of plugins for Windows profile based on volatility wiki
---

# Plugins for Windows

## Display available plugins&#x20;

```bash
python3 vol.py -f memory.dmp -h #volatility3 
python2 vol.py --profile=Win7SP1x64 -f memory.dmp -h #volatility2
```

## Image Identification

* [imageinfo](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#imageinfo)
* [kdbgscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#kdbgscan)
* [kpcrscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#kpcrscan)

## Processes and DLLs

* [pslist](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#pslist)
* [pstree](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#pstree)
* [psscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#psscan)
* [psdispscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#psdispscan)
* [dlllist](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#dlllist)
* [dlldump](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#dlldump)
* [handles](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#handles)
* [getsids](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#getsids)
* [cmdscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#cmdscan)
* [consoles](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#consoles)
* [privs](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#privs)
* [envars](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#envars)
* [verinfo](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#verinfo)
* [enumfunc](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#enumfunc)

## Process Memory

* [memmap](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#memmap)
* [memdump](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#memdump)
* [procdump](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#procdump)
* [vadinfo](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#vadinfo)
* [vadwalk](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#vadwalk)
* [vadtree](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#vadtree)
* [vaddump](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#vaddump)
* [evtlogs](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#evtlogs)
* [iehistory](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#iehistory)

## Kernel Memory and Objects

* [modules](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#modules)
* [modscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#modscan)
* [moddump](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#moddump)
* [ssdt](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#ssdt)
* [driverscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#driverscan)
* [filescan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#filescan)
* [mutantscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#mutantscan)
* [symlinkscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#symlinkscan)
* [thrdscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#thrdscan)
* [dumpfiles](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#dumpfiles)
* [unloadedmodules](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#unloadedmodules)

## Networking

* [connections](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#connections)
* [connscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#connscan)
* [sockets](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#sockets)
* [sockscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#sockscan)
* [netscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#netscan)

## Registry

* [hivescan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#hivescan)
* [hivelist](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#hivelist)
* [printkey](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#printkey)
* [hivedump](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#hivedump)
* [hashdump](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#hashdump)
* [lsadump](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#lsadump)
* [userassist](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#userassist)
* [shellbags](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#shellbags)
* [shimcache](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#shimcache)
* [getservicesids](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#getservicesids)
* [dumpregistry](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#dumpregistry)

## Crash Dumps, Hibernation, and Conversion

* [crashinfo](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#crashinfo)
* [hibinfo](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#hibinfo)
* [imagecopy](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#imagecopy)
* [raw2dmp](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#raw2dmp)
* [vboxinfo](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#vboxinfo)
* [vmwareinfo](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#vmwareinfo)
* [hpakinfo](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#hpakinfo)
* [hpakextract](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#hpakextract)

## File System

* [mbrparser](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#mbrparser)
* [mftparser](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#mftparser)

## Miscellaneous

* [strings](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#strings)
* [volshell](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#volshell)
* [bioskbd](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#bioskbd)
* [patcher](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#patcher)
* [pagecheck](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#pagecheck)
* [timeliner](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference#timeliner)

## GUI

* [sessions](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Gui#sessions)
* [wndscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Gui#wndscan)
* [deskscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Gui#deskscan)
* [atomscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Gui#atomscan)
* [atoms](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Gui#atoms)
* [clipboard](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Gui#clipboard)
* [eventhooks](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Gui#eventhooks)
* [gahti](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Gui#gahti)
* [messagehooks](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Gui#messagehooks)
* [userhandles](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Gui#userhandles)
* [screenshot](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Gui#screenshot)
* [gditimers](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Gui#gditimers)
* [windows](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Gui#windows)
* [wintree](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Gui#wintree)

## Malware

* [malfind](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Mal#malfind)
* [yarascan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Mal#yarascan)
* [svcscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Mal#svcscan)
* [ldrmodules](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Mal#ldrmodules)
* [impscan](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Mal#impscan)
* [apihooks](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Mal#apihooks)
* [idt](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Mal#idt)
* [gdt](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Mal#gdt)
* [threads](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Mal#threads)
* [callbacks](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Mal#callbacks)
* [driverirp](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Mal#driverirp)
* [devicetree](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Mal#devicetree)
* [psxview](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Mal#psxview)
* [timers](https://github.com/volatilityfoundation/volatility/wiki/Command-Reference-Mal#timers)
