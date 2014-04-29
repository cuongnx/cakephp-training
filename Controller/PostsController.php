<?php
class PostsController extends AppController {
  public $helpers = array('Html', 'Form');

  public function index() {
    $this->set('title_for_layout', "Posts");
    $this->set('posts', $this->Post->find('all'));
  }

  public function create() {
    $this->request->data['Post']['owner_id'] = $this->Auth->user('id');
    $this->request->data['Post']['thread_id'] = $this->request->data['Thread']['id'];
    $post = $this->Post->save($this->request->data);
    if ($post) {
      $this->set('post', $this->Post->findById($post['Post']['id']));
    } else {
      $this->Session->setFlash("Failed to post message, please try again.", "default", array('class' => 'alert alert-danger'));
    }
    $this->render("/Elements/post", "ajax");
  }

  public function edit($id) {
    if ($this->request->is("ajax")) {
      $this->Post->id = $id;
      $status = 0;
      if ($this->Post->save($this->request->data)) {
        $status = 1;
      } else {
        $status = 0;
      }
      $this->set("data", array($status, $this->Post->findById($id)));
      $this->layout = null;
      $this->render("/serialize_view");
    }
  }

  public function delete($id) {
    if ($this->request->is("ajax")) {
      $status = 0;
      if ($this->Post->delete($id)) {
        $status = 1;
      }

      $this->set("data", array($status));
      $this->layout = null;
      $this->render("/serialize_view");
    }
  }

  public function show($id) {
    if ($this->request->is("ajax")) {
      $this->set('post', $this->Post->findById($id));
      $this->render("/Elements/post", "ajax");
    }
  }

}
