<?php

namespace Ahmeti\Form;

use Illuminate\Support\HtmlString;

class InputDefault
{
    protected $attrs = [];
    protected $extras = [];

    public function __construct()
    {
        $this->attrs = [
            'type' => null,

            'id' => null,
            'autocomplete' => config('form.input.autocomplete'),
            'disabled' => null,
            'maxlength' => null,
            'name' => null,
            'placeholder' => null,
            'readonly' => null,
            'style' => null,
            'value' => null,
        ];

        $this->extras = [
            'group_class' => null,
            'group_style' => null,
            'label' => null,
            'label_title' => null,
            'description' => null,
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

    // Extras
    public function groupClass($groupClass)
    {
        $this->extras['group_class'] = $groupClass;
        return $this;
    }

    public function groupStyle($groupStyle)
    {
        $this->extras['group_style'] = $groupStyle;
        return $this;
    }

    public function label($label)
    {
        $this->extras['label'] = $label;
        return $this;
    }

    public function labelTitle($labelTitle)
    {
        $this->extras['label_title'] = $labelTitle;
        return $this;
    }

    public function description($description)
    {
        $this->extras['description'] = $description;
        return $this;
    }

    public function desc($description)
    {
        $this->extras['description'] = $description;
        return $this;
    }

    public function getRaw()
    {
        $html = '';
        foreach ($this->attrs as $key => $value){
            if( ! is_null($value) ){
                $html .= $key.'="'.$value.'"';
            }
        }

        return new HtmlString('<input '.$html.' />');
    }

    public function get()
    {
        $replaces = [
            '@group_class@' => $this->extras['group_class'] ? ' '.$this->extras['group_class'] : '',
            '@group_style@' => $this->extras['group_style'] ? ' style="'.$this->extras['group_style'].'"' : '',
            '@label@' => $this->extras['label'],
            '@label_title@' => $this->extras['label_title'],
            '@element@' => $this->getRaw(),
        ];

        if( $this->extras['description'] ){
            $replaces['@description_template@'] = config('form.description_template');
            $replaces['@description@'] = $this->extras['description'];
        }else{
            $replaces['@description_template@'] = '';
        }

        $html = str_replace(array_keys($replaces), array_values($replaces), config('form.template'));

        return new HtmlString($html);
    }
}