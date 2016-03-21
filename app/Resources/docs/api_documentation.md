FORMAT: 1A
HOST: http://todoapp.fesor.rocks/

TodoApp API Documentation
================================

# Group Users

## Register user [POST /api/v1/users]

User registration with just email/password

+ Request (application/json)
    Example of successful request
    + Attributes(User Registration)

+ Response 201 (application/json)
    + Attributes(User Profile)


+ Request (application/json)
    Example of not unique constraint
    + Attributes(User Registration)
        + email: (string, required)

+ Response 409 (application/json)
    + Attributes(object)
        + message: Email is already taken (string, required)


+ Request (application/json)
    Example of request with invalid data
    + Attributes(User Registration)
        + email: (string, required)

+ Response 400 (application/json)
    + Attributes(object)
        + message: Invalid data (string, required)

## Login [POST /api/v1/sessions]

Create user session or basicly login into the system

+ Request (application/json)
    Successful login
    + Attributes(Credentials)
        + provider: basic
        + identity: user@example.com
        + secret: example

+ Response 201 (application/json)
    + Attributes(Session)


+ Request (application/json)
    Invalid credentials
    + Attributes(Credentials)
        + provider: basic
        + identity: user@example.com
        + secret: wrong_password

+ Response 401 (application/json)


+ Request (application/json)
    Invalid credentials
    + Attributes(Credentials)
        + provider: basic (string, required)
        + identity: user@example.com (string, required)
        + secret: (string, required)

+ Response 400 (application/json)
    + Attributes(Invalid Request Error)
        + message: Invalid data (string, required)
        + errors (array)
            + (Failed Constraint)
                + path: `/secret` (string, required)
                + message: Secret is required (string, required)

## User profile [/api/v1/users/{user_id}]

+ Parameters
    + user_id: ch72gsb320000udocl363eofy (string, required)
        UUID of user profile

### Update Profile [PUT]

+ Request (application/json)
    + Attributes(User)

+ Response 200 (application/json)
    + Attributes(User Profile)

## Change Password [PATCH]

+ Request (application/json)
    + Attributes(array)
        + (object)
            + path: `/password`  (string, required)
            + type: replace  (string, required)
            + value: `foobar` (string, required)

+ Response 200 (application/json)

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

## Credentials
+ provider (enum, required)
    - basic (string)
    - facebook (string)
    - twitter (string)
    - google (string)
+ identity (string, required)
+ secret (string, required)
+ extra (object)

## Session
+ token (string, required)
    JWT token

## Error
+ message (string, required)

## Invalid Request Error (Error)
+ errors (array[Failed Constraint])

## Failed Constraint
+ path (string, required)
+ message (string, required)
