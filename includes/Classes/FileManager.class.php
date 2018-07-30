<?php
namespace Classes;

class FileManager {
    
    /**
     * Save image
     */
    public function save($image, $filename) {
        $dirPath = "saved";
        $createFolders = true; //will create the folder if not exist
        $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
        $imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)

        $image->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
    }

    /**
     * Generate base64 png image for browser display
     */
    public function base64Image($result) {
        // Get result
        $image = $result->getResult();
        
        ob_start();
        header('Content-Type: image/png');
        imagepng($image);
        $imageCode = ob_get_clean();

        // Release memory
        imagedestroy($image);

        // Return so it can display
        return "data:image/png;base64," . base64_encode($imageCode) . '"';
    }
}