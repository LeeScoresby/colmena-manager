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
                    'label' => 'Nombre del estudiante',
                    'type' => 'text'
                ]
            ); ?>
            <?= $this->Form->control(
                'surnames',
                [
                    'label' => 'Apellidos del estudiante',
                    'type' => 'text'
                ]
            ); ?>
            <?= $this->Form->control(
                'email',
                [
                    'label' => 'Email del estudiante',
                    'type' => 'email'
                ]
            ); ?>
            <?= $this->Form->control(
                'phone',
                [
                    'label' => 'Teléfono del estudiante',
                    'type' => 'number'
                ]
            ); ?>
            <?= $this->Form->control(
                'role_id.ids',
                [
                    'label' => 'Rol',
                    'options' => $roles,
                    'templateVars' => [
                        'help' => 'Selecciona el autor de la noticia'
                    ]
                ]
            ); ?>
        </div><!-- .form-block -->
    </div><!-- .primary -->
    <?= $this->element("form/save-block"); ?>
    <?= $this->Form->end(); ?>
</div><!-- .content -->