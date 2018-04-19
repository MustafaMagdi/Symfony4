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
* [ ] Integrate [blackfire.io](https://blackfire.io/).
* [ ] Add tests.

# Documentation
* [x] Why.
* [ ] Why Symfony.
* [x] How to setup.
* [x] Run the app.
* [x] Installing new packages.
* [x] Profiling.
* [x] How to integrate JWT with Symfony security system.
* [x] How to create a new endpoint.
* [x] References for Symfony4.

### Why
Add the minimal amount of components and services that serve the needs of having Restful API following the standards.

### Why Symfony
Wait for it.

### How to setup
1. Clone the repo:
```ssh
git clone https://github.com/MustafaMagdi/Symfony4.git
```

2. Install packages:
```ssh
cd Symfony4 && composer install
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
It might asks you for passphrase, provide it and add it to your `.env` file:
```ssh
JWT_PASSPHRASE=whatever
```

5. Configure [NelmioCorsBundle](https://github.com/nelmio/NelmioCorsBundle), check your `config/packages/nelmio_cors.yaml` file.

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

### Installing new services
Before you start searching in [Packagist](https://packagist.org/), have a look at [Symfony.sh](https://symfony.sh/) which is a hub for Symfony services configuration. It is playing with [Symfony flex](https://github.com/symfony/flex) and [Symfony recipes](https://github.com/symfony/recipes) a really nice role in Symfony4.

I am going to provide more details about it soon.

### Profiling
Symfony is already coming up with a really nice [Profiler Component](https://symfony.com/doc/current/profiler.html), 
to see the nice profiler bar in browser, just send `_profiler` param in your request, it even dumps the response body.

On development env, you still can open the profiler url form the response header, just check the `X-Debug-Token-Link`.

### How to integrate JWT with Symfony security system
In order to understand how Symfony security system is working, check [the documentation here](https://symfony.com/doc/current/security.html).
We have two steps to configure JWT with Symfony security system:

One second, if you are not aware about JWT, just check [jwt.io](https://jwt.io/).

##### 1. Login the user:
You need to generate the token for the user:
```ssh
Controller/AuthController.php:generateToken
```

##### 2. Validate the user:
By defining the authenticator class in `config/packages/security.yaml`:
```yaml
        guard:
            authenticators:
                - App\Security\JwtTokenAuthenticator
```
Check `App\Security\JwtTokenAuthenticator:getUser`, which you decode the token and match with your DB user record, 
then, you return the `Symfony\Component\Security\Core\User` object with a dummy user role that should match what we 
have in `security.yaml`:
```yaml
    access_control:
        - { path: ^/profile, roles: ROLE_USER }
```

### How to create a new endpoint
It is very simple, you will notice at the docblock of the controller functions:
```php
    /**
     * @Route("/auth") // where you provide the route
     * @Method({"POST"}) // where you provide the HTTP method
     * ...
     */
```

### References for Symfony4
In order to involve in Symfony:
1. For sure, it is [Symfony's website](http://symfony.com/doc/current/index.html).
2. [Symfony's blog](http://symfony.com/blog/), they have "A week of Symfony" is being release in a weekly basis with 
all the updates.
3. [KNP Symfony](https://knpuniversity.com/search?q=symfony) there are some courses introduced by [weaverryan](https://github.com/weaverryan), I really like the way he is introducing them. Thanks you @weaverryan.

