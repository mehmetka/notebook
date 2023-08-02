---
tags: [technical, php]
---

# notes

Using getenv() and putenv() is strongly discouraged due to the fact that these functions are not thread safe, however it is still possible to instruct PHP dotenv to use these functions.

*>_ Unknown* (2022-08-13 21:08:33)

tags: technical, php

---

## Run composer commands on disposable Docker container

```shell  
docker run --rm --interactive --tty --volume $PWD:/app composer  
```

*>_ Unknown* (2022-08-13 21:05:33)

tags: technical, php

