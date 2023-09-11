---
tags: [curl, php]
---

## Log Fatal Errors to Different Log File

Change these fields in php.ini file:

```  
log_errors = on  
error_reporting = E_ERROR  
error_log = /path/to/file  
```

Source: https://mediatemple.net/community/products/dv/360020711631/how-to-enable-php-error-logging-via-php.ini  

> Unknown (2022-08-13 21:05:22)  
> #php

--

## cURL: Not async

```  
exec('curl http://example.com');  
```

## cURL: Async

```  
exec('curl http://example.com > /dev/null 2>/dev/null &');  
```

You can see running processes with "ps -ef"  

> Unknown (2023-09-07 12:09:40)  
> #curl #php

--

## Modifying PHP-FPM Access Log Format

```  
access.format = "[%t] %m %{REQUEST_SCHEME}e://%{HTTP_HOST}e%{REQUEST_URI}e pid:%p took:%ds mem:%{mega}Mmb cpu:%C%% status:%s {%{REMOTE_ADDR}e|%{HTTP_USER_AGENT}e}"  
```  

> Unknown (2023-08-15 22:11:48)  
> #php

--

## Fix: PHP7.1-FPM + Apache "Gateway Timeout"

Add ```Timeout 600``` this statement to global conf.

## Fix: PHP7.4-FPM + Apache "Gateway Timeout 504"

Add ```timeout=600``` this statement to end of ProxyPassMatch line's  

> Unknown (2023-08-17 17:11:26)  
> #php

--

Using getenv() and putenv() is strongly discouraged due to the fact that these functions are not thread safe, however it is still possible to instruct PHP dotenv to use these functions.  

> Unknown (2022-08-13 21:08:33)  
> #php

--

## Run composer commands on disposable Docker container

```shell  
docker run --rm --interactive --tty --volume $PWD:/app composer  
```  

> Unknown (2022-08-13 21:05:33)  
> #php

