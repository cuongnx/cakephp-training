<?php
class ThreadsController extends AppController {
  public $helpers = array('Html', 'Form');

  public function beforeFilter($ops) {
    $this->Auth->allow('index');
  }

  public function index() {
    $this->set('title_for_layout', "Threads");
    $this->set('threads', $this->Thread->find('all'));
  }

  public function create() {
    if ($this->request->is('post')) {
      $this->request->data['Thread']['owner_id'] = $this->Auth->user('id');
      if ($this->Thread->save($this->request->data)) {
      } else {
        $this->Session->setFlash("Failed to create thread, please try again later.", 'default', array('class'=>"alert alert-danger"));
      }
    }
    return $this->redirect(array(
      'controller' => 'threads',
      'action' => 'index'
    ));
  }

  public function show($id) {
    $thread = $this->Thread->findById($id);
    $posts = $this->Thread->Post->find("all", array(
      "conditions" => array(
        "thread_id"=>$id
      )
    ));
    $this->set('thread', $thread);
    $this->set('posts', $posts);
  }
}
