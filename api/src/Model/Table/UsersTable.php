<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\DocumentsTable&\Cake\ORM\Association\HasMany $Documents
 * @property \App\Model\Table\EventsTable&\Cake\ORM\Association\HasMany $Events
 * @property \App\Model\Table\HistoriesTable&\Cake\ORM\Association\HasMany $Histories
 * @property \App\Model\Table\NotificationsTable&\Cake\ORM\Association\HasMany $Notifications
 * @property \App\Model\Table\SettingsTable&\Cake\ORM\Association\HasMany $Settings
 * @property \App\Model\Table\SocialAccountsTable&\Cake\ORM\Association\HasMany $SocialAccounts
 * @property \App\Model\Table\ContactsTable&\Cake\ORM\Association\BelongsToMany $Contacts
 * @property \App\Model\Table\GroupsTable&\Cake\ORM\Association\BelongsToMany $Groups
 * @property \App\Model\Table\UsergroupsTable&\Cake\ORM\Association\BelongsToMany $Usergroups
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Documents', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Events', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Histories', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Notifications', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Settings', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('SocialAccounts', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsToMany('Contacts', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'contact_id',
            'joinTable' => 'contacts_users',
        ]);
        $this->belongsToMany('Groups', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'group_id',
            'joinTable' => 'groups_users',
        ]);
        $this->belongsToMany('Usergroups', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'usergroup_id',
            'joinTable' => 'users_usergroups',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 45)
            ->allowEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmptyString('password');

        $validator
            ->scalar('token')
            ->maxLength('token', 255)
            ->requirePresence('token', 'create')
            ->notEmptyString('token');

        $validator
            ->scalar('realname')
            ->maxLength('realname', 45)
            ->allowEmptyString('realname');

        $validator
            ->email('email')
            ->allowEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('phone')
            ->maxLength('phone', 45)
            ->allowEmptyString('phone');

        $validator
            ->boolean('active')
            ->allowEmptyString('active');

        $validator
            ->scalar('responsible')
            ->maxLength('responsible', 255)
            ->requirePresence('responsible', 'create')
            ->notEmptyString('responsible');

        $validator
            ->notEmptyString('role');

        $validator
            ->scalar('resettoken')
            ->maxLength('resettoken', 32)
            ->requirePresence('resettoken', 'create')
            ->notEmptyString('resettoken');

        $validator
            ->scalar('google_contacts_refresh_token')
            ->maxLength('google_contacts_refresh_token', 64)
            ->allowEmptyString('google_contacts_refresh_token');

        $validator
            ->scalar('locale')
            ->maxLength('locale', 5)
            ->allowEmptyString('locale');

        $validator
            ->dateTime('last_login')
            ->allowEmptyDateTime('last_login');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->isUnique(['name']), ['errorField' => 'name']);

        return $rules;
    }
}
