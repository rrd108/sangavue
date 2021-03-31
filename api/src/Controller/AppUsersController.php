<?php
namespace App\Controller;

use CakeDC\Users\Controller\UsersController;
use App\Model\Table\AppUsersTable;

class AppUsersController extends UsersController
{
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