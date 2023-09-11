---
tags: [terraform]
---

# Create S3 Bucket

If you set 'acl = "public-read"', your buckets give "list" permission to anybody, by default.  
When a bucket gives "list" permission to public, anybody can list all contents of bucket.  
That's why, acl must be set as "private"

```  
terraform {  
  required_providers {  
    aws = {  
      source  = "hashicorp/aws"  
      version = "~> 3.27"  
    }  
  }

  required_version = ">= 0.14.9"  
}

provider "aws" {  
  profile = "default"  
  region  = "eu-central-1"  
}

resource "aws_s3_bucket" "b" {  
  bucket = "unique-bucket-name"  
  acl    = "private"

  cors_rule {  
    allowed_headers = ["*"]  
    allowed_methods = ["GET"]  
    allowed_origins = ["*"]  
  }  
  tags = {  
    Name = "bucket-tag"  
  }  
  policy = <<POLICY  
  {  
    "Version": "2012-10-17",  
    "Statement": [  
        {  
            "Sid": "Statement1",  
            "Effect": "Allow",  
            "Principal": "*",  
            "Action": "s3:GetObject",  
            "Resource": "arn:aws:s3:::unique-bucket-name/*"  
        }  
    ]  
}  
  POLICY  
}  
```  

> Unknown (2022-08-13 21:07:20)  
> #terraform

