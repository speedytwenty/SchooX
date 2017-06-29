<?php

namespace Schoox\Api\Models;

use JMS\Serializer\Annotation AS JMS;

class NewUser extends Model
{
    /**
     * @JMS\Type("string")
     */
    protected $username;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("firstname")
     */
    protected $firstName;

    /**
     * @JMS\Type("string")
     * @JMS\SerializedName("lastname")
     */
    protected $lastName;

    /**
     * @JMS\Type("string")
     */
    protected $password;


    /**
     * @JMS\Type("string")
     */
    protected $email;

    /**
     * @JMS\Type("array")
     */
    protected $roles;

    /**
     * @JMS\Type("array")
     */
    protected $aboveIds;

    /**
     * @JMS\Type("array")
     */
    protected $unitIds;


    /**
     * @JMS\Inline
     * @JMS\Type("array")
     */
    protected $jobIds;

    // Omitting $jobs for now

    /**
     * @JMS\Type("string")
     */
    protected $language;

    public function __construct($firstName, $lastName, $password, $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->password = $password;
        $this->email = $email;
        parent::__construct();
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles(array $roles)
    {
        $this->roles = $roles;
        return $this;
    }

    public function getAboveIds()
    {
        return $this->aboveIds;
    }

    public function setAboveIds(array $aboveIds)
    {
        $this->aboveIds = $aboveIds;
        return $this;
    }

    public function getUnitIds()
    {
        return $this->unitIds;
    }

    public function setUnitIds(array $unitIds)
    {
        $this->unitIds = $unitIds;
        return $this;
    }

    public function getJobIds()
    {
        return $this->jobIds;
    }

    public function setJobIds(array $jobIds)
    {
        $this->jobIds = $jobIds;
        return $this;
    }

    public function getJobs()
    {
        throw new \Exception('Not implemented.');
    }

    public function setJobs()
    {
        throw new \Exception('Not implemented.');
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

}
