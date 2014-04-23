<?php
class UsersController extends AppController {
  public $helpers = array('Html', 'Form');

  public function beforeFilter($ops) {
    $this->Auth->allow('signup', 'logout', 'signin');
  }

  public function signup() {
    $this->set('title_for_layout', "Sign up");

    if ($this->request->is("post")) {

      $this->User->create();

      if ($this->User->save($this->data)) {
        $this->Session->setFlash("User has been saved", "default",
          array('class'=>"alert alert-success"));
        return $this->redirect("/");
      }

      $this->Session->setFlash("Failed to save users", "default",
        array('class'=>"alert alert-danger"));
        return $this->redirect("/signup");
    }
  }

  public function signin() {
    $this->set('title_for_layout', "Sign in");
  }

  public function login() {
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        return $this->redirect($this->Auth->redirectUrl());
      } else {
        $this->Session->setFlash("Username and password not matched", "default",
          array('class'=>"alert alert-danger"));
        return $this->redirect('/signin');
      }
    }
  }

  public function logout() {
    return $this->redirect($this->Auth->logout());
  }

}
