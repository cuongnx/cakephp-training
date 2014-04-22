<?php
App::uses('AppModel', 'Model');
class Post extends AppModel {
  public $belongsTo = array(
    'User' => array(
      'className' => 'User'
    ),
    'Thread' => array(
      'className' => 'Thread'
    )
  )
}

