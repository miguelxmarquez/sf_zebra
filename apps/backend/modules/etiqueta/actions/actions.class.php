<?php

require_once dirname(__FILE__).'/../lib/etiquetaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/etiquetaGeneratorHelper.class.php';

/**
 * etiqueta actions.
 *
 * @package    zebra
 * @subpackage etiqueta
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class etiquetaActions extends autoEtiquetaActions
{

    public function executeBatchImprimir(sfWebRequest $request)
  	{

    	$ids = $request->getParameter('ids');
        $plantilla = new Plantilla();
        // Ordena Arreglo para Impresion
        asort($ids);
        $arreglo = $this->Imprime($ids);
        $ids = implode(', ' , $ids);

        $this->getUser()->setAttribute('parametros', $arreglo);  
       	
        // Envia mensaje de ejecucion exitosa
        $this->getUser()->setFlash('notice', 'La seleccion de Etiquetas: { ' . $ids . ' } sera enviada a la impresora Zebra');
        // Redirige a Modulo Plantilla
        $this->redirect('plantilla');
        //include_partial('global/tmp');

        
    }
    
    public function Imprime($ids)
    {
        # Recorremos todos los registros
        foreach ($ids as $key => $value) {
        # Realizamos la consulta a la BD
        $query = Doctrine_Core::getTable('Etiqueta')
        ->createQuery('e')
        ->where('e.id = ?', $value)
        ->innerJoin('e.Contacto o')
        ->andWhere('o.id = ?', 'e.contacto_id')
        ->innerJoin('o.Cliente c')
        ->andWhere('c.id = ?', 'o.cliente_id')
        ->orderBy('e.created_at ASC');
        $result = $query->execute();
        }
        //return sfView::SUCCESS;
        return $result->toArray();
    }
}
