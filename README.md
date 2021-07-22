# Laravel Form Package

## 1. Installation
```shell
composer require ahmeti/form
```

## 2. How to Use
```php
{{ Form::open() }}

// ...

{{ Form::close() }}
```

```php
{{ Form::id('user-form-id')
    ->action('/users')
    ->autocomplete('on')
    ->class('form-class')
    ->addClass('user-form')
    ->enctype('multipart/form-data')
    ->method('POST')
    ->target('_blank')
    ->open() }}

// ...

{{ Form::close() }}
```