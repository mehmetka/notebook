# Linux, Shell Commands Notes
- To not keep track command history, write commands start with whitespace
- Find duplicate lines in a file```cat data.txt | sort | uniq -d ```
- Write command(s) into "rc.local" to execute on boot
- Delete history: ```history -c```
- Find anything: ```find / -iname "*.err”```
- Extract .rar files: ```unrar x -y [path]```
- ```netstat -ant``` -> Active Internet connections (including servers)
- Delete files inside of a directory: ```rm -f dirName/*```
- Search a keyword and show 2 lines before/after ```grep -B 2 -A 2 keyword README.txt``` 