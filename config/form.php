<?php

return [

    'form' => [
        'autocomplete' => 'off',
        'class' => null,
        'enctype' => null,
        'method' => 'GET',

        'data_form_type' => 'ajax',

        'onkeypress' => 'App.stopEnterSubmitting(window.event)',
    ],

    'template' =>
        '<div class="form-group@group_class@"@group_style@>'.
            '<label class="col-sm-3 control-label">'.
                '<div class="ellipsis">'.
                    '<span data-toggle="tooltip" title="@label_title@">@label@</span>'.
                '</div>'.
            '</label>'.
            '<div class="col-sm-9 error-message">@element@@description_template@</div>'.
        '</div>',

    'description_template' => '<p class="help-block">@description@</p>',

    'input' => [
        'autocomplete' => 'off',
    ],

    'input_text' => [
        'class' => 'form-control input-sm',
    ]

];