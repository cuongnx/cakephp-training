<?php
App::uses('AppController', 'Controller');

class PagesController extends AppController {
  public $uses = array();

  public function home() {
    $this->set('title_for_layout', "ChatChit");
    return $this->redirect(array('controller'=>'pages', 'action'=>'signin'));
  }

  public function signin() {
    $this->set('title_for_layout', "Sign in");
  }

  public function signup() {
    $this->set('title_for_layout', "Sign up");
  }
}
