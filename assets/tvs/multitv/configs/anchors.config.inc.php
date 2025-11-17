<?php
$settings['display'] = 'horizontal';
$settings['fields'] = array(
    'number' => array(
        'caption' => 'Номер',
        'type' => 'text',
        'width' => '10%'
    ),
    'anchor' => array(
        'caption' => 'Якорь',
        'type' => 'text',
        'width' => '20%'
    ),
    'link' => array(
        'caption' => 'Описание ссылки',
        'type' => 'text',
        'width' => '65%'
    ),
);
$settings['templates'] = array(
    'outerTpl' => '<div class="blog-anchors my-4">
                        <p class="mb-2"><strong>Содержание:</strong></p>
                        <ul class="list-group">[+wrapper+]</ul>
                   </div>',
    'rowTpl' => '<li class="list-group-item list-group-item-action list-group-item-light"><span>[+number+].</span> <a href="#[+anchor+]">[+link+]</a></li>'
);
$settings['configuration'] = array(
    'enablePaste' => false,
    'enableClear' => false,
    'csvseparator' => ','
);