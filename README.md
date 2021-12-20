# wp-plugin-practice

## Build enviroment for development

### Requirments
- docker

Build and start virtual enviroment.

```sh
cd wordpress
docker-compose up -d
```

End virtual enviroment.  
`-v` removes all persistent data.

```sh
cd wordpress
docker-compose down -v
```

Connect to virtual enviroment.

```sh
# web server
localhost:8080

# db server
localhost:3307
```
