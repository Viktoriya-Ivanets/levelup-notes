<?php

require_once 'app/core/Model.php';

class User {
    private array $users;
    private Model $model;
    
    public function __construct() {
        $this->model = new Model('users.json');
        $this->users = $this->model->readData();
    }

    /**
     * Registers a new user with a username and password.
     *
     * @param string $username The username for the new user.
     * @param string $password The password for the new user.
     * @return bool Returns true if registration was successful, false if the username is already taken.
     */
    public function register(string $username, string $password): bool {
        if (isset($this->users[$username])) {
            return false;
        }
        $this->users[$username] = password_hash($password, PASSWORD_BCRYPT);
        $this->model->saveData($this->users);
        return true;
    }

    /**
     * Authenticates a user by verifying the username and password.
     *
     * @param string $username The username of the user attempting to log in.
     * @param string $password The password provided by the user.
     * @return bool Returns true if authentication is successful, false otherwise.
     */
    public function authenticate(string $username, string $password): bool {
        return isset($this->users[$username]) && password_verify($password, $this->users[$username]);
    }
}
