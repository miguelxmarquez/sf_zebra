CREATE TABLE cliente (id BIGINT AUTO_INCREMENT, nombre VARCHAR(255), nombre_tag VARCHAR(255), telefono VARCHAR(255), email VARCHAR(255), direccion VARCHAR(255), created_at DATETIME, updated_at DATETIME, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE contacto (id BIGINT AUTO_INCREMENT, cliente_id BIGINT, nombre VARCHAR(255), funcion VARCHAR(255), cargo VARCHAR(255), created_at DATETIME, updated_at DATETIME, INDEX cliente_id_idx (cliente_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE plantilla (id BIGINT AUTO_INCREMENT, nombre VARCHAR(255), cliente_id VARCHAR(255), contacto_id VARCHAR(255), created_at DATETIME, updated_at DATETIME, INDEX cliente_id_idx (cliente_id), INDEX contacto_id_idx (contacto_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE remitente (id BIGINT AUTO_INCREMENT, nombre VARCHAR(255), direccion VARCHAR(255), telefono VARCHAR(255), ciudad VARCHAR(255), created_at DATETIME, updated_at DATETIME, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE contacto ADD CONSTRAINT contacto_cliente_id_cliente_id FOREIGN KEY (cliente_id) REFERENCES cliente(id);
ALTER TABLE plantilla ADD CONSTRAINT plantilla_contacto_id_contacto_id FOREIGN KEY (contacto_id) REFERENCES contacto(id);
ALTER TABLE plantilla ADD CONSTRAINT plantilla_cliente_id_cliente_id FOREIGN KEY (cliente_id) REFERENCES cliente(id);
