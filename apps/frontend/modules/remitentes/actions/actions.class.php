<?php

/**
 * remitentes actions.
 *
 * @package    zebra
 * @subpackage remitentes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class remitentesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->remitentess = Doctrine_Core::getTable('Remitentes')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->remitentes = Doctrine_Core::getTable('Remitentes')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->remitentes);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new RemitentesForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new RemitentesForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($remitentes = Doctrine_Core::getTable('Remitentes')->find(array($request->getParameter('id'))), sprintf('Object remitentes does not exist (%s).', $request->getParameter('id')));
    $this->form = new RemitentesForm($remitentes);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($remitentes = Doctrine_Core::getTable('Remitentes')->find(array($request->getParameter('id'))), sprintf('Object remitentes does not exist (%s).', $request->getParameter('id')));
    $this->form = new RemitentesForm($remitentes);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($remitentes = Doctrine_Core::getTable('Remitentes')->find(array($request->getParameter('id'))), sprintf('Object remitentes does not exist (%s).', $request->getParameter('id')));
    $remitentes->delete();

    $this->redirect('remitentes/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $remitentes = $form->save();

      $this->redirect('remitentes/edit?id='.$remitentes->getId());
    }
  }
}
