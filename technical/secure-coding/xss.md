# Reflected
- Validate all user inputs
- use the function htmlspecialchars() whenever you want to output something to the browser that came from the user input

```php
// will convert any "HTML special characters" into their HTML encodings, meaning they will then not be processed as standard HTML. 
htmlspecialchars($_GET['input']);
htmlspecialchars($string, ENT_QUOTES, 'UTF-8');

filter_input(INPUT_GET, 'input', FILTER_SANITIZE_SPECIAL_CHARS);
filter_input(INPUT_GET, 'input', FILTER_SANITIZE_URL);

urlencode($_GET['input']);
```

## [Fortify](https://vulncat.fortify.com/en/detail?id=desc.dataflow.abap.cross_site_scripting_reflected)
The data is included in dynamic content that is sent to a web user without being validated. The malicious content sent to the web browser often takes the form of a segment of JavaScript, but may also include HTML, Flash or any other type of code that the browser may execute. The variety of attacks based on XSS is almost limitless, but they commonly include transmitting private data like cookies or other session information to the attacker, redirecting the victim to web content controlled by the attacker, or performing other malicious operations on the user's machine under the guise of the vulnerable site.

## https://stackoverflow.com/questions/1996122/how-to-prevent-xss-with-html-php

### [Scott Arciszewski](https://stackoverflow.com/a/31714103)
- make sure you escape on output, not on input.

### [Matt S](https://stackoverflow.com/a/45512141)
- Never trust input coming from a client. Every GET parameter, POST or PUT content, and cookie value could be anything at all, and should therefore be validated
- When outputting any of these values, ESCAPE them so they will not be evaluated in an unexpected way.
- always escape output.

### [chris](https://stackoverflow.com/a/33873030)
- You are also able to set some XSS related HTTP response headers via header(): ```X-XSS-Protection "1; mode=block"```
- to be sure, the browser XSS protection mode is enabled.: ```Content-Security-Policy "default-src 'self'; ..."```
- to enable browser-side content security. See this one for Content Security Policy (CSP) details: http://content-security-policy.com/ Especially setting up CSP to block inline-scripts and external script sources is helpful against XSS.
- for a general bunch of useful HTTP response headers concerning the security of you webapp, look at OWASP: https://www.owasp.org/index.php/List_of_useful_HTTP_headers

# Content Sniffing
Use this header: "X-Content-Type-Options: nosniff"