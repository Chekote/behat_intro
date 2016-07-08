<?php namespace model;

class User {
    /** @var string */
    public $name;

    /** @var string */
    public $password;

    /** @var bool */
    protected $loggedIn;

    public function __construct() {
        $this->loggedIn = false;
    }

    /**
     * Flags the user as logged in to the system.
     */
    public function login() {
        $this->loggedIn = true;
    }

    /**
     * Flags the user as logged out of the system.
     */
    public function logout() {
        $this->loggedIn = false;
    }

    /**
     * Checks if the user is logged in or not
     *
     * @return bool True if the user is logged in, false if not.
     */
    public function isLoggedIn() {
        return $this->loggedIn;
    }
}