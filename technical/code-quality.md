# [berk-dulger-code-quality-and-analysis](https://kommunity.com/agile-software-development-turkey/events/agile-code-2-code-quality-and-analysis-b0c5d21a)
- https://github.com/berkdulger/Code_Quality_and_Analysis_Training

## Project Management Triangle
### How to optimize between these attributes? 
- The quality of work is constrained by the project's budget, deadlines and scope (features). 
- The project manager can trade between constraints. 
- Changes in one constraint necessitate changes in others to compensate or quality will suffer. 

![The Project Management Triangle (called also the Triple Constraint, Iron Triangle and "Project Triangle") ](https://clearbridgemob-wpengine.netdna-ssl.com/wp-content/uploads/2015/08/Screen-Shot-2015-08-13-at-4.01.03-PM.png)

## Common Code Smells 
- Inappropriate naming 
- Comments 
- Dead code 
- Duplicated code 
- Primitive obsession 
- Large class 
- God class 
- Lazy class 
- Middle man 
- Data clumps 
- Data class 
- Long method 
- Long parameter list 
- Switch statements 
- Speculative generality 
- Oddball solution 
- Feature envy 
- Refused bequest 
- Contrived complexity 
- Divergent change 
- Shotgun Surgery 

## Common Reasons of Technical Debt 
- Business pressures, where the business considers getting something released sooner before all of the necessary changes are complete, builds up technical debt comprising those uncompleted changes. 
- Parallel development on two or more branches accrues technical debt because of the work required to merge the changes into a single source base. The more changes that are done in isolation, the more debt is piled up. 
- Delayed refactoring — As the requirements for a project evolve, it may become clear that parts of the code have become inefficient or difficult to edit and must be refactored in order to support future requirements. 
- Lack of alignment to standards, where industry standard features, frameworks, technologies are ignored. Eventually, integration with standards will come, doing sooner will cost less (similar to 'delayed refactoring'). 
- Lack of knowledge, when the developer simply doesn't know how to write elegant code. 
- Lack of ownership, when outsourced software efforts result in in-house engineering being required to refactor or rewrite outsourced code. 
- Last minute specification changes; these have potential to percolate throughout a project but no time or budget to see them through with documentation and checks. 

## Technical Debt is Hard to Detect:
- Positive Value/Visible -> Feature
- Positive Value/Invisible -> Architecture
- Negative Value/Visible -> Bug
- Negative Value/Invisible -> Technical Debt

![Image from: https://techbeacon.com/app-dev-testing/java-performance-tools-teams-survey-who-doing-what](https://techbeacon.com/sites/default/files/Screen-Shot-2015-07-29-at-11.24.13-AM.png)