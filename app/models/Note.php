<?php

class Note {
    private array $notes;
    private Model $model;

    public function __construct(string $username) {
        $this->model = new Model($username . '_notes.json');
        $this->notes = $this->model->readData();
    }

    /**
     * Adds a new note for the user.
     *
     * @param string $text The text of the note to be added.
     * @return void
     */
    public function add(string $text): void {
        $this->notes[] = ['text' => $text];
        $this->model->saveData($this->notes);
    }

    /**
     * Deletes a note by its index.
     *
     * @param int $index The index of the note to delete.
     * @return void
     */
    public function delete(int $index): void {
        if (isset($this->notes[$index])) {
            unset($this->notes[$index]);
            $this->model->saveData($this->notes);
        }
    }

    /**
     * Retrieves all notes for the user.
     *
     * @return array The user's notes.
     */
    public function getAll(): array {
        return $this->notes;
    }
}
