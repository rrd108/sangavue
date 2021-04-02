<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $password
 * @property string $token
 * @property string|null $realname
 * @property string|null $email
 * @property string|null $phone
 * @property bool|null $active
 * @property string $responsible
 * @property int $role
 * @property string $resettoken
 * @property string|null $google_contacts_refresh_token
 * @property string|null $locale
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $last_login
 *
 * @property \App\Model\Entity\Document[] $documents
 * @property \App\Model\Entity\Event[] $events
 * @property \App\Model\Entity\History[] $histories
 * @property \App\Model\Entity\Notification[] $notifications
 * @property \App\Model\Entity\Setting[] $settings
 * @property \App\Model\Entity\SocialAccount[] $social_accounts
 * @property \App\Model\Entity\Contact[] $contacts
 * @property \App\Model\Entity\Group[] $groups
 * @property \App\Model\Entity\Usergroup[] $usergroups
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'password' => true,
        'token' => true,
        'realname' => true,
        'email' => true,
        'phone' => true,
        'active' => true,
        'responsible' => true,
        'role' => true,
        'resettoken' => true,
        'google_contacts_refresh_token' => true,
        'locale' => true,
        'created' => true,
        'modified' => true,
        'last_login' => true,
        'documents' => true,
        'events' => true,
        'histories' => true,
        'notifications' => true,
        'settings' => true,
        'social_accounts' => true,
        'contacts' => true,
        'groups' => true,
        'usergroups' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token',
    ];
}
