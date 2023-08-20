---
tags: [funny, golang, http, mkdocs, nextjs, technical]
---

# uncategorized

#ERR_OSSL_EVP_UNSUPPORTED  

Solution:

```shell  
NODE_OPTIONS=--openssl-legacy-provider next build && next export  
```

*>_ Unknown* (2022-08-13 21:11:34)

tags: nextjs, technical

---

DRY needs to stop.

It's one of the worst programming advice out there.

It's true. You shouldn't repeat extremely core parts of business logic.

BUT--you shouldn't extract every single line of code that looks similar into a reusable function either. Unfortunately, this is the way it's usually taught.

That's just going to lead to poor abstractions.

Check out:  
• Sandi Metz - The wrong abstraction  
• Kent C Dodds - AHA (Avoid hasty abstractions)  
• Dan Abramov - The WET codebase (Write everything twice)

Before extracting logic, remember: No abstraction > the wrong abstraction

*>_ Jordan Cutler - Linkedin* (2023-08-18 12:46:16)

tags: technical

---

Exit code 137 occurs when a process is terminated because it's using too much memory.

*>_ Unknown* (2023-08-14 20:16:06)

tags: technical

---

HTTP status codes:

1xx hold on  
2xx here you go  
3xx go away  
4xx you screwed up  
5xx i screwed up

https://twitter.com/DavidSmrvl/status/424205562046197760

*>_ David Somerville* (2023-08-10 23:18:52)

tags: funny, http, technical

---

Shows content of file.

```  
curl file:///home/ec2-user/bla-bla  
```

*>_ Unknown* (2023-08-10 22:47:06)

tags: technical

---

```  
stress --cpu 2 --timeout 60  
```

*>_ Unknown* (2023-08-10 22:45:50)

tags: technical

---

- iCloud path: /Users/username/Library/Mobile Documents/com~apple~CloudDocs
- Browser does not allow to use autocomplete on values which access by AJAX request
- ```<noscript>``` is for browsers which block javascript

*>_ Unknown* (2022-08-13 21:08:23)

tags: technical

---

- Build for linux on macos

```  
GOOS=linux GOARCH=amd64 go build -o notification  
```

*>_ Unknown* (2022-08-13 21:08:51)

tags: golang, technical

---

## Using mkdocs

```shell  
pip3 install mkdocs  
mkdocs build  
mkdocs serve  
```

mkdocs.yml

```yaml  
docs_dir: mdfiles # documents  
site_dir: docs # build output  
site_name: sitename  
site_url: https://example.com  
nav:  
  - Home: 'index.md'  
theme: readthedocs  
```

*>_ Unknown* (2022-08-13 21:11:52)

tags: mkdocs, technical

---

- When you get "sh: Operation not permitted" error while trying to run shell script on  
  cron https://osxdaily.com/2020/04/27/fix-cron-permissions-macos-full-disk-access/

*>_ Unknown* (2022-08-13 21:10:58)

tags: technical

---

Udemy API:

- Unarchived:  
  https://www.udemy.com/api-2.0/users/me/subscribed-courses/?fields%5Bcourse%5D=%40min%2Cvisible_instructors%2Cimage_240x135%2Cfavorite_time%2Carchive_time%2Ccompletion_ratio%2Clast_accessed_time%2Cenrollment_time%2Cis_practice_test_course%2Cfeatures%2Cnum_collections%2Cpublished_title%2Cis_private%2Cis_published%2Cbuyable_object_type&fields%5Buser%5D=%40min%2Cjob_title&is_archived=false&ordering=-last_accessed&page_size=32

- All  
  https://www.udemy.com/api-2.0/users/me/subscribed-courses/?page_size=132

*>_ Unknown* (2022-08-13 21:09:52)

tags: technical

