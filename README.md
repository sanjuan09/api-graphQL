<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Installation

### Dependencies:

* [Laravel 6.0+](https://github.com/laravel/laravel)
* [GraphQL PHP](https://github.com/webonyx/graphql-php)


### Installation:

Clonar repositorio de github:

Requiere docker engine/docker descktop pre instalado:

Crear aliar de sail:
```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```
inciar el docker:
```bash
sail up -d
```

Instalacion de dependencias con composer:
```bash
sail composer install
```

copiar .env.example a .env

Ejecutar migraciones:
```bash
sail artisan migrate --seed
```

## Usage

ingresar a Api de graphQL

http://localhost:8800/graphiql

Ejemplos de uso:

```bash
mutation{
  CrearTicket(usuario: "jsanjuan2", estatus: "abierto"){
    id,usuario,estatus
  }
}
```

```bash
mutation{
  EditarTicket(id: 22, estatus: "cerrado"){
    id,usuario,estatus
  }
}
```

```bash
mutation{
  BorrarTicket(id: 22)
}
```

```bash
query{
  ticket(id: 20){
    id,usuario,estatus,created_at,updated_at
  }
}
```

```bash
query{
  tickets(page: 2,limit: 5){
    id,usuario,estatus,created_at,updated_at
  }
}
```
