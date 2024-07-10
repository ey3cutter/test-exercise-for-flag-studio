# Movie Library API

API для управления библиотекой фильмов. Позволяет выполнять операции с фильмами, жанрами и актерами.

## Установка

1. Клонируйте репозиторий
2. Установите зависимости с помощью Composer:
    ```bash
    composer install
    ```
3. Скопируйте файл `.env.example` в `.env` и настройте параметры подключения к базе данных.
4. Выполните миграции:
    ```bash
    php artisan migrate
    ```
5. Запустите локальный сервер:
    ```bash
    php artisan serve
    ```

## API Endpoints

### Фильмы

#### Получить список всех фильмов
- **URL:** `/api/admin/movies`
- **Метод:** GET
- **Пример ответа:**
    ```json
    [
        {
            "id": 1,
            "title": "Movie Title",
            "genre_id": 1,
            "genre": {
                "id": 1,
                "name": "Genre Name"
            },
            "actors": [
                {
                    "id": 1,
                    "name": "Actor Name"
                }
            ]
        }
    ]
    ```

#### Получить фильм по ID
- **URL:** `/api/admin/movies/{movie}`
- **Метод:** GET
- **Пример ответа:**
    ```json
    {
        "id": 1,
        "title": "Movie Title",
        "genre_id": 1,
        "genre": {
            "id": 1,
            "name": "Genre Name"
        },
        "actors": [
            {
                "id": 1,
                "name": "Actor Name"
            }
        ]
    }
    ```

#### Добавить новый фильм
- **URL:** `/api/admin/movies`
- **Метод:** POST
- **Тело запроса:**
    ```json
    {
        "title": "New Movie Title",
        "genre_id": 1,
        "actors": [1, 2]
    }
    ```
- **Пример ответа:**
    ```json
    {
        "id": 2,
        "title": "New Movie Title",
        "genre_id": 1,
        "genre": {
            "id": 1,
            "name": "Genre Name"
        },
        "actors": [
            {
                "id": 1,
                "name": "Actor Name"
            },
            {
                "id": 2,
                "name": "Another Actor Name"
            }
        ]
    }
    ```

#### Обновить фильм
- **URL:** `/api/admin/movies/{movie}`
- **Метод:** PUT/PATCH
- **Тело запроса:**
    ```json
    {
        "title": "Updated Movie Title",
        "genre_id": 1,
        "actors": [1, 2]
    }
    ```
- **Пример ответа:**
    ```json
    {
        "id": 1,
        "title": "Updated Movie Title",
        "genre_id": 1,
        "genre": {
            "id": 1,
            "name": "Genre Name"
        },
        "actors": [
            {
                "id": 1,
                "name": "Actor Name"
            },
            {
                "id": 2,
                "name": "Another Actor Name"
            }
        ]
    }
    ```

#### Удалить фильм
- **URL:** `/api/admin/movies/{movie}`
- **Метод:** DELETE
- **Пример ответа:**
    ```json
    {
        "message": "Movie deleted successfully."
    }
    ```

### Жанры

#### Получить список всех жанров
- **URL:** `/api/admin/genres`
- **Метод:** GET
- **Пример ответа:**
    ```json
    [
        {
            "id": 1,
            "name": "Genre Name"
        }
    ]
    ```

#### Получить жанр по ID
- **URL:** `/api/admin/genres/{genre}`
- **Метод:** GET
- **Пример ответа:**
    ```json
    {
        "id": 1,
        "name": "Genre Name"
    }
    ```

#### Добавить новый жанр
- **URL:** `/api/admin/genres`
- **Метод:** POST
- **Тело запроса:**
    ```json
    {
        "name": "New Genre Name"
    }
    ```
- **Пример ответа:**
    ```json
    {
        "id": 2,
        "name": "New Genre Name"
    }
    ```

#### Обновить жанр
- **URL:** `/api/admin/genres/{genre}`
- **Метод:** PUT/PATCH
- **Тело запроса:**
    ```json
    {
        "name": "Updated Genre Name"
    }
    ```
- **Пример ответа:**
    ```json
    {
        "id": 1,
        "name": "Updated Genre Name"
    }
    ```

#### Удалить жанр
- **URL:** `/api/admin/genres/{genre}`
- **Метод:** DELETE
- **Пример ответа:**
    ```json
    {
        "message": "Genre deleted successfully."
    }
    ```

### Актеры

#### Получить список всех актеров
- **URL:** `/api/admin/actors`
- **Метод:** GET
- **Пример ответа:**
    ```json
    [
        {
            "id": 1,
            "name": "Actor Name"
        }
    ]
    ```

#### Получить актера по ID
- **URL:** `/api/admin/actors/{actor}`
- **Метод:** GET
- **Пример ответа:**
    ```json
    {
        "id": 1,
        "name": "Actor Name"
    }
    ```

#### Добавить нового актера
- **URL:** `/api/admin/actors`
- **Метод:** POST
- **Тело запроса:**
    ```json
    {
        "name": "New Actor Name"
    }
    ```
- **Пример ответа:**
    ```json
    {
        "id": 2,
        "name": "New Actor Name"
    }
    ```

#### Обновить актера
- **URL:** `/api/admin/actors/{actor}`
- **Метод:** PUT/PATCH
- **Тело запроса:**
    ```json
    {
        "name": "Updated Actor Name"
    }
    ```
- **Пример ответа:**
    ```json
    {
        "id": 1,
        "name": "Updated Actor Name"
    }
    ```

#### Удалить актера
- **URL:** `/api/admin/actors/{actor}`
- **Метод:** DELETE
- **Пример ответа:**
    ```json
    {
        "message": "Movie deleted successfully."
    }
    ```
