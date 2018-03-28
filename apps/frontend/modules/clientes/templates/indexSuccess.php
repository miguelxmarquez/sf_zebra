<h1>Clientes</h1>

<table>
  <thead>
    <tr>
	  <th>Accion</th>
      <th>Id</th>
      <th>Nombre</th>
      <th>Nombre tag</th>
      <th>Telefono</th>
      <th>Email</th>
      <th>Direccion</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($clientess as $clientes): ?>
    <tr>
      <td><a href="<?php echo url_for('clientes/show?id='.$clientes->getId()) ?>">Ver</a></td>
      <td><a href=""><?php echo $clientes->getId() ?></a></td>
      <td><?php echo $clientes->getNombre() ?></td>
      <td><?php echo $clientes->getNombreTag() ?></td>
      <td><?php echo $clientes->getTelefono() ?></td>
      <td><?php echo $clientes->getEmail() ?></td>
      <td><?php echo $clientes->getDireccion() ?></td>
      <td><?php echo $clientes->getCreatedAt() ?></td>
      <td><?php echo $clientes->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</br>
  <a href="<?php echo url_for('clientes/new') ?>">Nuevo Cliente</a>
