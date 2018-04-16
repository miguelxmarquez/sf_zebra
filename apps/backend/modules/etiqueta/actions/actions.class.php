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
    	
      	if ($plantilla->Imprimir($ids) !== FALSE) {
            // Envia mensaje de ejecucion exitosa
            $this->getUser()->setFlash('notice', 'La seleccion: ' . print_r($ids) . ' sera enviada a la impresora Zebra');
            // Redirige a Modulo Etiqueta
            $this->redirect('plantilla');
        }else{
            $this->getUser()->setFlash('error', 'La seleccion: ' . print_r($ids) . ' Error, intente mas tarde');
        }
    	
 

  	}
}
