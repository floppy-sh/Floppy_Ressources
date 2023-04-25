# Profile

Volatility uses an operating system (OS) based profile to obtain memory information. Volatility 3 will automatically recognize the OS based on symbol table of the OS. For Volatility 2, the profile must be specified on the command line.

## Volatility3

To get more symbol table of OS, insert them in **volatility3/volatility/symbols** via link above :

* [Windows](https://downloads.volatilityfoundation.org/volatility3/symbols/windows.zip)
* [Linux](https://downloads.volatilityfoundation.org/volatility3/symbols/linux.zip)
* [Mac](https://downloads.volatilityfoundation.org/volatility3/symbols/mac.zip)

## Volatility2

### Get profile name

* **Windows**

```bash
python2 vol.py -f memory.dmp imageinfo
```

* **Mac**

```bash
python2 vol.py -f memory.dmp mac_get_profile
```

* **Linux**

```bash
strings memory.dmp | grep -E "Linux version [0-9]"
```

```bash
cat memory.dmp | grep -iB 1 "Codename:" | tail -n+10
```

### Available / Downloadable profile&#x20;

To see available profile :

```bash
python2 vol.py -h
python2 vol.py --info
```

If the profile is not available in the list of profiles provided by volatility :

1. Download the profile via [volatility profiles provided](https://github.com/volatilityfoundation/profiles)
2. Insert the zip file in **volatility2/volatility/plugins/overlays/**mac or linux

### Create Linux profile

In the case of a Linux profile not directly downloadable, it is possible to create it.

#### What contains What does a Linux volatility profile contain?

It is a zip containing two things, a module.dwarf file and a System.map file.

File `System.map` :

> In Linux, the System.map file is a symbol table used by the kernel.\
> A symbol table is a look-up between symbol names and their addresses in memory. A symbol name may be the name of a variable or the name of a function. The System.map is required when the address of a symbol name, or the symbol name of an address, is needed. It is especially useful for debugging kernel panics and kernel oopses. The kernel does the address-to-name translation itself when CONFIG\_KALLSYMS is enabled so that tools like ksymoops are not required.\
> [https://en.wikipedia.org/wiki/System.map](https://en.wikipedia.org/wiki/System.map)

File `module.dwarf` :

> DWARF is a widely used, standardized debugging data format. DWARF was originally designed along with Executable and Linkable Format (ELF), although it is independent of object file formats. The name is a medieval fantasy complement to "ELF" that had no official meaning, although the backronym "Debugging With Arbitrary Record Formats" has since been proposed.\
> [https://en.wikipedia.org/wiki/DWARF](https://en.wikipedia.org/wiki/DWARF)

#### Profile creation using Docker

1. **Replace the automatic kernel detection** with a static value, which is your target linux kernel, in this case it will be profile for **ubuntu linux 5.4.0-59-generic**

```bash
cd volatility2/tools/linux/
sed -i 's/$(shell uname -r)/5.4.0-59-generic/g' Makefile
```

2. **Run a docker container** that matches the target operating system&#x20;

```bash
docker run -it --rm -v $PWD:/volatility ubuntu:20.04 /bin/bash
apt update && apt install -y linux-image-5.4.0-59-generic linux-headers-5.4.0-59-generic build-essential dwarfdump make zip
```

3. **Create the dwarf file** with the volatility tool

```bash
cd /volatility/
make
```

4. Create a **zip archive** containing the dwarf file and the System map

```bash
zip Ubuntu2004.zip module.dwarf /boot/System.map-5.4.0-59-generic
```

You now have an Ubuntu1604.zip archive containing the correct profile.

5. **Extract the zip file** to the host

```bash
exit
docker cp CONTAINER ID:/volatility/ ./<folder_on_the_host>
```

6. **Copy the zip file** to volatility profile folder

```bash
cp Ubuntu2004.zip volatility2/volatility/plugins/overlays/linux/
```

### Use profile

Indicates the profile on the command line

```bash
python2 vol.py --profile=Win7SP1x64 -f memory.dmp -h
```

```bash
python2 vol.py --profile=LinuxUbuntu2004x64 -f memory.dmp -h
```

```bash
python2 vol.py --profile=MacMountainLion_10_8_1_AMDx64 -f memory.dmp -h
```
