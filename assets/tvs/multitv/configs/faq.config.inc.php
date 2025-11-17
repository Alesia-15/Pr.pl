<?php
$settings['display'] = 'vertical';
$settings['fields'] = array(
    'category' => array(
        'caption' => 'Категория',
        'type' => 'text'
    ),
    'question' => array(
        'caption' => 'Вопрос',
        'type' => 'text'
    ),
    'answer' => array(
        'caption' => 'Ответ',
        'type' => 'htmlarea'
    ),
);
$settings['templates'] = array(
    'outerTpl' => '<div class="faq">[+wrapper+]</div>',
    'rowTpl' => '<div><p class="h4">[+category+]</p><a href="javascript://" class="splLink">[+question+]</a><div class="splCont">[+answer+]</div></div>'
);
$settings['configuration'] = array(
    'enablePaste' => false,
    'enableClear' => false,
    'csvseparator' => ','
);