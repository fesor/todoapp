FORMAT: 1A
HOST: http://todoapp.fesor.rocks/

TodoApp API Documentation
================================

# Group Users

## Register user [POST /users]

User registration with just email/password

+ Request (application/json)
    Example of successful request
    + Attributes(User Registration)
+ Response 201 (application/json)
    + Attributes(User Profile)

+ Request (application/json)
    Example of request with invalid data
    + Attributes(User Registration)
        + email: (string, required)
+ Response 400 (application/json)
    + Attributes(object)

# Data Structures

## User
+ first_name: John (string, required)
+ last_name: Smith (string, required)

## User Registration (User)
+ email: `user@example.com` (string, required)
+ password: `example` (string, required)

## User Profile (User)
+ id: ch72gsb320000udocl363eofy (string, required)
    This is just CUID
