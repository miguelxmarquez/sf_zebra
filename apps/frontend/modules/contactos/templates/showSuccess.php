<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $contactos->getId() ?></td>
    </tr>
    <tr>
      <th>Cliente:</th>
      <td><?php echo $contactos->getClienteId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $contactos->getNombre() ?></td>
    </tr>
    <tr>
      <th>Funcion:</th>
      <td><?php echo $contactos->getFuncion() ?></td>
    </tr>
    <tr>
      <th>Cargo:</th>
      <td><?php echo $contactos->getCargo() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $contactos->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $contactos->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('contactos/edit?id='.$contactos->getId()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('contactos/index') ?>">Ver Todos</a>
