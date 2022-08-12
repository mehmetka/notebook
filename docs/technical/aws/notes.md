# Notes

- aws api gateway uses token bucket algorithm for rate limiting

## if you cannot delete Elasticbeanstalk environment

You need to go to your CloudFormation console and retry deletion of the CloudFormation stack which the Beanstalk
environment used. The deletion may fail, but after retrying it will prompt you if you want to skip the "
AWSEBRDSDatabase" resource that failed to delete. You can just confirm that you want to skip deletion (since you have
actually already deleted it). This should remove the CloudFormation stack. Then you can retry deletion of the Beanstalk
environment from the Beanstalk console.