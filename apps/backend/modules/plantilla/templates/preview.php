<?php use_helper('I18N', 'Date') ?>
<?php include_partial('plantilla/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Imprimiendo la Plantilla "%%nombre%%"', array('%%nombre%%' => $Plantilla->getNombre()), 'messages') ?></h1>

  <?php include_partial('plantilla/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('plantilla/form_header', array('Plantilla' => $Plantilla, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('plantilla/form', array('Plantilla' => $Plantilla, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('plantilla/form_footer', array('Plantilla' => $Plantilla, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
