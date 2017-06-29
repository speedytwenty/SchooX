<?php

namespace Schoox\Tests\Api\Models;

use Schoox\Api\Models\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testId()
    {
        $user = new User;
        $user->setId(123);
        $this->assertEquals(123, $user->getId());
    }

    public function testUsername()
    {
        $user = new User;
        $user->setUsername('x');
        $this->assertEquals('x', $user->getUsername());
    }

    public function testFirstName()
    {
        $user = new User;
        $user->setFirstName('f');
        $this->assertEquals('f', $user->getFirstName());
    }

    public function testLastName()
    {
        $user = new User;
        $user->setLastName('l');
        $this->assertEquals('l', $user->getLastName());
    }

    public function testPassword()
    {
        $user = new User;
        $user->setPassword('x');
        $this->assertEquals('x', $user->getPassword());
    }

    public function testEmail()
    {
        $user = new User;
        $user->setEmail('x@y.z');
        $this->assertEquals('x@y.z', $user->getEmail());
    }

    public function testImage()
    {
        $user = new User;
        $user->setImage('http://x.y/z.jpg');
        $this->assertEquals('http://x.y/z.jpg', $user->getImage());
    }

    public function testUrl()
    {
        $user = new User;
        $user->setUrl('http://x.y/z');
        $this->assertEquals('http://x.y/z', $user->getUrl());
    }

    public function testTotalCourseHours()
    {
        $user = new User;
        $user->setTotalCourseHours('1');
        $this->assertEquals('1', $user->getTotalCourseHours());
    }

    public function testTotalCourses()
    {
        $user = new User;
        $user->setTotalCourses(1);
        $this->assertEquals(1, $user->getTotalCourses());
    }

    public function testTotalExams()
    {
        $user = new User;
        $user->setTotalExams(1);
        $this->assertEquals(1, $user->getTotalExams());
    }

    public function testDueDate()
    {
        $user = new User;
        $user->setDueDate('1/1/11');
        $this->assertEquals('1/1/11', $user->getDueDate());
    }

    public function testProgress()
    {
        $user = new User;
        $user->setProgress(1);
        $this->assertEquals(1, $user->getProgress());
    }

    public function testEnrolmentDate()
    {
        $user = new User;
        $user->setEnrolmentDate('1/1/11');
        $this->assertEquals('1/1/11', $user->getEnrolmentDate());
    }

    public function testAttempts()
    {
        $user = new User;
        $user->setAttempts(1);
        $this->assertEquals(1, $user->getAttempts());
    }

    public function testProfileUrl()
    {
        $user = new User;
        $user->setProfileUrl('http://x.y/z');
        $this->assertEquals('http://x.y/z', $user->getProfileUrl());
    }

    public function testActive()
    {
        $user = new User;
        $user->setActive(true);
        $this->assertTrue($user->getActive());
    }

    public function testRoles()
    {
        $this->markTestIncomplete();
    }

    public function testUnits()
    {
        $this->markTestIncomplete();
    }

    public function testCertificates()
    {
        $this->markTestIncomplete();
    }
}
