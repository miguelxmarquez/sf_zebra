<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $plantillas->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $plantillas->getNombre() ?></td>
    </tr>
    <tr>
      <th>Clientes:</th>
      <td><?php echo $plantillas->getClientesId() ?></td>
    </tr>
    <tr>
      <th>Contactos:</th>
      <td><?php echo $plantillas->getContactosId() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $plantillas->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $plantillas->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('plantillas/edit?id='.$plantillas->getId()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('plantillas/index') ?>">Ver Todos</a>
