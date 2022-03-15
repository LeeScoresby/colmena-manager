
<?php
use Cake\ORM\TableRegistry;

$props_table = TableRegistry::getTableLocator()->get('Colmena/SectionsManager.SiteProperties');
$props = $props_table->find('all')
    ->select('emails')
    ->first();

$link_color = $props['emails']['link_color'];
?>
<style type="text/css">
    body {
        margin: 0;
        padding: 0;
    }

    table,
    td,
    tr {
        vertical-align: top;
        border-collapse: collapse;
    }

    * {
        line-height: inherit;
    }

    a[x-apple-data-detectors=true] {
        color: inherit !important;
        text-decoration: none !important;
    }

    a {
        color: <?= $link_color; ?>
    }
</style>
<style id="media-query" type="text/css">
    @media (max-width: 620px) {

        .block-grid,
        .col {
            min-width: 320px !important;
            max-width: 100% !important;
            display: block !important;
        }

        .block-grid {
            width: 100% !important;
        }

        .col {
            width: 100% !important;
        }

        .col>div {
            margin: 0 auto;
        }

        img.fullwidth,
        img.fullwidthOnMobile {
            max-width: 100% !important;
        }

        .no-stack .col {
            min-width: 0 !important;
            display: table-cell !important;
        }

        .no-stack.two-up .col {
            width: 50% !important;
        }

        .no-stack .col.num4 {
            width: 33% !important;
        }

        .no-stack .col.num8 {
            width: 66% !important;
        }

        .no-stack .col.num4 {
            width: 33% !important;
        }

        .no-stack .col.num3 {
            width: 25% !important;
        }

        .no-stack .col.num6 {
            width: 50% !important;
        }

        .no-stack .col.num9 {
            width: 75% !important;
        }

        .video-block {
            max-width: none !important;
        }

        .mobile_hide {
            min-height: 0px;
            max-height: 0px;
            max-width: 0px;
            display: none;
            overflow: hidden;
            font-size: 0px;
        }

        .desktop_hide {
            display: block !important;
            max-height: none !important;
        }
    }
</style>