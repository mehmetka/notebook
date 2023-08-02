---
tags: [technical, git]
---

# SVN to Git with Subgit for macOS

## Subgit installation  
```  
$ brew install subgit  
```

## Prerequisites  
```  
$ mkdir repository-name && cd repository-name  
```

## Prepare Git repository  
```  
$ subgit configure --layout auto --trunk ${trunkName} ${your-svn-host} .git  
```

## Subgit configurations
- Add SVN "username password" to .git/subgit/passwd file
- Add "launchTimeout = 60" to end of .git/subgit/config file
- Arrange .git/subgit/authors.txt file by your users

## Start to convert  
```  
$ subgit install .git  
```

## After converting done  
If you get this error: "fatal: this operation must be run in a work tree" then run

	```  
	$ git config --unset core.bare  
	```

## Send to remote  
```  
$ git remote add origin ${remote-address}  
$ git push origin master  
```

## References
- https://support.tmatesoft.com/t/cannot-commit-timeout-waiting-for-pid-file/2410
- https://subgit.com/documentation/howto.html

*>_ Unknown* (2022-08-13 21:01:32)

tags: technical, git

