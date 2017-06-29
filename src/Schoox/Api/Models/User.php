<?php

namespace Schoox\Api\Models;

use JMS\Serializer\Annotation AS JMS;

class User extends Model
{
    /**
     * @JMS\Type("int")
     */
    private $id;

    /**
     * @JMS\Type("string")
     */
    private $username;

    /**
     * @JMS\Type("string")
     */
    private $firstName;

    /**
     * @JMS\Type("string")
     */
    private $lastName;

    /**
     * @JMS\Type("string")
     */
    private $password;

    /**
     * @JMS\Type("string")
     */
    private $email;

    /**
     * @JMS\Type("string")
     */
    private $image;

    /**
     * @JMS\Type("string")
     */
    private $url;

    /**
     * @JMS\Type("string")
     */
    private $totalCourseHours;

    /**
     * @JMS\Type("int")
     */
    private $totalCourses;

    /**
     * @JMS\Type("int")
     */
    private $totalExams;

    /**
     * @JMS\Type("string")
     */
    private $dueDate;

    /**
     * @JMS\Type("int")
     */
    private $progress;

    /**
     * @JMS\Type("string")
     */
    private $time;

    /**
     * @JMS\Type("string")
     */
    private $enrollmentDate;

    /**
     * @JMS\Type("int")
     */
    private $attempts;

    /**
     * @JMS\Type("string")
     */
    private $profileUrl;

    /**
     * @JMS\Type("boolean")
     */
    private $active;

    /**
     * @JMS\Type("array")
     */
    private $roles;

    /**
     * @JMS\Type("array")
     */
    private $units;

    /**
     * @JMS\Type("array")
     */
    private $certificates;

    public function getId()
    {
        return $this->id;
    }

    public function setId($val)
    {
        $this->id = $val;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($val)
    {
        $this->username = $val;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($val)
    {
        $this->firstName = $val;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($val)
    {
        $this->lastName = $val;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($val)
    {
        $this->password = $val;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($val)
    {
        $this->email = $val;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($val)
    {
        $this->image = $val;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($val)
    {
        $this->url = $val;
        return $this;
    }

    public function getTotalCourseHours()
    {
        return $this->totalCourseHours;
    }

    public function setTotalCourseHours($val)
    {
        $this->totalCourseHours = $val;
        return $this;
    }

    public function getTotalCourses()
    {
        return $this->totalCourses;
    }

    public function setTotalCourses($val)
    {
        $this->totalCourses = $val;
        return $this;
    }

    public function getTotalExams()
    {
        return $this->totalExams;
    }

    public function setTotalExams($val)
    {
        $this->totalExams = $val;
        return $this;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    public function setDueDate($val)
    {
        $this->dueDate = $val;
        return $this;
    }

    public function getProgress()
    {
        return $this->progress;
    }

    public function setProgress($val)
    {
        $this->progress = $val;
        return $this;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($val)
    {
        $this->time = $val;
        return $this;
    }

    public function getEnrolmentDate()
    {
        return $this->enrolmentDate;
    }

    public function setEnrolmentDate($val)
    {
        $this->enrolmentDate = $val;
        return $this;
    }

    public function getAttempts()
    {
        return $this->attempts;
    }

    public function setAttempts($val)
    {
        $this->attempts = $val;
        return $this;
    }

    public function getProfileUrl()
    {
        return $this->profileUrl;
    }

    public function setProfileUrl($val)
    {
        $this->profileUrl = $val;
        return $this;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($val)
    {
        $this->active = $val;
        return $this;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles($val)
    {
        $this->roles = $val;
        return $this;
    }

    public function getUnits()
    {
        return $this->units;
    }

    public function setUnits($val)
    {
        $this->units = $val;
        return $this;
    }

    public function getCertificates()
    {
        return $this->certificates;
    }

    public function __toString()
    {
        throw new \Exception('Needs implemented');
    }
}
