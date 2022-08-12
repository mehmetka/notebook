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

### Source:
- https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/service_dynamodb-session-handler.html