<?php

class NoteController {
    private ?string $username;

    public function __construct(?string $username) {
        $this->username = $username;
    }

    /**
     * Handles the addition of a new note.
     *
     * @return void
     */
    public function add(): void {
        if ($this->isPostRequest()) {
            $text = $_POST['note'];
            $noteModel = new Note($this->username);
            $noteModel->add($text);
            Router::redirect('index');
        }
    }

    /**
     * Handles the deletion of a note by its index.
     *
     * @return void
     */
    public function delete(): void {
        if ($this->isPostRequest()) {
            $index = (int)$_POST['index'];
            $noteModel = new Note($this->username);
            $noteModel->delete($index);
            Router::redirect('index');
        }
    }

    /**
     * Checks if the current request method is POST.
     *
     * @return bool True if the request method is POST, false otherwise.
     */
    private function isPostRequest(): bool {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}
