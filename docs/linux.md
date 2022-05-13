# Linux & Shell Commands

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