# Laravel Form Package

## 1. Installation
```shell
composer require ahmeti/form
```

## 2. Form Open & Close
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

## 2. Input Text
```php
{{ Form::text()
    ->id('user-form-input-text-id')
    ->autocomplete('on')
    ->class('input-text-class')
    ->addClass('user-input-text')
    ->disabled(false)
    ->maxlength(100)
    ->max(100) /* Shorthand */
    ->name('user_name')
    ->placeholder('Please write your name')
    ->ph('Please write your name...') /* Shorthand */
    ->readonly(false)
    ->style('min-width:100px')
    ->value('Joe Doe')
    ->get() }}
```