<?php
    $config = $item['config'];
    $config['key'] = $key;
?>
<div class="parameters-item">
    <?= $this->element('parameters/types/'.$item['type'], [ 
        'config' => $config,
        'default_classes' => $default_classes
    ]); ?>
</div>