<?php
$this->Breadcrumbs->add('Inicio', '/');
$this->Breadcrumbs->add(ucfirst($entity_name_plural), [
    'controller' => $this->request->getParam('controller'),
    'action' => 'index'
]);
$this->Breadcrumbs->add('Añadir ' . $entity_name, [
    'controller' => $this->request->getParam('controller'),
    'action' => 'add'
]);
$header = [
    'title' => 'Añadir ' . $entity_name,
    'breadcrumbs' => true
];
?>

<?= $this->element("header", $header); ?>
<div class="content">
    <?= $this->Form->create(
        $entity,
        [
            'class' => 'admin-form',
            'type' => 'file'
        ]
    ); ?>
    <div class="primary full">
        <div class="form-block">
            <h3>Datos generales</h3>
            <?= $this->Form->control(
                'name',
                [
                    'label' => 'Nombre del grupo',
                    'type' => 'text'
                ]
            ); ?>
            <?= $this->Form->control(
                'users._ids',
                [
                    'label' => 'Estudiantes',
                    'options' => $students,
                    'empty' => 'Selecciona los usuarios pertenecientes a este grupo',
                    'templateVars' => [
                        'help' => 'Introduce los usuarios de este grupo de practicas. Puedes administrarlos desde el ' . $this->Html->link(
                            'administrador de estudiantes',
                            [
                                'controller' => 'Users',
                                'action' => 'index'
                            ]
                        ) . '.'
                    ]
                ]
            ); ?>
        </div><!-- .form-block -->
    </div><!-- .primary -->
    <?= $this->element("form/save-block"); ?>
    <?= $this->Form->end(); ?>
</div><!-- .content -->