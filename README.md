# Как запустить проект

1. Продублировать `.env.example` и назвать дубликат `.env`
2. Создать docker-сеть: `docker network create adlibis`
3. Поднять образ через docker-compose. Команда: `docker-compose up -d --build`
4. Сгенерировать ключ приложения: `docker compose run --rm --remove-orphans artisan key:generate`
5. Запустить миграции: `docker compose run --rm --remove-orphans migrate`
6. Сгенерировать тестовые данные `docker compose run --rm --remove-orphans db:seed`

Открыть документацию в Postman можно по [ссылке](https://www.postman.com/lunar-escape-403761/workspace/team-workspace)
