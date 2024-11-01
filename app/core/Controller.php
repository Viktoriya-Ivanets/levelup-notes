<?php

class Controller
{
    private AuthController $authController;
    private NoteController $noteController;
    private ?string $username;

    public function __construct()
    {
        Session::start();
        $this->username = Session::get('username');
        $this->authController = new AuthController();
        $this->noteController = new NoteController($this->username);
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
     * Index action that checks if the user is authenticated and retrieves notes if they are.
     *
     * @return void
     */
    public function index(): void
    {
        if (Session::isAuthenticated()) {
            $noteModel = new Note($this->username);
            $notes = $noteModel->getAll();
            $this->renderView('index', ['username' => $this->username, 'notes' => $notes]);
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
     * Redirects to the logout method in the AuthController.
     *
     * @return void
     */
    public function logout(): void
    {
        $this->authController->logout();
    }

    /**
     * Handles the addition of a new note through the NoteController.
     *
     * @return void
     */
    public function add(): void
    {
        $this->noteController->add();
    }

    /**
     * Handles the deletion of a note through the NoteController.
     *
     * @return void
     */
    public function delete(): void
    {
        $this->noteController->delete();
    }
}
