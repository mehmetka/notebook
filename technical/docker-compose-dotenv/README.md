# docker-compose-dotenv

    $ docker compose config 
    Output:
    services:
    db:
        container_name: mysql
        environment:
        MYSQL_DATABASE: databasename
        MYSQL_PASSWORD: password
        MYSQL_ROOT_PASSWORD: root
        MYSQL_USER: username
        image: mysql:5.6.28
        networks:
        default: null
        restart: always
    networks:
    default:
        name: docker-compose-dotenv_default