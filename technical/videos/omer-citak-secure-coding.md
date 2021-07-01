## Authentication and Password Management
    - Passwords should be store as a hash
    - Use “Invalid credentials” message instead of detailed messages
    - Enforce password complexity
    - Suggest 2FA
    - Use fake password masks
    - Temporary passwords and links should have a short expiration time
    - Enforce the changing of temporary passwords on the next use
    - Notify users any case
    - Log every failed attemp
    
## Session Management
    - Store users data in SESSION (server-side) not COOKIE (client-side)!
    - Set “secure” flag for all cookies
    - Set “httpOnly” flag for all cookies (If possible) n
    - Set “same-site=lax" flag for all cookies
    - Regenerate session id each request
    
## Access Control
    - Restrict access to protected URLs to only authorized users
    - Restrict access to protected functions to only authorized users
    - Restrict direct object references to only authorized users x
    - Restrict access to services to only authorized users
    - Restrict access to application data to only authorized users
    - Enforce application logic flaws to comply with business rules
    - Use “tenancy” relation for all tables
    - Use global query scopes
    - Use Role/Permission architecture
    - Burp Suite: Authmatrix
    
## Database Security
    - Use UUID instead of integer ID
    - Don't generate query with $request->all();
    - Use secure credentials for database access
    - IP Restriction
    - Use ORMs instead of raw queries
    - Use prepared statement instead of inject params in query manually
    
## File Management
    - Check file extension
    - Check file mimetype
    - Generate random file name
    - Disable directory traversal
    - Never send the absolute file path to the client
    - Ensure application files and resources are read-only
    - Scan user uploaded files for viruses and malware
    - Don't store files on database
    - Use external storage server (S3)
    
## CI supported security tools
    - Dependency checks
    - Npm-audit - docs.npmjs.com/cli/audit
    - Snyk - snyk.io
    - SensioLabs Security Checker (for composer) - security.symfony.com
    - Source-code Analyze
    - 6RIPS - ripstech.com
    - Checkmarx - checkmarx.com
    - Scanners
    - Netsparker - netsparker.com
    - Acunetix - acunetix.com
    - BurpSuite - portswigger.net/burp  
    
### SDL Timeline - Microsoft    
![alt text](https://image.3001.net/images/20200401/1585732474_5e845b7aee9f6.jpeg!small)