<?php
namespace XStudioApp\Helpers;

class FastScripts
{
    /**
     * Create a file if it does not exist
     * Adds proper permissions and error handling
     *
     * @param string $FILE Absolute file path
     */
    static public function createFile(string $FILE)
    {
        try {
            // Check if file already exists
            if (file_exists($FILE)) {
                return; // File already exists, nothing to do
            }

            // Attempt to create the file
            $handle = fopen($FILE, 'w');
            if ($handle === false) {
                throw new \RuntimeException('Failed to open file for writing: ' . $FILE);
            }

            fclose($handle);

            // Set permissions
            if (!chmod($FILE, 0664)) {
                throw new \RuntimeException('Failed to set permissions for file: ' . $FILE);
            }

        } catch (\Throwable $e) {
            // Log any errors
            error_log('[FastScripts] ' . $e->getMessage());
        }
    }
}
