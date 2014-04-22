<?php
class UsersController extends AppController {
  public $helpers = array('Html', 'Form');

  public function signup() {
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

  public function login() {
  }

  public function logout() {
  
  }

}
