<?php
$settings['display'] = 'horizontal';
$settings['fields'] = array(
    'link' => array(
        'caption' => 'Выбор статьи',
        'type' => 'dropdown',
        'width' => '100%',
        'elements' => '@SELECT `pagetitle`, `id` FROM `prvz_site_content` WHERE parent = 13 ORDER BY `menuindex` ASC'
    ),
);
$settings['templates'] = array(
    'outerTpl' => '<div class="blog-anchors my-4">
                        <p class="mb-2"><strong>Читайте также:</strong></p>
                        <ul class="list-style-none">[+wrapper+]</ul>
                   </div>',
    'rowTpl' => '<li><a href="[~[+link+]~]">[[DocInfo? &docid=`[+link+]` &field=`pagetitle`]]</a></li>'
);
$settings['configuration'] = array(
    'enablePaste' => false,
    'enableClear' => false,
    'csvseparator' => ','
);