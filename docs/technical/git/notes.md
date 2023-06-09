# notes

- Commit count: ```git log --oneline --all | wc -l```
- Change committer name: vim ~./gitconfig
- Run commands after "git pull": .git/hooks/post-merge (file should be executable)
- Commits that waiting to be pushed: git cherry -v
- Remove a file from staging area: $ git reset HEAD filename.sql
- Undo last commit: $ git reset HEAD~
- If you don't specify your global email address, Github does not show your commits on your activity graph (git config --global user.email)
- git clone --recurse-submodules {scm-host}

---

## Huseyin Babal - Using Git Like a Hero
- Dagitik: lokalinizde olan bir git vardir, bir de "remote" vardir. dagitik bir yapi vardir.
- Projenin snapshot'ini tutar

3 tane Git alani var:
- Working: git'le ilgili hicbir sey yapmadan degisiklikler yapmak. dosya eklemek vs.
- Staging: "git add " yaptiktan sonraki asama, degisiklikleri aldigimiz yer
- Repo: commit'leyince bu asamaya gecilir.

Git Objects:
- Blob: this is created once you staged changes. working areadan, staging area'ya geciste bir blob objesi yaratilir.
- Tree: keeps references to child blobs or trees.
- Commit: something like tree, but also contains commit info like author, committer, message --- tree ile ayni ama en tepede.

```
# Commit 
Tree: 1abc3
Author: hbabal
Committer: Linux
Message: commit msg
```
- her objenin bir commit id'si(hash) var.
- git add -> bu bir objedir, blob.
- HashTree or MerkleTree is used as data structure to store Git Objects properly.
- rolling hash denen bir algoritma grubu var, git arka planda bu grubu kullaniyor.
- svn ve cvs -> delta tutuyor, git'te snapshot tutuyor.
- ayni icerige sahip iki dosya git icin tek bir objedir. / ayni icerige sahip dosyalar icin blob yaratmiyor.
- git sikistirma kullaniyor.
- git diff: it compares working area and staging area.
- git diff --staged -> compares staging area and repo area.
- HEAD -> en guncel hali nereye point ediyorsa HEAD orayi gosterir.
- git reset --hard HEAD --> git add yapilanlari working areaya gonderir.
- git reset --hard HEAD -> means clear everything which is not committed yet.
- git reset -> reverts everything on staging back to working area.
- merge'de ayri bir merge commit olusturulur.
- rebase'de yeni gelen commit'leri ekler. 
- git show 3392 // directory ve file hashlerini yazdik.
- staging'dekileri repo'ya eklemek icin: git commit.
- upstream -> projenin asil kaynagi.
- Git storage cost: 
    - since git takes a snapshot of your project with changeset when you commit to repo, can we say total size of git storage = # of commit X av(commit size)?
    - Answer: No, git uses compression algorithm to compress nearly similar files, it is smarter than you think.

![hbabal-using-git-like-a-hero](/img/hbabal-using-git-like-a-hero.png)