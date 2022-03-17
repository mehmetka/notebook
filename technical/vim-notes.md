- This command will ng whitespace. To not delete lines containialso delete lines containing only whitespace, you can use \W*, which means "zero or more whitespace characters.": :g/^\W*$/d
- This command deletes any line containing only zero or more whitespace characters. Lines that contain any other type of character are not deleted.
- ^, $, *, and \W are special metacharacters used in regular expressions.
- Add every beginning of lines "//" : :%s!^!//!
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