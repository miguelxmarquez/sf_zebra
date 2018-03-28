<?php

/**
 * clientes actions.
 *
 * @package    zebra
 * @subpackage clientes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clientesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->clientess = Doctrine_Core::getTable('Clientes')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->clientes = Doctrine_Core::getTable('Clientes')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->clientes);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ClientesForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ClientesForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($clientes = Doctrine_Core::getTable('Clientes')->find(array($request->getParameter('id'))), sprintf('Object clientes does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientesForm($clientes);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($clientes = Doctrine_Core::getTable('Clientes')->find(array($request->getParameter('id'))), sprintf('Object clientes does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientesForm($clientes);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($clientes = Doctrine_Core::getTable('Clientes')->find(array($request->getParameter('id'))), sprintf('Object clientes does not exist (%s).', $request->getParameter('id')));
    $clientes->delete();

    $this->redirect('clientes/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $clientes = $form->save();

      $this->redirect('clientes/edit?id='.$clientes->getId());
    }
  }
}
