---
description: A list of Image Acquisition techniques.
---

# Image Acquisition

## Linux

### dd

The `dd` command allows you to copy all or part of a disk by blocks of bytes, regardless of the structure of the disk contents in files and directories.

```bash
dd if=<source> of=<target> bs=<block size>
```

* **source :** represents the data to be copied
* **target :** is the place where to copy them
* **block size** : is greater than or equal to 512, representing a number of bytes (for example: 512, 1024, 2048, 4096, 8192, 16384, but it can be any reasonable number).

### dcfldd <a href="#qu_est-ce_que_dcfldd" id="qu_est-ce_que_dcfldd"></a>

dcfldd is an improved version of dd with hashes along the way which is more secure.

<pre class="language-bash"><code class="lang-bash"><strong>dcfldd if=&#x3C;subject device> of=&#x3C;image file> bs=512 hash=&#x3C;algorithm> hashwindow=&#x3C;chunk size> hashlog=&#x3C;hash file>
</strong></code></pre>

## Windows

### FTK Imager

FTK Imager is a forensic imaging software developed by AccessData that is used to create forensic images of hard drives, partitions, and other.

{% embed url="https://www.exterro.com/ftk-imager" %}
