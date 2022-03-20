## [Gitflow kullanımı ve branch yönetimi](https://medium.com/software-development-turkey/git-flow-kullan%C4%B1m%C4%B1-ve-branch-y%C3%B6netimi-3a66a6106ddc)
- Master: Şu anda client tarafında kullanılan sürüm.
- Hotfix: Release branch’inde olabilecek hataların çözümü için, resimden de anladığınız gibi master’a, yani aktif sisteme atılan bugfix’ler için oluşturulmuştur.
- Release: Canlıya alınmadan önce geliştirmeleri, testleri ve herşeyi tamamlanan kullanıcılara açılmayı bekleyen özelliklerin tutulduğu branch.
- Develop: Developer tarafında geliştirmeleri tamamlanan özelliklerin tutulduğu branch olarak düşünülmelidir. Geliştirmesi tamamlanan özellikler Release branch’i ile birleştirilir.
- Feature: Yeni bir özellik için oluşturulan bu branch işlemin tamamlanmasından sonra Develop branch’i ile birleştirilir.

## https://medium.com/javarevisited/5-different-git-workflows-50f75d8783a7
- It is almost similar to the feature branch workflow. But the difference is the developers are creating branches from the develop branch and it is a branch of master branch. Developers are not allowed to create branches directly from master branch. This flow eliminates buggy code from the master branch.

### Advantages
- Git Flow is used by a lot of distributed, open-source teams that have varying skill levels. The project maintainers can review and approve every line of code going into releases.
- Git Flow can work well for a traditional release model, where releases are done in terms of months and weeks.
- Git Flow also works well when dealing with an established product or multiple versions in production.

### Disadvantages
- Git Flow can slow things down when having to look at large pull requests if you are trying to iterate quickly.
- Releases are hard to do more than once a week.
- Larger features can spend days merging and resolving conflicts (merge hell) and force multiple testing cycles.
- The Project history is full of merge commits and makes it hard to see the actual work.
- Can be problematic in Continuous Integration or Continuous Delivery scenarios.

## https://buddy.works/blog/5-types-of-git-workflows
- Master: used for releases only
- Develop: created from Master, this is the home of all completed and stable features prepared for the next release
- When you start working on a new feature, create a new Feature branch from Develop. Create as many feature branches in parallel as you want and need. When the work is done and the feature is tested, merge the code back to Develop.
- Then, when the time to release comes, isolate the new features from the Develop branch on a new Release branch. Make sure that the release is well tested and stable.
- Depending on the character of your project, it might be a good idea to release an RC (Release Candidate) version of your software to the public.
- When the release is stable and all kinks are ironed out, merge your release branch back to Master and deploy to production!

## [Pablo Ezequiel Leone Signetti](https://danielkummer.github.io/git-flow-cheatsheet)
- Hotfixes are from master.
- Bugfixes can be either from release/latest or development and tag the version that are fixing, current version on development or the next version in the release/latest branch.
- You can bugfix a feature in development.
- You can bugfix the release/latest branch before the official release.
- Having a release/1.0.0 is useless in some environments, where preproduction is not generated automatically by CI. Our system is serving release/latest in preproduction and we always merge development into release/latest to be able to test the next release. Once is fully finished we create release/{version} to meet the standard and after merging into master we tag the new version.
- As you can see we have, hotfix/xxx, feature/xxx, bugfix/xxx, release/xxx, development and master branches. (xxx: task code in Jira, Trello, etc.)

## https://stackoverflow.com/a/35915110

### Multiple versions in production - use Git-flow
- If your code is having multiple versions in production (i.e. typical software products like Operating Systems, Office Packages, Custom applications, etc) 
- you may use git-flow. Main reason is that you need to continuously support previous versions in production while developing the next version.

### Single version in production simple software - use Github-flow
- If your code is having only one version in production at all times (i.e. web sites, web services, etc) you may use github-flow. 
- Main reason is that you don't need to complex things for the developer. Once developer finish a feature or finish a bugfix its immediately promoted to production version.

### Single Version in production but very complex software - use Gitlab-flow
- Large software like Facebook and Gmail, you may need to introduce deployment branches between your branch and master branch where CI/CD > tools could run, 
- before it gets in to production. Idea is to introduce more protection to production version since its used by millions of people.