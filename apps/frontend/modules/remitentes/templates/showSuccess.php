<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $remitentes->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $remitentes->getNombre() ?></td>
    </tr>
    <tr>
      <th>Direccion:</th>
      <td><?php echo $remitentes->getDireccion() ?></td>
    </tr>
    <tr>
      <th>Telefono:</th>
      <td><?php echo $remitentes->getTelefono() ?></td>
    </tr>
    <tr>
      <th>Ciudad:</th>
      <td><?php echo $remitentes->getCiudad() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $remitentes->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $remitentes->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('remitentes/edit?id='.$remitentes->getId()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('remitentes/index') ?>">Ver Todos</a>
