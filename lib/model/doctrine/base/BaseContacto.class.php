<?php

/**
 * BaseContacto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $cliente_id
 * @property string $nombre
 * @property string $funcion
 * @property string $cargo
 * @property Cliente $Cliente
 * 
 * @method integer  getId()         Returns the current record's "id" value
 * @method integer  getClienteId()  Returns the current record's "cliente_id" value
 * @method string   getNombre()     Returns the current record's "nombre" value
 * @method string   getFuncion()    Returns the current record's "funcion" value
 * @method string   getCargo()      Returns the current record's "cargo" value
 * @method Cliente  getCliente()    Returns the current record's "Cliente" value
 * @method Contacto setId()         Sets the current record's "id" value
 * @method Contacto setClienteId()  Sets the current record's "cliente_id" value
 * @method Contacto setNombre()     Sets the current record's "nombre" value
 * @method Contacto setFuncion()    Sets the current record's "funcion" value
 * @method Contacto setCargo()      Sets the current record's "cargo" value
 * @method Contacto setCliente()    Sets the current record's "Cliente" value
 * 
 * @package    zebra
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseContacto extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('contacto');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('cliente_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('nombre', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('funcion', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('cargo', 'string', 255, array(
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