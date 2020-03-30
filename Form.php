<?php

namespace Ahmeti\Form;

use Illuminate\Support\Facades\Facade;

class Form extends Facade {
    protected static function getFacadeAccessor() { return 'formservice'; }
}