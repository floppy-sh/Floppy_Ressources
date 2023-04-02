---
description: >-
  Forensics platform and graphical interface to The Sleuth Kit® and other
  forensics tools.
---

# Autopsy

## Installation

Autopsy explain the installation on their [website](https://www.autopsy.com/download/).

### Windows

* [Autopsy for Microsoft Windows x64](https://github.com/sleuthkit/autopsy/releases/download/autopsy-4.20.0/autopsy-4.20.0-64bit.msi)

### Linux

The installation on Linux can be hard due to dependencies needed.

1. Download the [zip file](https://github.com/sleuthkit/autopsy/releases/download/autopsy-4.20.0/autopsy-4.20.0.zip)
2. Linux will need The Sleuth Kit [Java .deb Debian package](https://github.com/sleuthkit/sleuthkit/releases/download/sleuthkit-4.12.0/sleuthkit-java\_4.12.0-1\_amd64.deb)
3. Follow the [instructions](https://github.com/sleuthkit/autopsy/blob/develop/Running\_Linux\_OSX.md) to install other dependencies

### Docker (recommended)

Autopsy can be deployed on docker via [docker hub.](https://hub.docker.com/r/bannsec/autopsy)

```
$ xhost +
$ docker run \
            -d \
            -it \
            --shm-size 2G \
            -v /tmp/.X11-unix:/tmp/.X11-unix \
            -v $(pwd)/case/:/root/case \
            -e DISPLAY=$DISPLAY \
            -e JAVA_TOOL_OPTIONS='-Dawt.useSystemAAFontSettings=on -Dswing.aatext=true -Dswing.defaultlaf=com.sun.java.swing.plaf.gtk.GTKLookAndFeel' \
            --network host \
            --device /dev/dri \
            bannsec/autopsy --nosplash

```

{% hint style="info" %}
&#x20;**** Use the `--nosplash` option on the docker run command line to avoid java error on the launch.

It will create a `case` folder on the current directory. You will need to insert image memory in this folder to exploit them with autopsy.
{% endhint %}
