<?php

namespace Schoox\Tests\Api\Clients;

use Schoox\Api\Clients\Users;
use Schoox\Api\Constants\Roles;
use Schoox\Api\Models\User;
use Schoox\Api\Models\NewUser;

class UsersTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAndEnumberateAllUsers()
    {
        $this->markTestIncomplete();
        $users = new Users;
        $result = $users->getAndEnumerateAllUsers(Roles::SchooxInternalEmployee, null, null, null, null, null, 13);
        $this->assertTrue(count($result) >= 2);
    }

    public function testGetUsers()
    {
        $users = new Users;
        $result = $users->getUsers(Roles::SchooxInternalEmployee);
        $this->assertNotNull(count($result) >= 2);
        $this->assertInstanceOf(User::class, $result[0]);
    }

    public function testGetDetailsOfUser()
    {
        $users = new Users;
        $result = $users->getDetailsOfUser(14);
        $this->assertInstanceOf(User::class, $result);
    }

    /**
     * @group requiresEdits
     */
    public function testCreateAndAddUser()
    {
        $user = new NewUser('BillTest4', 'Lolos5', '123456', 'bcdefghijklmno@schoox.com');
        $user->setLanguage('English');
        $user->setRoles([Roles::SchooxInternalEmployee]);
        $user->setAboveIds([18]);
        $user->setUnitIds([4]);
        $user->setUsername('bcdefghijklmno@schoox.com');
        $users = new Users;
        $result = $users->createAndAddUser($user);
        $this->assertInstanceOf(User::class, $result);
        return $result;
    }

    public function testInviteUser()
    {
        $this->markTestIncomplete();
    }

    /**
     * @depends testCreateAndAddUser
     */
    public function testEditUser(User $user)
    {
        $users = new Users;
        $editUser = new NewUser('x', 'y', '123456', 'xyz@schoox.com');
        $this->assertTrue($users->editUser($user->getId(), $editUser));
    }

    /**
     * @depends testCreateAndAddUser
     */
    public function testRemoveUser(User $user)
    {
        $users = new Users;
        $this->assertTrue($users->removeUser($user->getId()));
        return $user;
    }

    /**
     * @depends testRemoveUser
     */
    public function testReactivateUser(User $user)
    {
        $users = new Users;
        $this->assertTrue($users->reactivateUser($user->getId()));
    }

    /**
     * @depends testCreateAndAddUser
     */
    public function testUpdateUserRoles(User $user)
    {
        $users = new Users;
        $result = $users->updateUserRoles($user->getId(), [Roles::TrainingManager, Roles::SchooxInternalHourlyWorker]);
        $this->assertTrue($result);
    }
}
