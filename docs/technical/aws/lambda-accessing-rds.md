---
tags: [aws, technical]
---

# Accessing RDS from Lambda

1. Assume that you have an RDS  
2. Create a role that has 'AWSLambdaVPCAccessExecutionRole' and take Role's ARN info  
3. Run:

```shell  
pip3 install --target . pymysql  
```

4. Change app.py by RDS credentials

```  
import sys  
import logging  
import pymysql
#rds settings  
rds_host  = "rds-instance-endpoint"  
name = "db_username"  
password = "db_password"  
db_name = "db_name"

logger = logging.getLogger()  
logger.setLevel(logging.INFO)

try:  
    conn = pymysql.connect(host=rds_host, user=name, passwd=password, db=db_name, connect_timeout=5)  
except pymysql.MySQLError as e:  
    logger.error("ERROR: Unexpected error: Could not connect to MySQL instance.")  
    logger.error(e)  
    sys.exit()

logger.info("SUCCESS: Connection to RDS MySQL instance succeeded")  
def lambda_handler(event, context):  
    """  
    This function fetches content from MySQL RDS instance  
    """

    item_count = 0

    with conn.cursor() as cur:  
        cur.execute("create table Employee ( EmpID  int NOT NULL, Name varchar(255) NOT NULL, PRIMARY KEY (EmpID))")  
        cur.execute('insert into Employee (EmpID, Name) values(1, "Joe")')  
        cur.execute('insert into Employee (EmpID, Name) values(2, "Bob")')  
        cur.execute('insert into Employee (EmpID, Name) values(3, "Mary")')  
        conn.commit()  
        cur.execute("select * from Employee")  
        for row in cur:  
            item_count += 1  
            logger.info(row)  
            #print(row)  
    conn.commit()

    return "Added %d items from RDS MySQL table" %(item_count)  
```

5. Bundle the code as app.zip  
6. Find Subnet IDs and Security Group ID (Will be using in next step)  
7. Create Lambda:

```shell  
aws lambda create-function --function-name func-name --runtime python3.8 \  
   --zip-file fileb://app.zip --role arn:aws:iam::123456789012:role/lambda-vpc-role \  
   --vpc-config SubnetIds=${SubnetIDs},SecurityGroupIds=${SecurityGroupIDs}  
```

8. Give RDS/Aurora access rule to RDS Security Group (Whatever it is -> ${SecurityGroupIDs})

9. Trig function:

```shell  
aws lambda invoke --function-name func-name output.txt  
```

### Source:

https://docs.aws.amazon.com/lambda/latest/dg/services-rds-tutorial.html

*>_ Unknown* (2022-08-13 20:54:36)

tags: aws, technical

