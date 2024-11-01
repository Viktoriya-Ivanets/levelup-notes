<?php
class Model
{
    protected string $filePath;

    public function __construct(string $fileName)
    {
        $this->filePath = STORAGE_PATH . $fileName;
    }

    /**
     * Reads data from the specified file.
     *
     * @return array An associative array of the data read from the file, or an empty array if the file does not exist.
     */
    public function readData(): array
    {
        if (file_exists($this->filePath)) {
            $data = file_get_contents($this->filePath);
            return json_decode($data, true) ?? [];
        }
        return [];
    }

    /**
     * Saves data to the specified file.
     *
     * @param array $data An associative array of data to be saved to the file.
     * @return void
     */
    public function saveData(array $data): void
    {
        file_put_contents($this->filePath, json_encode($data));
    }
}
