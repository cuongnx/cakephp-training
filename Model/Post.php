<?php
App::uses('AppModel', 'Model');
class Post extends AppModel {
  public $belongsTo = array(
    'User' => array(
      'className' => 'User',
      'foreignKey' => 'owner_id'
    ),
    'Thread' => array(
      'className' => 'Thread'
    )
  );
}

