<?php

/**
 * plantillas actions.
 *
 * @package    zebra
 * @subpackage plantillas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class plantillasActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->plantillass = Doctrine_Core::getTable('Plantillas')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->plantillas = Doctrine_Core::getTable('Plantillas')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->plantillas);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PlantillasForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PlantillasForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($plantillas = Doctrine_Core::getTable('Plantillas')->find(array($request->getParameter('id'))), sprintf('Object plantillas does not exist (%s).', $request->getParameter('id')));
    $this->form = new PlantillasForm($plantillas);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($plantillas = Doctrine_Core::getTable('Plantillas')->find(array($request->getParameter('id'))), sprintf('Object plantillas does not exist (%s).', $request->getParameter('id')));
    $this->form = new PlantillasForm($plantillas);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($plantillas = Doctrine_Core::getTable('Plantillas')->find(array($request->getParameter('id'))), sprintf('Object plantillas does not exist (%s).', $request->getParameter('id')));
    $plantillas->delete();

    $this->redirect('plantillas/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $plantillas = $form->save();

      $this->redirect('plantillas/edit?id='.$plantillas->getId());
    }
  }
}
