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

    public function __construct()
    {
        $this->attrs['class'] = config('form.class');
        $this->attrs['onkeypress'] = config('form.onkeypress');

        $this->attrs['accept'] = config('form.accept');
        $this->attrs['autocomplete'] = config('form.autocomplete');
        $this->attrs['enctype'] = config('form.enctype');
        $this->attrs['method'] = config('form.method');
        $this->attrs['target'] = config('form.target');
    }

    protected function check()
    {
        if( empty($this->attrs['id']) ){
            $this->attrs['id'] = uniqid();
        }
    }

    public function id($id = null)
    {
        if( is_null($id) ){
            return $this->attrs['id'];
        }

        $this->attrs['id'] = $id;
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