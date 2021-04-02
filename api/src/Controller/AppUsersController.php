<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\AppUsersTable;
use Cake\Event\Event;
use CakeDC\Users\Controller\Traits\LoginTrait;
use CakeDC\Users\Controller\Traits\RegisterTrait;

class AppUsersController extends AppController
{
  use LoginTrait;
  use RegisterTrait;

  /**
   * Initialize
   *
   * @return void
   */
  public function initialize(): void
  {
    parent::initialize();
    $this->loadComponent('CakeDC/Users.Setup');
    if ($this->components()->has('Security')) {
      $this->Security->setConfig(
        'unlockedActions',
        ['login', 'getToken']
      );
    }
  }

  public function getToken()
  {
    $user = $this->Auth->identify();
    $this->set(compact('user'));
    $this->set('_serialize', 'user');
  }
}