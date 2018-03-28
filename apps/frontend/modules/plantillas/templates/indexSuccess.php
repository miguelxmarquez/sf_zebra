

<h1>Plantillas</h1>

<table>
  <thead>
    <tr>
	  <th>Accion</th>
      <th>Id</th>
      <th>Nombre</th>
      <th>Clientes</th>
      <th>Contactos</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($plantillass as $plantillas): ?>
    <tr>
      <td><a href="<?php echo url_for('plantillas/show?id='.$plantillas->getId()) ?>">Ver</a></td>
      <td><a href="<?php echo url_for('plantillas/show?id='.$plantillas->getId()) ?>"><?php echo $plantillas->getId() ?></a></td>
      <td><?php echo $plantillas->getNombre() ?></td>
      <td><?php echo $plantillas->getClientesId() ?></td>
      <td><?php echo $plantillas->getContactosId() ?></td>
      <td><?php echo $plantillas->getCreatedAt() ?></td>
      <td><?php echo $plantillas->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</br>
<a href="<?php echo url_for('plantillas/new') ?>">Nueva Plantilla</a>