<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $clientes->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $clientes->getNombre() ?></td>
    </tr>
    <tr>
      <th>Nombre tag:</th>
      <td><?php echo $clientes->getNombreTag() ?></td>
    </tr>
    <tr>
      <th>Telefono:</th>
      <td><?php echo $clientes->getTelefono() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $clientes->getEmail() ?></td>
    </tr>
    <tr>
      <th>Direccion:</th>
      <td><?php echo $clientes->getDireccion() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $clientes->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $clientes->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('clientes/edit?id='.$clientes->getId()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('clientes/index') ?>">Ver Todos</a>
