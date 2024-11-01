<?php

class AuthController {
    /**
     * Handles user login.
     *
     * @return void
     */
    public function login(): void {
        Session::start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processLogin();
        } else {
            $this->showLoginForm();
        }
    }

    /**
     * Processes the login form submission.
     *
     * @return void
     */
    private function processLogin(): void {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $user = new User();

        if ($user->authenticate($username, $password)) {
            $this->onLoginSuccess($username);
        } else {
            $this->onLoginFailure();
        }
    }

    /**
     * Handles successful login.
     *
     * @param string $username The username of the logged-in user.
     * @return void
     */
    private function onLoginSuccess(string $username): void {
        Session::set('username', $username);
        header("Location: " . Router::url('index'));
        exit();
    }

    /**
     * Handles failed login attempt.
     *
     * @return void
     */
    private function onLoginFailure(): void {
        $error = "Incorrect username or password";
        (new Controller())->renderView('login', ['error' => $error]);
    }

    /**
     * Displays the login form.
     *
     * @return void
     */
    private function showLoginForm(): void {
        (new Controller())->renderView('login');
    }

    /**
     * Handles user registration.
     *
     * @return void
     */
    public function register(): void {
        Session::start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processRegistration();
        } else {
            $this->showRegistrationForm();
        }
    }

    /**
     * Processes the registration form submission.
     *
     * @return void
     */
    private function processRegistration(): void {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $user = new User();

        if ($user->register($username, $password)) {
            $this->onRegistrationSuccess();
        } else {
            $this->onRegistrationFailure();
        }
    }

    /**
     * Handles successful registration.
     *
     * @return void
     */
    private function onRegistrationSuccess(): void {
        header("Location: " . Router::url('login'));
        exit();
    }

    /**
     * Handles failed registration attempt.
     *
     * @return void
     */
    private function onRegistrationFailure(): void {
        $error = "Username already taken";
        (new Controller())->renderView('register', ['error' => $error]);
    }

    /**
     * Displays the registration form.
     *
     * @return void
     */
    private function showRegistrationForm(): void {
        (new Controller())->renderView('register');
    }

    /**
     * Handles user logout.
     *
     * @return void
     */
    public function logout(): void {
        Session::start();
        Session::destroy();
        header("Location: " . Router::url('login'));
        exit();
    }
}