<?php
App::uses('AppModel', 'Model');
class Thread extends AppModel {
  public $belongsTo = array(
    'User' => array(
      'className' => 'User',
      'foreignKey' => 'owner_id'
    )
  );
  public $hasMany = array(
    'Posts' => array(
      'className' => 'Post'
    )
  );
}

