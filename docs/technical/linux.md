---
tags: [linux]
---

## Reverse order by time

a -> all  
h -> human readable size  
r -> reverse  
t -> order by time

```  
ls -lahrt  
```  

> Unknown (2023-09-07 12:12:55)  
> #linux

--

## Kill all firefox processes

```  
pkill -f firefox  
```  

> Unknown (2023-08-27 22:21:55)  
> #linux

--

## Delete user and home its home folder

```  
sudo userdel -r userName  
```  

> Unknown (2023-08-27 22:21:12)  
> #linux

--

## User's UID

```  
id -u username  
```

## User's GID

```  
id -g username  
```

https://kb.iu.edu/d/adwf  

> Unknown (2023-08-14 16:29:07)  
> #linux

--

## Multiple SSH Keys

Using more than one ssh key, add below lines to this file: ~/.ssh/config

```  
IdentityFile ~/Desktop/.ssh/id_rsa  
IdentityFile ~/.ssh/id_rsa  
```  

> Unknown (2022-08-13 21:09:20)  
> #linux

--

## Change SSH port

- Find "# Listen 22" line and remove sharp in this file: /etc/ssh/sshd_config
- Then change port number
- Restart sshd service, logout, login

Source: https://www.howtoforge.com/how-to-install-gitlab-server-with-docker-on-ubuntu-1804/  

> Unknown (2022-08-13 21:09:32)  
> #linux

--

- To not keep track command history, write commands start with whitespace
- Find duplicate lines in a file```cat data.txt | sort | uniq -d ```
- Write command(s) into "rc.local" to execute on boot
- Delete history: ```history -c```
- Find anything: ```find / -iname "*.err”```
- Extract .rar files: ```unrar x -y [path]```
- ```netstat -ant``` -> Active Internet connections (including servers)
- Delete files inside of a directory: ```rm -f dirName/*```
- Search a keyword and show 2 lines before/after ```grep -B 2 -A 2 keyword README.txt``` 
- ```watch -n 5 date``` run any command at regular intervals
- $ echo '{"a":42, "b": {"x": 127}}' | python -mjson.tool
- Detailed ls: ls -R
- List whole files with relative paths: find /home/sample -type f
- Website accessible? scutil -r web-site-name
- Zip a file with password: zip -e destination.zip source-to-zip.txt
- Find duplicates in a folder: fdupes -r .
- exiftool -all:all file.pdf  

> Unknown (2022-08-13 21:04:29)  
> #linux

