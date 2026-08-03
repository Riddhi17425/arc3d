<?php

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;
use Ilovepdf\Ilovepdf;

if (! function_exists('storeImage')) {
    /**
     * Store and compress uploaded image with original filename
     * 
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $folder
     * @param int $quality (0-100, lower = more compression)
     * @param int $maxWidth (optional max width for resizing)
     * @param int $maxHeight (optional max height for resizing)
     * @return string|null
     */
    
    
    // function storeImage($file, $folder, $quality = 60, $maxWidth = 1200, $maxHeight = 1200)
    // {
    //     if (!$file) {
    //         return null; 
    //     }
    
    //     try {
    //         $directoryPath = public_path($folder);
    
    //         // Create directory if it doesn't exist
    //         if (!file_exists($directoryPath)) {
    //             mkdir($directoryPath, 0755, true);
    //         }
    
    //         // Get original filename and extension
    //         $originalName = $file->getClientOriginalName();
    //         $pathInfo = pathinfo($originalName);
    //         $nameWithoutExt = $pathInfo['filename'];
    //         $originalExt = strtolower($pathInfo['extension'] ?? '');
    
    //         // Normalize extensions
    //         if ($originalExt === 'jfif') {
    //             $originalExt = 'jpg';
    //         }
    
    //         if ($file->getMimeType() === 'image/webp') {
    //             $originalExt = 'webp';
    //         }
    
    //         // ------------------------------
    //         // Handle WebP → Store as-is
    //         // ------------------------------
    //         if ($originalExt === 'webp') {
    //             $originalSize = $file->getSize(); // get size BEFORE moving
    
    //             $filename = $originalName;
    //             $counter = 1;
    //             while (file_exists($directoryPath . '/' . $filename)) {
    //                 $filename = $nameWithoutExt . '_' . $counter . '.webp';
    //                 $counter++;
    //             }
    
    //             $file->move($directoryPath, $filename);
    
    //             \Log::info('WebP stored without compression', [
    //                 'original_name'   => $originalName,
    //                 'final_name'      => $filename,
    //                 'original_size'   => number_format($originalSize / 1024 / 1024, 2) . ' MB',
    //                 'dimensions'      => 'kept original',
    //             ]);
    
    //             return $filename;
    //         }
    
    //         // ------------------------------
    //         // Non-WebP processing
    //         // ------------------------------
    
    //         // Handle file conflicts
    //         $filename = $originalName;
    //         $counter = 1;
    //         while (file_exists($directoryPath . '/' . $filename)) {
    //             if ($originalExt) {
    //                 $filename = $nameWithoutExt . '_' . $counter . '.' . $originalExt;
    //             } else {
    //                 $filename = $originalName . '_' . $counter;
    //             }
    //             $counter++;
    //         }
    
    //         $filePath = $directoryPath . '/' . $filename;
    
    //         // Create ImageManager instance
    //         $manager = extension_loaded('imagick') 
    //             ? new ImageManager(new ImagickDriver()) 
    //             : new ImageManager(new Driver());
    
    //         // Read the image
    //         $image = $manager->read($file->getRealPath());
    
    //         // Get original dimensions
    //         $originalWidth = $image->width();
    //         $originalHeight = $image->height();
    
    //         // Resize if larger than max dimensions
    //         if ($originalWidth > $maxWidth || $originalHeight > $maxHeight) {
    //             $image->scale(width: $maxWidth, height: $maxHeight);
    //         }
    
    //         // Save based on format
    //         switch ($originalExt) {
    //             case 'jpg':
    //             case 'jpeg':
    //                 $image->toJpeg($quality)->save($filePath);
    //                 break;
    
    //             case 'png':
    //                 if ($quality < 70) {
    //                     // Convert PNG → JPEG
    //                     $newFilename = $nameWithoutExt . '.jpg';
    //                     $counter = 1;
    //                     while (file_exists($directoryPath . '/' . $newFilename)) {
    //                         $newFilename = $nameWithoutExt . '_' . $counter . '.jpg';
    //                         $counter++;
    //                     }
    //                     $filePath = $directoryPath . '/' . $newFilename;
    //                     $image->toJpeg($quality)->save($filePath);
    //                     $filename = $newFilename;
    //                 } else {
    //                     $image->toPng()->save($filePath);
    //                 }
    //                 break;
    
    //             default:
    //                 // Convert unknown → JPEG
    //                 $newFilename = $nameWithoutExt . '.jpg';
    //                 $counter = 1;
    //                 while (file_exists($directoryPath . '/' . $newFilename)) {
    //                     $newFilename = $nameWithoutExt . '_' . $counter . '.jpg';
    //                     $counter++;
    //                 }
    //                 $filePath = $directoryPath . '/' . $newFilename;
    //                 $image->toJpeg($quality)->save($filePath);
    //                 $filename = $newFilename;
    //         }
    
    //         // Log compression result
    //         $originalSize = $file->getSize();
    //         $compressedSize = filesize($filePath);
    //         $compressionRatio = round((($originalSize - $compressedSize) / $originalSize) * 100, 2);
    
    //         // \Log::info('Image compressed', [
    //         //     'original_name'   => $originalName,
    //         //     'final_name'      => $filename,
    //         //     'original_size'   => number_format($originalSize / 1024 / 1024, 2) . ' MB',
    //         //     'compressed_size' => number_format($compressedSize / 1024 / 1024, 2) . ' MB',
    //         //     'compression'     => $compressionRatio . '%',
    //         //     'quality'         => $quality,
    //         //     'dimensions'      => $image->width() . 'x' . $image->height()
    //         // ]);
    
    //         return $filename;
    
    //     } catch (\Exception $e) {
    //         \Log::error('Image storage failed: ' . $e->getMessage());
    //         return null;
    //     }
    // }
    
    function storeImage($file, $folder, $quality = 60, $maxWidth = 1200, $maxHeight = 1200)
    {
        if (!$file) {
            return null; 
        }

        try {
            $directoryPath = public_path($folder);

            // Create directory if it doesn't exist
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0755, true);
            }

            // Get original filename and extension
            $originalName = $file->getClientOriginalName();
            $pathInfo = pathinfo($originalName);
            $nameWithoutExt = $pathInfo['filename'];
            $originalExt = strtolower($pathInfo['extension'] ?? '');

            // Normalize extensions
            if ($originalExt === 'jfif') {
                $originalExt = 'jpg';
            }

            if ($file->getMimeType() === 'image/webp') {
                $originalExt = 'webp';
            }

            // ------------------------------
            // Handle SVG → Store as-is
            // ------------------------------
            if ($originalExt === 'svg' || $file->getMimeType() === 'image/svg+xml') {
                $filename = $originalName;
                $counter = 1;
                while (file_exists($directoryPath . '/' . $filename)) {
                    $filename = $nameWithoutExt . '_' . $counter . '.svg';
                    $counter++;
                }

                $file->move($directoryPath, $filename);

                \Log::info('SVG stored without modification', [
                    'original_name' => $originalName,
                    'final_name' => $filename,
                ]);

                return $filename;
            }

            // ------------------------------
            // Handle WebP → Store as-is
            // ------------------------------
            if ($originalExt === 'webp') {
                $originalSize = $file->getSize(); // get size BEFORE moving

                $filename = $originalName;
                $counter = 1;
                while (file_exists($directoryPath . '/' . $filename)) {
                    $filename = $nameWithoutExt . '_' . $counter . '.webp';
                    $counter++;
                }

                $file->move($directoryPath, $filename);

                \Log::info('WebP stored without compression', [
                    'original_name'   => $originalName,
                    'final_name'      => $filename,
                    'original_size'   => number_format($originalSize / 1024 / 1024, 2) . ' MB',
                    'dimensions'      => 'kept original',
                ]);

                return $filename;
            }

            // ------------------------------
            // Non-WebP & Non-SVG processing
            // ------------------------------

            $filename = $originalName;
            $counter = 1;
            while (file_exists($directoryPath . '/' . $filename)) {
                $filename = $nameWithoutExt . '_' . $counter . '.' . $originalExt;
                $counter++;
            }

            $filePath = $directoryPath . '/' . $filename;

            // Create ImageManager instance
            $manager = extension_loaded('imagick') 
                ? new ImageManager(new ImagickDriver()) 
                : new ImageManager(new Driver());

            // Read the image
            $image = $manager->read($file->getRealPath());

            // Resize if larger than max dimensions
            if ($image->width() > $maxWidth || $image->height() > $maxHeight) {
                $image->scale(width: $maxWidth, height: $maxHeight);
            }

            // Save based on format
            switch ($originalExt) {
                case 'jpg':
                case 'jpeg':
                    $image->toJpeg($quality)->save($filePath);
                    break;

                case 'png':
                    if ($quality < 70) {
                        $newFilename = $nameWithoutExt . '.jpg';
                        $counter = 1;
                        while (file_exists($directoryPath . '/' . $newFilename)) {
                            $newFilename = $nameWithoutExt . '_' . $counter . '.jpg';
                            $counter++;
                        }
                        $filePath = $directoryPath . '/' . $newFilename;
                        $image->toJpeg($quality)->save($filePath);
                        $filename = $newFilename;
                    } else {
                        $image->toPng()->save($filePath);
                    }
                    break;

                default:
                    $newFilename = $nameWithoutExt . '.jpg';
                    $counter = 1;
                    while (file_exists($directoryPath . '/' . $newFilename)) {
                        $newFilename = $nameWithoutExt . '_' . $counter . '.jpg';
                        $counter++;
                    }
                    $filePath = $directoryPath . '/' . $newFilename;
                    $image->toJpeg($quality)->save($filePath);
                    $filename = $newFilename;
            }

            return $filename;

        } catch (\Exception $e) {
            \Log::error('Image storage failed: ' . $e->getMessage());
            return null;
        }
    }
    
}

if (! function_exists('storePDFWithOriginalName')) {
    /**
     * Store uploaded PDF with its original name without compression.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $folder
     * @return string|null
     */
    // function storePDFWithOriginalName($file, $folder)
    // {
    //     if (!$file || !$file->isValid()) {
    //         return null;
    //     }

    //     try {
    //         // Create directory if it doesn't exist
    //         $directoryPath = public_path($folder);
    //         if (!file_exists($directoryPath)) {
    //             mkdir($directoryPath, 0755, true);
    //         }

    //         // Get original filename
    //         $filename = $file->getClientOriginalName(); 
    //         $filePath = $directoryPath . '/' . $filename;

    //         // Move uploaded file (overwrite if exists)
    //         $file->move($directoryPath, $filename); 

    //         return $filename;

    //     } catch (\Exception $e) {
    //         \Log::error('PDF storage without compression failed: ' . $e->getMessage());
    //         return null;
    //     }
    // }
 

    function storePDFWithOriginalName($file, $folder)
    {
        if (!$file || !$file->isValid()) {
            return null;
        }

        try {
            $directoryPath = public_path($folder); 
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0755, true);
            }

            $filename = $file->getClientOriginalName();
            $filePath = $directoryPath . '/' . $filename;

            // Save original
            $file->move($directoryPath, $filename);

            // === PDF Compression via ILovePDF API ===
            $ilovepdf = new Ilovepdf(
                env('ILOVEPDF_PUBLIC_KEY'), 
                env('ILOVEPDF_SECRET_KEY')
            );

            $task = $ilovepdf->newTask('compress');
            $task->addFile($filePath);
            $task->execute();

            // Download compressed file (overwrite original)
            $task->download($directoryPath); 

            return $filename;

        } catch (\Exception $e) {
            \Log::error('PDF storage with ILovePDF failed: ' . $e->getMessage());
            return null;
        }
    }


} 
