---
tags: [git, technical]
---

# Github Flow

The Feature Branch Workflow assumes a central repository and master represents the official project history. Instead of  
committing directly on the master branch, developers can create a new branch every time they start work on a new  
feature. Feature branches should have descriptive names.

The suggested way to utilize this type of workflow would follow a hierarchal method that distinguishes between various  
levels of staff.  
Before a branch is merged to master, it needs to be verified and checked for errors:  
Junior developers can create a merge request and assign it to one of the senior developers. The Seniors in turn can  
review the code and leave any necessary comments. If everything seems satisfactory to move forward, the request is  
accepted and the branch is merged.

1. Anything in the master branch is deployable and is stable.  
1. To work on something new, create a branch off from master and given a descriptive name(ie: ui-upgrade).  
1. Also, you can create branches from the existing feature branch.  
1. Commit to that branch locally and regularly push your work to the same-named branch on the server.  
1. When you need feedback or help, or you think the branch is ready for merging, open a pull request.  
1. After someone else has reviewed and signed off on the feature, you can merge it into master.  
1. Once it is merged and pushed to master, Your feature is ready for deployment.

## Advantages

- it is friendly for the Continuous Delivery and Continuous Integration
- A simpler alternative to Git Flow
- It is ideal when it needs to maintain a single version in production

## Disadvantages

- The production code can become unstable most easily
- Are not adequate when it needs the release plans
- It doesn't resolve anything about deploy, environments, releases, and issues
- It isn't recommended when multiple versions in production are needed.

## Sources

- https://www.atlassian.com/git/tutorials/comparing-workflows/feature-branch-workflow
- https://medium.com/@patrickporto/4-branching-workflows-for-git-30d0aaee7bf

*>_ Unknown* (2022-08-13 21:00:12)

tags: git, technical

