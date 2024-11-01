<?php

class Controller
{
    private AuthController $authController;

    public function __construct()
    {
        $this->authController = new AuthController();
    }

    /**
     * Renders the specified view.
     *
     * @param string $page The name of the view to render.
     * @param array $data Data to pass to the view.
     * @param string $template The name of the template to use.
     * @return void
     */
    public function renderView(string $page, array $data = [], string $template = 'layout'): void
    {
        extract($data);
        require "app/views/templates/{$template}.php";
    }

    /**
     * Index action that determines if the user is authenticated.
     *
     * @return void
     */
    public function index(): void
    {
        Session::start();
        if (Session::isAuthenticated()) {
            $this->renderView('index', ['username' => Session::get('username')]);
        } else {
            $this->login();
        }
    }

    /**
     * Redirects to the login view.
     *
     * @return void
     */
    public function login(): void
    {
        $this->authController->login();
    }

    /**
     * Redirects to the registration view.
     *
     * @return void
     */
    public function register(): void
    {
        $this->authController->register();
    }

    /**
     * Redirects to the logout method.
     *
     * @return void
     */
    public function logout(): void
    {
        $this->authController->logout();
    }
}
