<?php
App::uses('AppModel', 'Model');
class Thread extends AppModel {
  public $belongsTo = 'User';
  public $hasMany = array(
    'Posts' => array(
      'className' => 'Post'
    )
  );
}

