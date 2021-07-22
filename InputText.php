<?php

namespace Ahmeti\Form;

use Illuminate\Support\HtmlString;

class InputText
{
    protected $attrs = [];

    public function __construct()
    {
        $this->attrs = [
            'type' => 'text',

            'id' => null,
            'autocomplete' => config('form.input_text.autocomplete'),
            'class' => config('form.input_text.class'),
            'disabled' => null,
            'maxlength' => null,
            'name' => null,
            'placeholder' => null,
            'readonly' => null,
            'style' => null,
            'value' => null,
        ];
    }

    public function id($id)
    {
        $this->attrs['id'] = $id;
        return $this;
    }

    public function autocomplete($autocomplete)
    {
        $this->attrs['autocomplete'] = $autocomplete;
        return $this;
    }

    public function class($class)
    {
        $this->attrs['class'] = $class;
        return $this;
    }

    public function addClass($class)
    {
        $this->attrs['class'] = trim($this->attrs['class'].' '.$class);
        return $this;
    }

    public function disabled($disabled)
    {
        $this->attrs['disabled'] = $disabled ? 'disabled' : null;
        return $this;
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

    public function name($name)
    {
        $this->attrs['name'] = $name;
        return $this;
    }

    public function placeholder($placeholder)
    {
        $this->attrs['placeholder'] = $placeholder;
        return $this;
    }

    public function ph($ph)
    {
        $this->attrs['placeholder'] = $ph;
        return $this;
    }

    public function readonly($readonly)
    {
        $this->attrs['readonly'] = $readonly ? 'readonly' : null;
        return $this;
    }

    public function style($style)
    {
        $this->attrs['style'] = $style;
        return $this;
    }

    public function value($value)
    {
        $this->attrs['value'] = $value;
        return $this;
    }

    public function get()
    {
        $html = '';
        foreach ($this->attrs as $key => $value){
            if( ! is_null($value) ){
                $html .= $key.'="'.$value.'"';
            }
        }

        return new HtmlString('<input '.$html.' />');
    }
}