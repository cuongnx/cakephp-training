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
}
