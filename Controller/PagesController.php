<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {
  public $uses = array();

  public function beforeFilter($ops) {
    $this->Auth->allow('index');
  }

  public function index() {
    $this->set('title_for_layout', "ChatChit");
    if (!$this->Auth->loggedIn()) {
      return $this->redirect(array('controller'=>'users', 'action'=>'signin'));
    } else {
      return $this->redirect(array('controller'=>'threads', 'action'=>'index'));
    }
  }
}
