<?php

namespace Ahmeti\Form;

use Illuminate\Support\HtmlString;

class InputText extends InputDefault
{
    protected $attrs = [];
    protected $extras = [];

    public function __construct()
    {
        parent::__construct();

        $this->attrs['type'] = 'text';
        $this->attrs['class'] = config('form.input_text.class');
    }

    public function maxlength($maxlength)
    {
        $this->attrs['maxlength'] = $maxlength;
        return $this;
    }

    public function max($max)
    {
        $this->attrs['maxlength'] = $max;
        return $this;
    }
}