# Symfony 2.8 🎶 + Docker 🐋
[![N|Solid](https://cdn.iconscout.com/icon/free/png-256/symfony-4-1174989.png)](https://symfony.com/)[![N|Solid](https://tutorials.kevashcraft.com/img/common/docker-logo.png)](https://www.docker.com/) 

Server with **Apache, Php, Maildev, Phpmyadmin, Mysql and Symfony 2.8**

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
> If there is a problem downloading composer use this command

```bash
composer dump-autoload
```
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
```

> On screen should apper this text 
```diff 
+ [OK] All assets were successfully installed.
```

You can now enter "localhost" in browser and vola 👍

### Everything should be done and ready to work! ✅
If you have any questions about this Docker container installation instructions, feel free to write to - **nauris-putans@Inbox.lv** 
