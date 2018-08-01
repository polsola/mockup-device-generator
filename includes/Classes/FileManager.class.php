<?php
namespace Classes;

class FileManager {

    /**
     * Resize image
     */
    public function resize($image, $width) {
        // Resize image
		$thumbWidth = $width; // px
		$thumbHeight = $width;
		$conserveProportion = true;
		$positionX = 0; // px
		$positionY = 0; // px
		$position = 'MM';
		
        $image->resizeInPixel($thumbWidth, $thumbHeight, $conserveProportion, $positionX, $positionY, $position);
        
        return $image;
    }

    /**
     * Save image
     */
    public function save($image, $filename, $dirPath = 'saved') {
        //$dirPath = "saved";
        $createFolders = true; //will create the folder if not exist
        $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
        $imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)

        $image->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);

        return $image;
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