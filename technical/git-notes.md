- Commit count: ```git log --oneline --all | wc -l```
- Change committer name: vim ~./gitconfig
- Run commands after "git pull": .git/hooks/post-merge (file should be executable)
- Commits that waiting to be pushed: git cherry -v
- Remove a file from staging area: $ git reset HEAD filename.sql
- Undo last commit: $ git reset HEAD~
- If you don't specify your global email address, Github does not show your commits on your activity graph (git config --global user.email)
- git clone --recurse-submodules {scm-host}

# How to Write Commit Messages

## Note 001
* Git commitlerinde gecmis ya da simdiki zaman degil emir kipi/imperative kullanilmali. 
```
❌ Fixed the bug.
✅ Fix the bug.
```

### Source
- https://twitter.com/baskindev/status/1471941412019179520?s=20&t=Gv9-gFDLpexrpKm8B_XlAw

## Note 002
Burada Linux Kernel'in argumani var. Biz aslinda codebase'e bir mevcut davranisini degistirmesi icin bir emir veriyoruz diyor. 
https://git.kernel.org/pub/scm/git/git.git/tree/Documentation/SubmittingPatches?id=HEAD#n138

### Source
- https://twitter.com/baskindev/status/1471945033062432768?s=20&t=Gv9-gFDLpexrpKm8B_XlAw

## Note 003
- Bu konuyla ilgili bir standart oluşturulması adına şöyle bir sistem mevcut http://conventionalcommits.org Dediğiniz gibi commit mesajında yaptım, ettim değil de, bu commit bunu yapacak edecek, manasına gelen mesajlar yazılıyor.

### Source
- https://twitter.com/GunhanSancar/status/1471951347205484545?s=20&t=Gv9-gFDLpexrpKm8B_XlAw