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

        $this->total = 100;
    	$ids = $request->getParameter('ids');
        $plantilla = new Plantilla();
        // Ordena Arreglo para Impresion
        asort($ids);
        $varia = $this->ImprimeTag($ids);
        $parametros = implode(',' , $ids);
          
      	if ($plantilla->Imprimir($parametros) !== FALSE) {
            // Envia mensaje de ejecucion exitosa
            $this->getUser()->setFlash('notice', 'La seleccion de Etiquetas: { ' . $parametros . ' } sera enviada a la impresora Zebra');
            // Redirige a Modulo Plantilla
            $this->redirect('plantilla');
        }else{
            // Envia mensaje de ejecucion erronea
            $this->getUser()->setFlash('error', 'La seleccion de Etiquetas: { ' . $parametros . ' } Ha sufrido un Error, intente mas tarde');
            // Redirige a Modulo Etiqueta
            $this->redirect('etiqueta');
        }
    }
    
    public function ImprimeTag($ids)
    {
        $resultado = [];
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

        // $tags = array(
        //     'nombre' => 'CORRESPONDENCIA ATLAS',
        //     'contacto' => 'Pablo Perez',
        //     'cliente' => 'ATLAS S.A.S.',
        //     'cliente_telf' => '+57 555 5555555',
        //     'cliente_mail' => 'contacto@atlas.com.con',
        //     'cliente_dir' => 'Cra. 1, #50-2. Valle del Cauca, Cali',
        //     'remitente' => '3 Creatives, S.A.S.',
        //     'remitente_telf' => '+57 (2) 524 5606',
        //     'remitente_dir' => 'Calle 39N, #4-13B.',
        // );
        }
        return $result;
    }
}
