<?php

require_once dirname(__FILE__).'/../lib/plantillaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/plantillaGeneratorHelper.class.php';

/**
 * plantilla actions.
 *
 * @package    zebra
 * @subpackage plantilla
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class plantillaActions extends autoPlantillaActions
{

	public function executeBatchImprimir(sfWebRequest $request)
  	{
    	$ids = $request->getParameter('ids');
 
    	$q = Doctrine_Query::create()
      	->from('Plantilla p')
      	->whereIn('p.id', $ids);
 
	    foreach ($q->execute() as $plantilla)
    	{
      		//print($plantilla);
    	}
 
    	$this->getUser()->setFlash('notice', 'La seleccion sera enviada a la impresora Zebra');
 
    	$this->redirect('plantilla');
  	}

}
