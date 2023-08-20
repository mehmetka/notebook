---
tags: [technical, vim]
---

set number! -> unset line numbers  
   
move cursor to  
next word: w   
previous word: b 

delete a word: daw  
delete a letter: dw

undo the last change: u

print file name -> :pwd  
save as -> :w filename  
insert mode with new line: o

*>_ Unknown* (2023-08-10 22:52:23)

tags: technical, vim

---

Vim Encryption

For new file:

```  
vim -x mynewfile  
opens a prompt and enter the encryption key twice. and done.  
```

For existing file

```  
:X  
opens a prompt and enter the encryption key twice. and done.  
```

Disable encryption

```  
:set key=  
```

*>_ Unknown* (2023-08-10 23:15:59)

tags: technical, vim

---

- This command will ng whitespace. To not delete lines containialso delete lines containing only whitespace, you can use \W*, which means "zero or more whitespace characters.": :g/^\W*$/d
- This command deletes any line containing only zero or more whitespace characters. Lines that contain any other type of character are not deleted.
- ^, $, *, and \W are special metacharacters used in regular expressions.
- Add every beginning of lines "//" ```:%s!^!//!```
- V select current line
- d cut
- y copy
- Paste before cursor: P; paste after cursor: p
- H, 0 start of line
- gg start of document
- G end of document
- $ end of line
- :syntax off
- :set number
- sort and remote duplicate lines: :sort u
- Write commands in this file to run on each time: home/${whoami}/.vimrc
- :,666d -> delete lines from current 666th line.
- https://vim.fandom.com/wiki/Delete_all_lines_containing_a_pattern
- https://vim.fandom.com/wiki/Search_and_replace
- https://stackoverflow.com/questions/253380/how-to-insert-text-at-beginning-of-a-multi-line-selection-in-vi-vim

- For the entire file 'g', search(/) for lines containing only the beginning '^' and ending '$' of a line, and delete 'd' those lines:   
```  
:g/^$/d  
```

*>_ Unknown* (2022-08-13 21:07:49)

tags: technical, vim

