Make sure you have environment setup properly. You will need PHP8.1, composer and Node.js:

- Clone this project repository `git clone https://github.com/lexiscode/post-api.git`
- Copy `.env.example` into `.env` 
- Navigate to the project's root directory using terminal, `cd post-api`
- Then run `composer install`
- Set the encryption key by executing `php artisan key:generate --ansi`
- Start your XAMPP local server
- Run migrations `php artisan migrate`
- Start local server by executing  `php artisan serve`


POSTMAN WORKSPACE: https://www.postman.com/aerospace-technologist-77645485/workspace/post-api

### API Testing with Postman

The API can be tested using Postman. But note that you will need to first create a JWT authentication token (by creating an account) in order to gain access to the post resources. Once you've registered, then login, and a JWT Bearer Token will be given to you. 

Use the following endpoint to create a user account and also login in order to generate an authorization "Bearer Token":
```
POST /api/register
POST /api/login
```

Sample JSON request body for both the registeration and login, only email and password fields:
```json
{
  "email": "email@example.com",
  "password": "password",
}
```

### Creating a Post
Use the following endpoint to create a new blog post:
```
POST /api/posts
```

Sample JSON request body:
```json
{
  "title": "Sample Title",
  "content": "Sample content.",
}

```

### Reading Posts
- Retrieve all posts:
  ```
  GET /api/posts
  ```

- Retrieve a post by ID:
  ```
  GET /api/posts/{id}
  ```

Sample JSON pretty-read output:

```json
{
    "data": [
        {
            "id": "2",
            "attributes": {
                "title": "Sample Title",
                "content": "Sample Content",
                "created_at": "2025-01-17T22:19:42.000000Z",
                "updated_at": "2025-01-17T22:19:42.000000Z"
            },
            "relationships": {
                "id": "2",
                "username": "alexis",
                "user email": "alexis@gmail.com"
            }
        }
    ]
}

```

### Create new Post
Use the following endpoint to update a blog post:
```
POST /api/posts
```

### Updating a Post
Use the following endpoint to update a blog post:
```
PATCH /api/posts/{id}
```

### Deleting a Post
Use the following endpoint to delete a blog post:
```
DELETE /api/posts/{id}
```

