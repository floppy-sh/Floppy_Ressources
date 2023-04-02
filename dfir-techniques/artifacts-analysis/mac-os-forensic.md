---
description: Useful command for MAC OS analysis
---

# MAC OS Forensic

## MAC OS Artifacts

Here is a useful [spreadsheet](https://docs.google.com/spreadsheets/d/1X2Hu0NE2ptdRj023OVWIGp5dqZOw-CfxHLOW\_GNGpX8/edit#gid=5) with many MAC OS X Forensic artifacts to inspect according to MAC OS version.

## Dump file system

```bash
python2 vol.py --profile=MacMountainLion_10_8_1_AMDx64 -f memory.dmp mac_recover_filesystem --dump-dir <dir>
```

## Decrypt Keychain

#### 1. Extract the login keychain file

The keychain file has the following location : _**Users//Library/Keychains/login.keychain**_

#### 2. Dump the keychain key from memory

```bash
python2 vol.py --profile=MacMountainLion_10_8_1_AMDx64 -f memory.dmp mac_keychaindump
```

#### 3. Decrypt keychain

{% embed url="https://github.com/n0fate/chainbreaker" %}
chainbreaker tool
{% endembed %}

```bash
python2 chainbreaker.py --key <key> <path_to_logikeychain> -a
```

## Mount encrypted partition

#### 1. Find start sector and size

```bash
fdisk -l encrypted_partition.raw 
```

```bash
Device                  Start     End Sectors  Size Type
encrypted_partition.raw1    40 1048535 1048496  512M Apple Core storage
```

#### 2. Find the mac key partition

{% embed url="https://github.com/tribalchicken/volatility-filevault2/blob/master/plugins/mac/filevault2.py" %}
filevault2 volatility plugin
{% endembed %}

```bash
python2 vol.py --profile=MacMountainLion_10_8_1_AMDx64 -f memory.dmp mac_filevault2
```

#### 3. Mount the encrypted partition with key

```bash
fvdemount -k <key> -o $((40*512)) encrypted_partition.raw /media/hfs/
```

A file named fvde1, corresponding to the HFS+ partition, appears under the mount point. Access to the data of this partition will be possible after mounting the file fvde1 on a new mount point.

#### 4. Mount the HFS+ partition

```bash
mount -o loop,ro /media/hfs/fvde1 /media/hfs_filesystem/
```

## Inspect database file (.db)

{% embed url="https://www.tutorialspoint.com/sqlite/sqlite_installation.htm" %}
Install sqlite3
{% endembed %}

```
sqlite3 file.db
.tables
select * from <table> ;
```

## Inspect pslist file

`plist` file contains critical information about the configuration of an iOS mobile app such as iOS versions that are supported and device compatibility which the operating system uses to interact with the app. This file is automatically created when the mobile app is compiled.

```
plistutil -i file.pslist
```
