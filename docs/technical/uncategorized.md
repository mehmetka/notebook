---
tags: [ajax, autocomplete, browser, funny, golang, googlechrome, htaccess, http, icloud, mkdocs, nextjs, phpmyadmin, systemdesign, throughput]
---

## Delete Google Chrome's Auto Redirection

- Go to this URL: chrome://net-internals/#hsts
- Enter your domain: "Delete domain security policies"
- Click the Delete button  

> Unknown (2023-09-25 14:32:17)  
> #googlechrome

--

## phpMyAdmin Custom Config

config.user.inc.php file -> /etc/phpmyadmin/config.user.inc.php

```  
$cfg['Servers'] = [  
    1 => [  
        'auth_type' => 'config',  
        'host' => 'REMOTE_HOST_IP/CONTAINER_HOST',  
        'user' => 'USER',  
        'password' => 'PASSWORD'  
    ]  
];  
```  

> Unknown (2023-09-22 09:43:09)  
> #phpmyadmin

--

Always consider the complexity you are bringing with introduction of a Distributed System. Sometimes it is better to just use traditional frameworks.  

> Linkedin (2023-09-21 23:58:13)  
> #systemdesign

--

"Exit Code" > 0 means something's wrong.  

> Unknown (2023-09-14 21:44:49)  
  
--

## Autocomplete on AJAX Requests

Browser does not allow to use autocomplete on values which access by AJAX request

## iCloud Path

iCloud path: /Users/username/Library/Mobile Documents/com~apple~CloudDocs

## Block Javascript

```<noscript>``` is for browsers which block javascript  

> Unknown (2022-08-13 21:08:23)  
> #ajax #autocomplete #browser #icloud

--

What is throughput? Throughput is a way to measure the amount of work this service is handling. It measures how many requests are being processed per minute.  

> New Relic (2023-09-14 20:56:53)  
> #throughput

--

When you get "sh: Operation not permitted" error while trying to run shell script on cron https://osxdaily.com/2020/04/27/fix-cron-permissions-macos-full-disk-access/  

> Unknown (2022-08-13 21:10:58)  
  
--

## ERR_OSSL_EVP_UNSUPPORTED

Solution:

```shell  
NODE_OPTIONS=--openssl-legacy-provider next build && next export  
```  

> Unknown (2022-08-13 21:11:34)  
> #nextjs

--

## Block anything except zip files in .htaccess file

```  
Deny from all

<FilesMatch "\.(zip)$">  
Order Deny,Allow  
   Allow from all  
</FilesMatch>  
```  

> Unknown (2022-08-13 21:08:42)  
> #htaccess

--

## Block all access other than .php, .js, .css extension

```  
<FilesMatch "\.(?!php|js|css)[^.]+$">  
    Order allow,deny  
    Deny from all  
</FilesMatch>  
```  

> Unknown (2023-08-22 21:07:14)  
> #htaccess

--

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

> Jordan Cutler - Linkedin (2023-08-18 12:46:16)  
  
--

Exit code 137 occurs when a process is terminated because it's using too much memory.  

> Unknown (2023-08-14 20:16:06)  
  
--

## HTTP status codes

1xx hold on  
2xx here you go  
3xx go away  
4xx you screwed up  
5xx i screwed up

https://twitter.com/DavidSmrvl/status/424205562046197760  

> David Somerville (2023-08-10 23:18:52)  
> #funny #http

--

## Shows content of file with cURL

```  
curl file:///home/ec2-user/bla-bla  
```  

> Unknown (2023-08-10 22:47:06)  
  
--

## Stress Command

```  
stress --cpu 2 --timeout 60  
```  

> Unknown (2023-08-10 22:45:50)  
  
--

## Build for linux on macos

```  
GOOS=linux GOARCH=amd64 go build -o notification  
```  

> Unknown (2022-08-13 21:08:51)  
> #golang

--

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

> Unknown (2022-08-13 21:11:52)  
> #mkdocs

--

## Udemy API

- Unarchived:  
  https://www.udemy.com/api-2.0/users/me/subscribed-courses/?fields%5Bcourse%5D=%40min%2Cvisible_instructors%2Cimage_240x135%2Cfavorite_time%2Carchive_time%2Ccompletion_ratio%2Clast_accessed_time%2Cenrollment_time%2Cis_practice_test_course%2Cfeatures%2Cnum_collections%2Cpublished_title%2Cis_private%2Cis_published%2Cbuyable_object_type&fields%5Buser%5D=%40min%2Cjob_title&is_archived=false&ordering=-last_accessed&page_size=32

- All  
  https://www.udemy.com/api-2.0/users/me/subscribed-courses/?page_size=132  

> Unknown (2022-08-13 21:09:52)  
  
