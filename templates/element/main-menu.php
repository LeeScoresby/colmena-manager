<?php

use Cake\Utility\Inflector;
?>
<div class="nav">
    <nav>
        <div class="content-nav">
            <div class="logo">
                <?= $this->Html->link(
                    $this->Html->image(
                        'logo.svg',
                        ['alt' => 'logo']
                    ),
                    "/",
                    ['escape' => false]
                ); ?>
            </div><!-- .logo -->

            <div class="items">
                <?php
                $actualPlugin = $this->request->getParam('plugin');
                $actualPlugin = $actualPlugin === null ? false : $actualPlugin;
                $is_home = false;

                if (strcmp($this->request->getRequestTarget(), 'pages/home') != 0) {
                    $is_home = true;
                }

                foreach ($menuItems as $section_name => $content_menu) {
                    $items = $content_menu['items'];

                    foreach ($items as $title => $menu_item) {
                        if ($menu_item['link']['controller'] === $this->request->getParam('controller')) {
                            $menu_item['extra']['class'] .= ' current';
                        }

                        $title = $menu_item['icon'] . $title;

                        echo $this->Html->link(
                            $title,
                            $menu_item['link'],
                            $menu_item['extra']
                        );
                    }
                ?>
                <?php
                }
                ?>
            </div><!-- .items -->
        </div><!-- .content-nav -->
    </nav>
</div><!-- .nav -->