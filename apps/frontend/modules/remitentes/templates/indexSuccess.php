<h1>Remitentes</h1>

<table id="tabla">
  <thead>
    <tr>
	  <th>Accion</th>
      <th>Id</th>
      <th>Nombre</th>
      <th>Direccion</th>
      <th>Telefono</th>
      <th>Ciudad</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($remitentess as $remitentes): ?>
    <tr>
      <td><a href="<?php echo url_for('remitentes/show?id='.$remitentes->getId()) ?>">Ver</a></td>
      <td><a href="<?php echo url_for('remitentes/show?id='.$remitentes->getId()) ?>"><?php echo $remitentes->getId() ?></a></td>
      <td><?php echo $remitentes->getNombre() ?></td>
      <td><?php echo $remitentes->getDireccion() ?></td>
      <td><?php echo $remitentes->getTelefono() ?></td>
      <td><?php echo $remitentes->getCiudad() ?></td>
      <td><?php echo $remitentes->getCreatedAt() ?></td>
      <td><?php echo $remitentes->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</br>
  <a href="<?php echo url_for('remitentes/new') ?>">Nuevo Remitente</a>
  