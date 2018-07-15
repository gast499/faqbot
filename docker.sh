#!/bin/bash

composerf() {
    docker run --rm -v `pwd`:/app composer $1
}

phpf() {
    docker exec -w /code faqbot_php_1 php artisan $1
}

waitForElastic() {
    result="0"
    while [ "$result" != "1" ]
    do
        if docker exec faqbot_php_1 curl -s elastic:9200 | grep tagline -q; then
            result="1"
        fi
    done
}

export MSYS_NO_PATHCONV=1

cp '.env.docker' '.env'

composerf install

docker-compose 'up' '-d'

waitForElastic
phpf 'key:generate'
phpf 'migrate'
phpf 'elastic:create-index App\QuestionIndexConfigurator'
phpf 'elastic:create-index App\TagIndexConfigurator'
phpf 'db:seed'
