<?php

namespace Ahmeti\Form;

use Illuminate\Support\HtmlString;

class FormService
{
    # HTML5 Attributes
    public $attrs = [
        'id' => null,
        'class' => null,
        'onkeypress' => null, # App.stopEnterSubmitting(window.event)

        'accept' => null,
        'action' => null,
        'autocomplete' => null,
        'enctype' => null,
        'method' => 'GET',
        'target' => null,
    ];

    public $dataAttrs = [
        'form-type' => 'ajax'
    ];

    protected function check()
    {
        if( empty($this->attrs['id']) ){
            $this->attrs['id'] = uniqid();
        }
    }

    public function id($id = null)
    {
        return dd(config('form.class'));

        if( is_null($id) ){
            return $this->attrs['id'];
        }

        $this->attrs['id'] = $id;
        return $this;
    }

    public function method($method)
    {
        $this->attrs['method'] = $method;
        return $this;
    }

    public function setClass($class)
    {
        $this->attrs['class'] = $class;
        return $this;
    }

    public function addClass($class)
    {
        $this->attrs['class'] = trim((string)$this->attrs['class'].' '.$class);
        return $this;
    }

    public function open()
    {
        $this->check();

        $items = [];

        foreach ($this->attrs as $key => $value){
            if( ! is_null($value) ){
                $items []= $key.'="'.$value.'"';
            }
        }

        foreach ($this->dataAttrs as $key => $value){
            if( ! is_null($value) ){
                $items []= 'data-'.$key.'="'.$value.'"';
            }
        }

        return new HtmlString('<form '.implode(' ', $items).'>');
    }

    public function close()
    {
        $el = '</form>';

        return new HtmlString($el);
    }
}