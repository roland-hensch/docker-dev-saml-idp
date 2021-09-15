# simplesamlphp Docker Container

SimpleSAMLphp (simplesamlphp.org) application in an php:7.1-apache based container
SimpleSAMLphp version **1.19.0**

## Usage

```
docker run --name=dev-saml-idp \
-p 8080:8080 \
-p 8443:8443 \
-e SIMPLESAMLPHP_SP_ENTITY_ID=https://your.app.com \
-e SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE=https://your.app.com/AssertionConsumerService \
-e SIMPLESAMLPHP_SP_SINGLE_LOGOUT_SERVICE=https://localhost:8443/simplesaml/saml2/idp/SingleLogoutService.php?ReturnTo=https://your.app.com/login \
-e SIMPLESAMLPHP_ADMIN_PASSWORD=admin \
-e SIMPLESAMLPHP_SECRET_SALT=secretsalt \
-d rhensch/dev-saml-idp
```

There are two static users configured in the IdP with the following data:

| Username | Password | Email |
|---|---|---|
| john | johnpass | john.doe@company.com |
| jane | janepass | jane.doe@company.com |

However you can define your own users by mounting a configuration file:

```
-v /authsources.php:/var/www/simplesamlphp/config/authsources.php
```

docker-compose.yml example
```
version: '3'
services:
  saml2local_idp:
    build: .
    image: rhensch/dev-saml-idp:latest
    environment:
      SIMPLESAMLPHP_SP_ENTITY_ID: https://your.app.com
      SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE: https://your.app.com/AssertionConsumerService
      SIMPLESAMLPHP_SP_SINGLE_LOGOUT_SERVICE: https://localhost:8443/simplesaml/saml2/idp/SingleLogoutService.php?ReturnTo=https://your.app.com/Login
      SIMPLESAMLPHP_ADMIN_PASSWORD: admin
      SIMPLESAMLPHP_SECRET_SALT: secretsalt
    ports:
     - "8080:8090"
     - "8443:8443"
```