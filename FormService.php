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
            'action' => null,
            'autocomplete' => config('form.form.autocomplete'),
            'class' => config('form.form.class'),
            'enctype' => config('form.form.enctype'),
            'method' => config('form.form.method'),
            'target' => null,

            'data-form-type' => config('form.form.data_form_type'),

            'onkeypress' => config('form.form.onkeypress'),
        ];
    }

    public function id($id)
    {
        $this->attrs['id'] = $id;
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
        $this->attrs['class'] = trim($this->attrs['class'].' '.$class);
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
        $html = '';
        foreach ($this->attrs as $key => $value){
            if( ! is_null($value) ){
                $html .= $key.'="'.$value.'"';
            }
        }

        return new HtmlString('<form '.$html.'>');
    }

    public function close()
    {
        return new HtmlString('</form>');
    }


    public function text()
    {
        return new InputText();
    }
}