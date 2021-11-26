# wp-plugin-practice

## Build enviroment for development

### Requirments
- composer
- docker

```sh
cd wordpress
docker-compose up -d
```

```sh
cd wordpress
docker-compose down -v
```

`-v` removes all persistent data

```
cd wordpress/html/wp-content/plugins/hskwakr-practice
composer install
```
