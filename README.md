# Чекер ИНН

### Сервис позволяет определить по ИНН, является ли физическое лицо самозанятым

---
Чтобы склонировать проект воспользуйтесь командой

   ```shell
   git clone https://github.com/Fenris-v/inn-checker.git
   ```

---
Для первого запуска проекта можно воспользоваться shell скриптом, который лежит в корне проекта:

```shell
bash install.sh
```

Либо выполнить следующую последовательность действий:

1. Переименовать `.env.example` в `.env`.
2. Если запуск происходит впервые и Sail еще не установлен, то необходимо выполнить следующую команду
   ```shell
   docker run --rm \
       -u "$(id -u):$(id -g)" \
       -v $(pwd):/opt \
       -w /opt \
       laravelsail/php80-composer:latest \
       composer install --ignore-platform-reqs
   ```
3. Запустить проект через Sail (docker). В описании используются настроенные алиасы, если они не настроены, то
   обратитесь к официальной [документации](https://laravel.com/docs/8.x/sail#configuring-a-bash-alias)
   ```shell
   sail up
   ```
4. Установить зависимости для composer
   ```shell
   sail composer install
   ```
5. Сгенерировать ключ
   ```shell
   sail artisan key:generate
   ```
6. Выполнить миграции
   ```shell
   sail artisan migrate
   ```

---

Для Последующих запусков достаточно выполнить команду

   ```shell
   sail up
   ```

---
Устанавливать зависимости для frontend необходимости нет, т.к. к проекту приложены уже скомпилированные стили.  
Сайт будет доступен по адресу [http://localhost](http://localhost)  
