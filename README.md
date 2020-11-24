# Ambras blog
Laravel based blog with graphql API support.


## generate oauth client
1. `php artisan passport:client --password`
2. Copy client ID and secret to .env file.  
    ```
   PASSPORT_CLIENT_ID=1
   PASSPORT_CLIENT_SECRET=f9zxSj29zy2dbnb55ykFior6EtYxImIQVTK6r53t
      ```

### authenticate with graphql
```
mutation {
  login(input: {
    username: "kobe@hotmail.com",
    password: "..."
  }) {
    access_token
    refresh_token
    expires_in
    token_type
    user {
      id
      email
      name
    }
  }
}
```

Use the access_token to set the following header

```
{
  "Authorization": "Bearer <access_token>"
}
```
Run a protected mutation
```
mutation { 
	createPost(title:"graph ql insert", body: "body ql insert"){
    id
    author {name}
    title
    body
  }
}
```

## add mailtrap smtp server for email support
1. create account on mailtrap
2. Copy username and password to .env file
```
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.mailtrap.io
   MAIL_PORT=2525
   MAIL_USERNAME=...
   MAIL_PASSWORD=...
      ```
