---
tags: [gnome, linux, vnc]
---

# Installing VNC Server and Gnome Desktop

## Install tightvncserver

```  
sudo apt update  
sudo apt install tightvncserver  
```

### Configuring the VNC Server

```  
vncserver :1
# this command will create a file called xstartup in ~/.vnc/xstartup  
```

Delete content of `~/.vnc/xstartup` file and add below lines

```
#!/bin/sh

export XKL_XMODMAP_DISABLE=1  
unset SESSION_MANAGER  
unset DBUS_SESSION_BUS_ADDRESS

[ -x /etc/vnc/xstartup ] && exec /etc/vnc/xstartup  
[ -r $HOME/.Xresources ] && xrdb $HOME/.Xresources  
xsetroot -solid grey

vncconfig -iconic &  
gnome-panel &  
gnome-settings-daemon &  
metacity &  
nautilus &  
gnome-terminal &
# you can add greeting message if you want  
zenity --warning --width=400 --height=200 --text "This is welcome message!!!"  
```

After configured the xstartup file, stop server and start again to get configuration we just gave.

```  
vncserver -kill :1  
vncserver :1  
```

## Install Gnome Desktop

```  
sudo apt install ubuntu-desktop gnome-panel gnome-settings-daemon metacity nautilus gnome-terminal  
```

## Connect to Desktop

After installation completed, you can connect to your server's desktop with "VNC Viewer" application. "server-ip-address:1"

Do not forget to create password for your user: `sudo passwd your_username`

## Source

- [1] https://ubuntu.com/tutorials/ubuntu-desktop-aws  

> Unknown (2023-09-25 15:31:57)  
> #gnome #linux #vnc

