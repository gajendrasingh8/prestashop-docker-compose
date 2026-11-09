# PrestaShop on Docker (Docker Compose)

Dockerized PrestaShop 8.1 development environment with MySQL 8, persistent
volumes, healthchecks, automated install and bind-mounted module development.

## Stack
- PrestaShop 8.1 (Apache + PHP)
- MySQL 8.0
- Docker Compose

## Features
- One-command setup: `docker compose up -d`
- MySQL healthcheck, PrestaShop installs only after DB is ready
- Persistent volumes for DB and shop files
- Bind-mounted `modules/dockerdemo` for live module development
- Credentials via `.env` (not committed)

## Quick start
```bash
git clone https://github.com/gajendrasingh8/prestashop-docker-compose.git
cd prestashop-docker
cp .env.example .env      # set your own passwords
docker compose up -d
docker compose logs -f prestashop   # wait for install to finish (3-5 min)
```

- Front office: http://localhost:8080
- Back office: http://localhost:8080/admin-demo

## Module development
Module code lives in `modules/dockerdemo`. After editing:
```bash
docker exec ps_app rm -rf /var/www/html/var/cache/*
```

## Useful commands
```bash
docker compose ps
docker compose logs -f prestashop
docker exec -it ps_app bash
docker compose down        # stop (data kept)
docker compose down -v     # stop and delete data
```

## Troubleshooting
| Problem | Fix |
|---|---|
| CSS/images broken | Check `PS_DOMAIN`, clear cache |
| DB connection error | Check `DB_SERVER=mysql` and healthcheck |
| Port busy | Change `8080` to another port and update `PS_DOMAIN` |

## Author
Gajendra Singh, PHP/PrestaShop developer