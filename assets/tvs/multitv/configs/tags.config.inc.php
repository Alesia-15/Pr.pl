<?php
$settings['display'] = 'horizontal';
$settings['fields'] = array(
    'tags' => array(
        'caption' => 'Выбор страницы тега',
        'type' => 'dropdown',
        'width' => '100%',
        'elements' => '@SELECT `pagetitle`, `id` FROM `prvz_site_content` WHERE parent = 974 ORDER BY `menuindex` ASC'
    ),
);
$settings['templates'] = array(
    'outerTpl' => '<div>
                        <p class="mb-2"><strong>Теги:</strong></p>
                        <ul class="list-inline">[+wrapper+]</ul>
                   </div>',
    'rowTpl' => '<li class="list-inline-item"><a href="[~[+tags+]~]">[[DocInfo? &docid=`[+tags+]` &field=`pagetitle`]]</a></li>',
    'row.class' => ['first'=>'222']
);
$settings['configuration'] = array(
    'enablePaste' => false,
    'enableClear' => false,
    'csvseparator' => ','
);