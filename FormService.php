<?php

namespace Ahmeti\Form;

use Illuminate\Support\HtmlString;

class FormService
{
    protected $attrs = [];

    public function __construct()
    {
        $this->attrs = [
            'id' => uniqid(),

            'accept' => config('form.form.accept'),
            'action' => config('form.form.action'),
            'autocomplete' => config('form.form.autocomplete'),
            'class' => config('form.form.class'),
            'enctype' => config('form.form.enctype'),
            'method' => config('form.form.method'),
            'target' => config('form.form.target'),

            'data-form-type' => config('form.form.data_form_type'),

            'onkeypress' => config('form.form.onkeypress'),
        ];
    }

    public function id($id)
    {
        $this->attrs['id'] = $id;
        return $this;
    }

    public function accept($accept)
    {
        $this->attrs['accept'] = $accept;
        return $this;
    }

    public function action($action)
    {
        $this->attrs['action'] = $action;
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
        $this->attrs['class'] = trim((string)$this->attrs['class'].' '.$class);
        return $this;
    }

    public function enctype($enctype)
    {
        $this->attrs['enctype'] = $enctype;
        return $this;
    }

    public function method($method)
    {
        $this->attrs['method'] = $method;
        return $this;
    }

    public function target($target)
    {
        $this->attrs['target'] = $target;
        return $this;
    }

    public function open()
    {
        $items = [];
        foreach ($this->attrs as $key => $value){
            if( ! is_null($value) ){
                $items []= $key.'="'.$value.'"';
            }
        }

        return new HtmlString('<form '.implode(' ', $items).'>');
    }

    public function close()
    {
        return new HtmlString('</form>');
    }
}