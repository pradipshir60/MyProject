<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Event\EventInterface;

class AppController extends Controller {

    public function initialize():void
     {
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
            ]
        ]);
    }

    public function beforeFilter(EventInterface $event) {
        $this->Auth->allow(['add', 'view', 'display']);
    }
}