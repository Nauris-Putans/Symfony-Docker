# Symfony 2.8 🎶 + Docker 🐋

Server with **Apache, Php, Maildev, Phpmyadmin, Mysql, Scality S3 Server and Symfony 2.8**

## Table of Contents

 - [Docker container images](#docker-container-images)
 - [Requirements](#requirements)
 - [Installation](#installation)
   - [Clone](#clone)
   - [Setup](#setup)
 
## Docker container images
Project is created with:
 - Apache: **debian:stretch**
 - Php: **7.0.33**
 - Maildev: **latest:1.1.0**
 - Phpmyadmin: **5.0.2**
 - Mysql: **8.0.20-1debian10**
 - Scality S3 Server"**latest:6018536a**
 - Symfony: **2.8**
 - Docker: **v19.03.8**

## Requirements

To install this Docker container, you must have:

1. Docker Desktop (More information [here](https://docs.docker.com/docker-for-windows/install/#what-to-know-before-you-install))
2. Git Bash

-------------
 - Docker Desktop can be downloaded [here](https://www.docker.com/products/docker-desktop)
 - Git Bash can be downloaded [here](https://git-scm.com/downloads)
-------------

## Installation

### Clone

> Clone this repo to your local machine using `https://github.com/Nauris-Putans/Symfony-Docker.git`

```bash
git clone https://github.com/Nauris-Putans/Symfony-Docker.git
cd Symfony-Docker
```

### Setup

> Build docker compose file

```bash
docker-compose build
```

> Run docker compose file in background

```bash
docker-compose up -d
```

> Access the Php container

```bash
winpty docker exec -it sf2_php bash
```

> Install composer

```bash
composer install
```

---
> If there is a problem downloading composer use this commands

```bash
composer dump-autoload
```

Or

```bash
COMPOSER_MEMORY_LIMIT=-1 composer install
```

Or stop all containers except sf2_php and then try commands

---

> When prompted by parameter entering, simply press "Enter" button (already created in parameter template)
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
s3_bucket_name (media): 
s3_access_key (accessKey1): 
s3_secret_key (verySecretKey1): 
s3_region ("us-east-1"): 
s3_version ("2006-03-01"): 
s3_sdk_version (3): 
```

> On screen should apper this text 
```diff 
+ [OK] All assets were successfully installed.
```

You can now enter "localhost" in browser and vola 👍

---

If on screen apears bug like this 
```diff
- [Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException]
- 
- Circular reference detected for service "knp_menu.matcher", path: "knp_menu.matcher -> sonata.admin.menu.matcher.
- voter.children -> knp_menu.matcher".
```
then go to "Symfony-Docker\code\vendor\sonata-project\admin-bundle\Resources\config\menu.xml" and remove these lines

```diff
23         <service id="sonata.admin.menu.matcher.voter.children" class="Sonata\AdminBundle\Menu\Matcher\Voter\ChildrenVoter">
24                     <argument type="service" id="knp_menu.matcher"/>
25                     <tag name="knp_menu.voter"/>
26                 </service>
```

### Everything should be done and ready to work! ✅
If you have any questions about this Docker container installation instructions, feel free to write to - **nauris-putans@Inbox.lv** 
