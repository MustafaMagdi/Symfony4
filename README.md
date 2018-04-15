# Symfony4
Symfnoy4 using Flex with [ReactPHP](https://reactphp.org/) supported.

# Purpose
We didn't re-invent the wheel here, we are just coming up with the latest updates from Symfony4 with some customizations to make it fit your usage in your microservices architecture.

# What Do We Have
* [x] Symfony with Flex module.
* [x] Add ReactPHP.
* [x] Restful support (Simple).
* [x] Custom `ControllerTrait`.
* [x] [Middleware](https://symfony.com/doc/current/event_dispatcher/before_after_filters.html).
* [x] CORS [NelmioCorsBundle](https://github.com/nelmio/NelmioCorsBundle).
* [x] GWT [LexikJWT](https://github.com/lexik/LexikJWTAuthenticationBundle).
* [x] Add Debug via parameters (like sending `_profile` as a param).
* [x] Basic Authentication.
* [x] Basic AccessControl.
* [ ] Unify the response body/add a pattern.
* [ ] Add `ExceptionalTrait`.
* [x] Use [PSR-7 Bridge](https://symfony.com/doc/current/components/psr7.html) with ReactPHP.
* [x] Clean the code.
* [ ] Add tests.

# Documentation
* [x] Why.
* [ ] Why Symfony.
* [x] How to setup.
* [x] Run the app.
* [x] Profiling.
* [ ] How security system is working.

### Why
Add the minimal amount of components and services that serve the need of having Restful API.

### Why Symfony
Wait for it.

### How to setup
1. Clone the repo:
```ssh
https://github.com/MustafaMagdi/Symfony4.git
```

2. Install packages:
```ssh
composer install
```

3. Configure `.env` file:
```ssh
cp .env.dist .env
```

4. Generate SSH keys for [LexikJWT](https://github.com/lexik/LexikJWTAuthenticationBundle):
```ssh
$ mkdir -p var/jwt
$ openssl genrsa -out var/jwt/private.pem -aes256 4096
$ openssl rsa -pubout -in var/jwt/private.pem -out var/jwt/public.pem
```

And now, you run the application:

### Run the app
1. For the regular setup:
```ssh
./bin/console server:run
```

2. For ReactPHP:
```ssh
php public/index.react.php
```

### Profiling
Symfony is already coming up with a really nice [Profiler Component](https://symfony.com/doc/current/profiler.html), 
to see the nice profiler bar in browser, just send `_profiler` param in your request, it even dumps the response body.

On development env, you still can open the profiler url form the response header, just check the `X-Debug-Token-Link`.
