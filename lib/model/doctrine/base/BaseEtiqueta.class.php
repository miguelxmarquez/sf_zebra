<?php

/**
 * BaseEtiqueta
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nombre
 * @property string $cliente_id
 * @property string $contacto_id
 * @property Cliente $Cliente
 * @property Contacto $Contacto
 * 
 * @method integer  getId()          Returns the current record's "id" value
 * @method string   getNombre()      Returns the current record's "nombre" value
 * @method string   getClienteId()   Returns the current record's "cliente_id" value
 * @method string   getContactoId()  Returns the current record's "contacto_id" value
 * @method Cliente  getCliente()     Returns the current record's "Cliente" value
 * @method Contacto getContacto()    Returns the current record's "Contacto" value
 * @method Etiqueta setId()          Sets the current record's "id" value
 * @method Etiqueta setNombre()      Sets the current record's "nombre" value
 * @method Etiqueta setClienteId()   Sets the current record's "cliente_id" value
 * @method Etiqueta setContactoId()  Sets the current record's "contacto_id" value
 * @method Etiqueta setCliente()     Sets the current record's "Cliente" value
 * @method Etiqueta setContacto()    Sets the current record's "Contacto" value
 * 
 * @package    zebra
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEtiqueta extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('etiqueta');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('nombre', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('cliente_id', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('contacto_id', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Cliente', array(
             'local' => 'cliente_id',
             'foreign' => 'id'));

        $this->hasOne('Contacto', array(
             'local' => 'contacto_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             'created' => 
             array(
              'name' => 'created_at',
              'type' => 'timestamp',
              'format' => 'Y-m-d H:i:s',
              'options' => 
              array(
              'notnull' => false,
              'required' => false,
              ),
             ),
             'updated' => 
             array(
              'name' => 'updated_at',
              'type' => 'timestamp',
              'format' => 'Y-m-d H:i:s',
              'options' => 
              array(
              'notnull' => false,
              'required' => false,
              ),
             ),
             ));
        $this->actAs($timestampable0);
    }
}