## Custom Domain

- If Cloudflare is "dns only" then "SSL/TLS encryption mode" should be "Flexible".
- If Cloudflare is "proxy" then "SSL/TLS encryption mode" should be "Full".

### Source
- https://dillonlara115.medium.com/how-to-connect-a-subdomain-on-cloudflare-to-aws-amplify-5c79415faca

## Redirect Rule

```
Source address: /<*>
Target address: /404
Type: 404 (Redirect)
Country code: -
```

### Source
- https://docs.aws.amazon.com/amplify/latest/userguide/redirects.html