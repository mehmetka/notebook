# Notes

- Commit count: ```git log --oneline --all | wc -l```
- Change committer name: vim ~./gitconfig
- Run commands after "git pull": .git/hooks/post-merge (file should be executable)
- Commits that waiting to be pushed: git cherry -v
- Remove a file from staging area: $ git reset HEAD filename.sql
- Undo last commit: $ git reset HEAD~
- If you don't specify your global email address, Github does not show your commits on your activity graph (git config --global user.email)
- git clone --recurse-submodules {scm-host}