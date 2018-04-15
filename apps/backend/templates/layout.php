<!-- apps/frontend/templates/layout.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Zebra Print System</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>

  </head>
  <body>
    <div class="w3-display-container">
        <div class="header">
      <div class="content">
        <h1>
          <a href="<?php echo url_for('plantilla/index') ?>">
            <img src="/images/logo-header.png" alt="Zebra Board" />
          </a>
        </h1>
 
      </div>
    </div>
 
      <div id="content">
        <?php if ($sf_user->hasFlash('notice')): ?>
          <div class="flash_notice">
            <?php echo $sf_user->getFlash('notice') ?>
          </div>
        <?php endif; ?>
 
        <?php if ($sf_user->hasFlash('error')): ?>
          <div class="flash_error">
            <?php echo $sf_user->getFlash('error') ?>
          </div>
        <?php endif; ?>
 
        <div class="content">
          <?php echo $sf_content ?>
        </div>
      </div>
    </br>
    
        <div class="header">
          <div class="menu">
            <div>
              <ul>
                <li><a href="<?php echo url_for('cliente/index') ?>">Clientes</a></li>
                <li><a href="<?php echo url_for('contacto/index') ?>">Contactos</a></li>
                <li><a href="<?php echo url_for('remitente/index') ?>">Remitentes</a></li>
                <li><a href="<?php echo url_for('etiqueta/index') ?>">Etiquetas</a></li>
                <li><a href="<?php echo url_for('plantilla/index') ?>">Plantillas</a></li>

              </ul>
            </div>
          </div>
        </div>
      <div class="footer">
        <div class="content">
          <span class="symfony">
             powered by <a target="_blank" href="http://3creatives.com.co">
            <img src="/images/logo-footer.png" alt="3Creatives" width="90" height="40"/>
            </a>
          </span>
        </div>
      </div>
    
    </div>
  </body>
</html>
