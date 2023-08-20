---
tags: [cloudflare, technical]
---

# Cloudflare Maintenance Mode

- Create Worker -> "Create a Service"  
  ![cloudflare-maintenance-mode-0.png](/img/cloudflare-maintenance-mode-0.png)

- Click "Quick Edit"  
  ![cloudflare-maintenance-mode-1.png](/img/cloudflare-maintenance-mode-1.png)


- Copy and paste below code block  
  ![cloudflare-maintenance-mode-3.png](/img/cloudflare-maintenance-mode-3.png)

```javascript  
const html = `<!DOCTYPE html>  
<body>  
  <h1>Maintenance mode</h1>  
</body>`;

async function handleRequest(request) {  
    return new Response(html, {  
        headers: {  
            'content-type': 'text/html;charset=UTF-8',  
        },  
    });  
}

addEventListener('fetch', event => {  
    return event.respondWith(handleRequest(event.request));  
});  
```

- (Optional) Test the code or edit by your needs
- Click "Save and deploy"

- Go to Dashboard. Choose your account.

- Click "Workers" on the left menu. Click to your worker just created  
  ![cloudflare-maintenance-mode-4.png](/img/cloudflare-maintenance-mode-4.png)

- Click "Add route" and type "*.your-domain.com/*" to "Route" input and choose zone/website.  
  ![cloudflare-maintenance-mode-7.png](/img/cloudflare-maintenance-mode-7.png)

- Click "Add route" and done \m/

*>_ Unknown* (2022-08-23 22:49:12)

tags: cloudflare, technical

