<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 */

Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
Router::connect('/signin', array('controller' => 'users', 'action' => 'signin'));
Router::connect('/signup', array('controller' => 'users', 'action' => 'signup'));
Router::connect('/signout', array('controller' => 'users', 'action' => 'logout'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
