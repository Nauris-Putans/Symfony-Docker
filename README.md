# Symfony 2.8 🎶 + Docker 🐋

Mājaslapa ar backend lietām (**Apache , Php, Phpmyadmin, Mysql un Symfony 2.8**) + **Docker**


## Uzstadīšana  🔧

> Lai uzstādītu šo majaslapu, ir vajadzīgs:

1. Docker Desktop
2. Git Bash

-------------
 - Docker Desktop var lejupielādēt [šeit](https://www.docker.com/products/docker-desktop)
 - Git Bash var lejupielādēt [šeit](https://git-scm.com/downloads)
-------------

### Kad viss ir lejupielādēts

```bash
git clone https://github.com/Nauris-Putans/Symfony-Docker.git
```

```bash
cd Symfony-Docker/code
```

```bash
docker-compose build
```

```bash
docker-compose up -d
```

```bash
winpty docker exec -it sf2_php bash
```

```bash
composer install
```

- Ja sanak problemas lejupieladejot composer

```bash
composer dump-autoload
```

Kad prasīs pēc parametriem, vienkarši speižat enter (jau ir izveidots parameter template)
```bash
Creating the "app/config/parameters.yml" file
Some parameters are missing. Please provide them.
database_url ('mysql://root:root@mysql:3306/symfony'):
database_host (mysql):
database_port (3306):
database_name (symfony):
database_user (root):
database_password (root):
mailer_transport (smtp):
mailer_host (127.0.0.1):
mailer_user (null):
mailer_password (null):
secret (ThisTokenIsNotSoSecretChangeIt):
```

Uz ekrāna japaradās kautkas lidzigam šim.
```diff 
+ [OK] All assets were successfully installed.
```
