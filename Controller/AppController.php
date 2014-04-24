<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
  public $components = array(
    'Session',
    'RequestHandler',
    'Auth' => array(
      'loginRedirect' => array(
        'controller' => 'threads',
        'action' => 'index'
      ),
      'logoutRedirect' => '/',
      'loginAction' => array(
        'controller' => 'users',
        'action' => 'login'
      )
    )
  );

  public $helpers = array('Session', 'Form');

  public function beforeFilter() {
  }

  public function beforeRender() {
    $this->Session->write('Auth.User', $this->Auth->user());
  }
}
