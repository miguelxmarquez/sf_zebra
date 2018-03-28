<h1>Contactos</h1>

<table>
  <thead>
    <tr>
	  <th>Accion</th>
      <th>Id</th>
      <th>Cliente</th>
      <th>Nombre</th>
      <th>Funcion</th>
      <th>Cargo</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contactoss as $contactos): ?>
    <tr>
      <td><a href="<?php echo url_for('contactos/show?id='.$contactos->getId()) ?>">Ver</a></td>
      <td><a href="<?php echo url_for('contactos/show?id='.$contactos->getId()) ?>"><?php echo $contactos->getId() ?></a></td>
      <td><?php echo $contactos->getClienteId() ?></td>
      <td><?php echo $contactos->getNombre() ?></td>
      <td><?php echo $contactos->getFuncion() ?></td>
      <td><?php echo $contactos->getCargo() ?></td>
      <td><?php echo $contactos->getCreatedAt() ?></td>
      <td><?php echo $contactos->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</br>
  <a href="<?php echo url_for('contactos/new') ?>">Nuevo Contacto</a>
