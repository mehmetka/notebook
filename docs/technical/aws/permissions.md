---
tags: [aws, iam, permissions]
---

## Tag Based Authorization  
Users have this permission can only execute "rds:DescribeDBInstances" command on resources have "tagName=tagValue" tag

```  
{  
  "Version": "2012-10-17",  
  "Statement": [  
    {  
      "Effect": "Allow",  
      "Action": [  
        "rds:DescribeDBInstances"  
      ],  
      "Resource": "arn:aws:rds:region:account-id:db:*",  
      "Condition": {  
        "StringEquals": {  
          "aws:ResourceTag/tagName": [  
            "tagValue"  
          ]  
        }  
      }  
    }  
  ]  
}  
```  

> Unknown (2023-09-13 15:16:26)  
> #aws #iam #permissions

