<?php
$settings['display'] = 'horizontal';
$settings['fields'] = array(
    'key' => array(
        'caption' => 'Ключ',
        'type' => 'text',
        'width' => '20%'
    ),
    'value' => array(
        'caption' => 'Значение',
        'type' => 'text',
        'width' => '75%'
    ),
);
$settings['templates'] = array(
    'outerTpl' => '<table class="table table-borderless table-sm">
                        <tbody>
                            [+wrapper+]
                            <tr><td class="pl-0"><b>Рейтинг:</b></td><td>[!getStars!]</td></tr>
                        </tbody>
                    </table>',
    'rowTpl' => '<tr><td class="pl-0"><b>[+key+]:</b></td><td>[+value+]</td></tr>'
);
$settings['configuration'] = array(
    'enablePaste' => false,
    'enableClear' => false,
    'csvseparator' => ','
);