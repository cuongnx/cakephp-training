<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

  public $validate = array(
    'username' => array(
      'required' => array(
        'rule' => 'notEmpty',
        'allowEmpty' => false,
        'required' => true,
        'message' => "Username is required"
      )
    ),

    'password' => array(
      'required' => array(
        'rule' => 'notEmpty',
        'allowEmpty' => false,
        'required' => true,
        'message' => "Password is required"
      )
    )
  );

  public $hasMany = array(
    'Threads' => array(
      'className' => 'Thread'
    ),
    'Posts' => array(
      'className' => 'Post'
    )
  );

  public function beforeSave($ops = array()) {
    if (isset($this->data['User']['password'])) {
      $hasher = new SimplePasswordHasher();
      $this->data['User']['password'] = $hasher->hash($this->data['User']['password']);
    }
    return true;
  }
}

