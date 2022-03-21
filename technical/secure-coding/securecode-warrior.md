## Unvalidated Redirects and Forwards
- Locate Vulnerability: A redirect based on the transmitted request parameters gives an attacker the ability to redirect to third-party resources. Thus, the attacker can successfully carry out phishing attacks, lulling vigilance by the fact that the basic part of the address in the link will belong to the original application.
- Identify Solution: A good approach is to exclude user input in redirect URL's. The redirect always occurs according to the static URL, which does not allow an adversary to carry out an attack.

## Remote File Inclusion
- The application should use the trusted paths of the resources. Binding the static URL trusted path for the resources prevents dynamic file inclusion. Thus, an attacker can't include a malicious remote script into application pages.

## Open Redirect
- Locate Vulnerability: In the application's authentication success handler, a redirect is performed on the basis of a request parameter, which comes from a hidden field in the login form. An attacker can easily redirect a user to /login?redirect by using an arbitrary URL in order to perform a phishing attack or to execute an unprotected GET-method-accessible system process.
- Identify Solution: Spring Security already comes with a default redirect behavior on successful authentication. Getting out of its way would be the smarter thing to do in this case unless we really need something specific.

## Injection Flaws: NoSQL Injection
- Locate Vulnerability: The application shouldn't use any NoSQL queries without users' input sanitizing. It`s a lack of security, and an adversary can exploit this vulnerability to perform dangerous injections.
- Identify Solution: The application should use only trusted mechanisms to work with the database. So, Spring Data provides robust functional to sanitize users` input and perform secure queries, preventing NoSQL injection vulnerability.

## Insecure Cryptography Weak Algorithm Use
- Identify Solution: The application should use only secure algorithms, which follow cryptographic standards. 'Argon2' is a robust and trusted algorithm that has got many parameters for its configuration. It prevents Weak Algorithm Use vulnerability.

## Insufficient Logging and Monitoring
- Locate Vulnerability: The application is collecting the logs using System.err.println() and are never saved in the log file. This isn't recommended, because suspicious activities cannot be properly analyzed.
- Identify Solution: The application is saving all the necessary activities in a log file using org.apache.log4j.Logger instead of System.err.println(). This helps in monitoring suspicious activities and accordingly necessary action can be taken.

## Insufficient Transport Layer Protection
- Locate Vulnerability: When serving an application through an insecure transport protocol such as HTTP, information is transmitted explicitly. The users' personal data is at risk of being compromised.
- Identify Solution: Using the HTTPS protocol with TLS of the latest versions (SPRING STARTER version 2.2.2.RELEASE hasTLSv1.3 by default) allows to protect the data transmitted to and from the server, since all requests are encrypted.

## LDAP Injection
- Spring security has LDAP authentication by default, it is safer than the implementation of custom authentication. Since Spring Security provides automatic request generation, it ensures that the password and username are safely transferred to the LDAP database.

## XSS: Stored/Persistent
- Locate Vulnerability:
  - Absence of protection against the execution of malicious scripts which have been previously uploaded to the server as a valid text data introduces a wide range of possibilities to steal confidential information from cookies or session, make dangerous requests to the server, or redirect to fishing sites.
  - The lack of input sanitization allows an attacker to include malicious scripts in the input, which will subsequently be saved in the application database. Collected data may be shared with other users over time. If the provided data contains malicious scripts, an attacker could gain access to the data of many users.
  - User data is displayed without any verification, which allows an attacker to transfer data containing an HTML script and run it on the user's device.
- Identify Solution:
  - User input data should be sanitized before storing it into the database and encoded before including it into an HTML page. ESAPI is a library recommended by OWASP for sanitizing and encoding input data, which efficiently prevents the execution of stored scripts on the client.
  - It is recommended to sanitize the data before it is rendered on the user side. Using OWASP encoder allows to sanitize the data before giving it on the user side. This approach protects the application from a possible XSS attack.

## SQL Injection
- Locate Vulnerability: Using the data that the user transmits in queries without any validation and sanitisation leaves the attacker open to the possibility of SQL injection and receiving, modifying any data from the database.
- Identify Solution: It is essential to use trusted and secure libraries to validate SQL queries. Spring Data JPA provides built-in sanitisation and query validation capabilities that help to protect the application from SQL injection.
- (Golang) Creating a string for a prepared statement and then replacing the values using a string manipulation function dramatically increases susceptibility to SQL injections, as the function will just return the query as an appended string.

## XPath Injection
- The application should sanitize the parameters received from the user to protect from XPath injection. Using ESAPI.encoder().encodeForXPath sanitize the input arguments and prevents the XPath injection.
- Locate Vulnerability: When concatenating parameters to build an XPath, an adversary could perform an injection attack and obtain sensitive data.
- Identify Solution: The data received from a user must be validated for XPath injection before being used in the XPath expression. Using a blacklist with forbidden characters will not allow an attacker to take advantage of this vulnerability.

## Access Control - Missing Function Level Access Control
- Locate Vulnerability: The MySQL Docker container is running with root user privileges. In case of service compromise, the attacker will have full access to the Docker container and underlying files.
- Solution: Docker containers should not run as root user. A non-privileged user has been configured to be used when running the container. Also, this user needs permissions on the volumes associated with the Docker container. In case of service comprise, the attacker will not have full control over the container and underlying files.

## Access Control - Missing Object Level Access Control
- Locate Vulnerability: docker.service file ownership is not properly checked. A malicious user with access to this file would be able to access sensitive parameters of docker daemon.
- Identify Solution: It's recommended that docker.service user and group ownership are correctly set to root. The stat command is checking both user and group parameters. In this way, the script will ensure that only root can have access to this file that contains sensitive parameters of docker daemon.

## XXE
- Locate Vulnerability: The XPathExpression is used to search the data from XML Document, which, by default, is vulnerable to XML External Entity (XXE) attacks.
- Identify Solution: Because the XPathExpression doesn't support flags for disabling XXE, therefore, the untrusted data is first parsed through DocumentBuilderFactory parser with attributes as setAttribute(XMLConstants.ACCESS_EXTERNAL_DTD, "") and setAttribute(XMLConstants.ACCESS_EXTERNAL_SCHEMA, ""), which generates a source object and pass the source object to the XPathExpression for evaluating. This removes the XXE vulnerability present in the system.

## XXE 2
- Locate Vulnerability: XML parser SAXParserFactory is used to parse XML. This doesn't provide the correct configuration option(s) which can leave the system open to a variety of attacks for example, system file exposure, remote code execution, etc.
- Identify Solution: The XML parser options load-external-dtd, external-general-entities, external-parameter-entities and setXIncludeAware are set as false. These options disable the inline Data Type Definition (DTD) processing which prevents XML External Entity (XXE) attack. The option load-external-dtd is used to load external DTD, external-general-entities is used to include External Entity external-parameter-entities is used to include external parameter entity and setXIncludeAware is used to include specific XML.
- disallow-doctype-decl is set to true and both external-general-entities and external-parameter-entities are set to false. These features completely disable the processing of externally defined entities and fully protect the XML parser against External Entity injections.