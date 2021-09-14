# Чекер ИНН
### Сервис позволяет определить по ИНН, является ли физическое лицо самозанятым

Для запуска проекта необходимо выполнить следующую последовательность действий:

1. Склонировать проект
   ```shell
   git clone https://github.com/Fenris-v/inn-checker.git
   ```
2. Переименовать `.env.example` в `.env`.
3. Если запуск происходит впервые и Sail еще не установлен, то необходимо выполнить следующую команду
   ```shell
   docker run --rm \
       -u "$(id -u):$(id -g)" \
       -v $(pwd):/opt \
       -w /opt \
       laravelsail/php80-composer:latest \
       composer install --ignore-platform-reqs
   ```
4. Запустить проект через Sail (docker). В описании используются настроенные алиасы, если они не настроены, то
   обратитесь к официальной [документации](https://laravel.com/docs/8.x/sail#configuring-a-bash-alias)
   ```shell
   sail up
   ```
5. Установить зависимости для composer
   ```shell
   sail composer install
   ```
6. Выполнить миграции
   ```shell
   sail artisan migrate
   ```
---
Устанавливать зависимости для frontend необходимости нет, т.к. к проекту приложены уже скомпилированные стили.
