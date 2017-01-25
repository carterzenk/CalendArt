<?php

namespace CalendArt\Tests;

use CalendArt\AbstractEvent;
use CalendArt\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var User
     */
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = new User('John Doe', 'john@doe.com');
    }

    public function testConstructUserSetsNameAndEmail()
    {
        $this->assertInstanceOf(User::class, $this->user);
        $this->assertEquals('John Doe', $this->user->getName());
        $this->assertEquals('john@doe.com', $this->user->getEmail());
    }

    public function testAddRemoveEvent()
    {
        $this->assertEquals(0, $this->user->getEvents()->count());

        $event = $this->prophesize(AbstractEvent::class)->reveal();

        $user = $this->user->addEvent($event);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals(1, $this->user->getEvents()->count());

        $user = $this->user->removeEvent($event);
        $this->assertInstanceOf(User::class, $user);

        $this->assertEquals(0, $this->user->getEvents()->count());
    }
}