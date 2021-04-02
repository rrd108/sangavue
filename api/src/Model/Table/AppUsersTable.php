<?php
namespace App\Model\Table;

use CakeDC\Users\Model\Table\UsersTable;

class AppUsersTable extends UsersTable
{

	/*public function beforeSave(Event $event)
    {
        $entity = $event->getData('entity');

        // Make a password for digest auth.
        $entity->secret = DigestAuthenticate::password(
            $entity->email,
            $entity->password,
            env('SERVER_NAME')
        );
        return true;
    }*/

}