---
tags: [aws, lambda, secretsmanager, vpc]
---

# Accessing SecretsManager from Lambda Function in a VPC

- Set up VPC configuration for Lambda Function
- Create a Security Group for Lambda Function and associate it with the function
- Create an VPC Endpoint for Secrets Manager
- Create a policy with this permissions and attach it to the function's Execution Role

```  
{  
    "Version": "2012-10-17",  
    "Statement": [  
        {  
            "Sid": "VisualEditor0",  
            "Effect": "Allow",  
            "Action": [  
                "secretsmanager:GetResourcePolicy",  
                "secretsmanager:GetSecretValue",  
                "secretsmanager:DescribeSecret",  
                "secretsmanager:ListSecretVersionIds"  
            ],  
            "Resource": "arn:aws:secretsmanager:region:account_id:secret:your-secret-arn"  
        }  
    ]  
}  
```

Sources:
- https://repost.aws/knowledge-center/lambda-secret-vpc
- https://docs.aws.amazon.com/secretsmanager/latest/userguide/vpc-endpoint-overview.html
- https://docs.aws.amazon.com/vpc/latest/privatelink/create-interface-endpoint.html#create-interface-endpoint-aws  

> Unknown (2023-09-25 16:35:27)  
> #aws #lambda #secretsmanager #vpc

