---
tags: [php, technical]
---

# uncategorized

Modifying PHP-FPM Access Log Format

```  
access.format = "[%t] %m %{REQUEST_SCHEME}e://%{HTTP_HOST}e%{REQUEST_URI}e pid:%p took:%ds mem:%{mega}Mmb cpu:%C%% status:%s {%{REMOTE_ADDR}e|%{HTTP_USER_AGENT}e}"  
```

*>_ Unknown* (2023-08-15 22:11:48)

tags: php, technical

---

Fix: PHP7.1-FPM + Apache "Gateway Timeout"

Add ```Timeout 600``` this statement to global conf.

Fix: PHP7.4-FPM + Apache "Gateway Timeout 504"

Add ```timeout=600``` this statement to end of ProxyPassMatch line's

*>_ Unknown* (2023-08-17 17:11:26)

tags: php, technical

---

Using getenv() and putenv() is strongly discouraged due to the fact that these functions are not thread safe, however it is still possible to instruct PHP dotenv to use these functions.

*>_ Unknown* (2022-08-13 21:08:33)

tags: php, technical

---

## Run composer commands on disposable Docker container

```shell  
docker run --rm --interactive --tty --volume $PWD:/app composer  
```

*>_ Unknown* (2022-08-13 21:05:33)

tags: php, technical

