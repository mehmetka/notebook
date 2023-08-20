---
tags: [aws, technical]
---

# Managing PHP Sessions with DynamoDB

- composer require aws/aws-sdk-php
- Create a table named "sessions" on DynamoDB
- Required permissions:

```json  
{  
  "Version": "2012-10-17",  
  "Statement": [  
    {  
      "Action": [  
        "dynamodb:GetItem",  
        "dynamodb:UpdateItem",  
        "dynamodb:DeleteItem",  
        "dynamodb:Scan",  
        "dynamodb:BatchWriteItem"  
      ],  
      "Effect": "Allow",  
      "Resource": "arn:aws:dynamodb:region:account_id:table/sessions"  
    }  
  ]  
}  
```

- Add below code block before session_start()

```php  
include_once __DIR__ . '/vendor/autoload.php';

use Aws\DynamoDb\DynamoDbClient;  
use Aws\DynamoDb\SessionHandler;

$client = new DynamoDbClient([  
    'region' => 'gj-oceanplanet-1',  
    'version' => 'latest'  
]);

$sessionHandler = SessionHandler::fromClient($client, [  
    'table_name'                    => 'sessions',  
    'hash_key'                      => 'id',  
    'data_attribute'                => 'data',  
    'data_attribute_type'           => 'string',  
    'session_lifetime'              => 3600,  
    'session_lifetime_attribute'    => 'expires',  
    'consistent_read'               => true,  
    'locking'                       => false,  
    'batch_config'                  => [],  
    'max_lock_wait_time'            => 10,  
    'min_lock_retry_microtime'      => 5000,  
    'max_lock_retry_microtime'      => 50000,  
]);

$sessionHandler->register();  
```

## Garbage Collection

[Setup a TTL attribute in your DynamoDB table, using the attribute ‘expires’. This will automatically garbage collect  
your sessions and avoid the need to garbage collect them yourself.](https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/service_dynamodb-session-handler.html#:~:text=Setup%20a%20TTL%20attribute%20in%20your%20DynamoDB%20table%2C%20using%20the%20attribute%20%E2%80%98expires%E2%80%99.%20This%20will%20automatically%20garbage%20collect%20your%20sessions%20and%20avoid%20the%20need%20to%20garbage%20collect%20them%20yourself)

### Source:

- https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/service_dynamodb-session-handler.html

*>_ Unknown* (2022-08-13 20:52:54)

tags: aws, technical

