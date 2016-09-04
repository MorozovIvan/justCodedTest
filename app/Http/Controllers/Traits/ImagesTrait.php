<?php

namespace App\Http\Controllers\Traits;

use App;
use App\Models\Product;
use App\Models\ProductImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait ImagesTrait {


    protected $uploadedImagesFlash = [];


    /**
     * @return array
     */
    public function getAvailableImageExtensions()
    {
        return ['jpeg', 'jpg', 'png', 'gif', 'bmp', 'svg'];
    }


    /**
     * @param Request $request
     * @return array
     * @throws Exception
     */
    protected function createImageFiles(Request $request)
    {
        $files = $this->getRequestFiles($request->file('images'));

        $images = [];

        if($files) {
            if( ! with(( $validator = $this->validateImages($request->file('images')) ))['valid'] ){
                throw new Exception($validator['error']['images']);
            }


            foreach ($files as $file) {
                if (!is_null($file)) {
                    $images[] = $this->imageFileUpload($file);
                }
            }

            session()->flash('info', $this->uploadedImagesFlash);
        }

        return $images;
    }


    /**
     * @param UploadedFile $image
     * @param string $directory
     * @return array   
     */
    protected function imageFileUpload(UploadedFile $image, $directory = ProductImage::UPLOAD_PATH)
    {
        $ext = $image->getClientOriginalExtension();
        $original_name = $image->getClientOriginalName();
        $name = sha1(uniqid('file')) . '.' . $ext;
        $size = $image->getClientSize();
        $image->move(public_path($directory), $name);

        $this->uploadedImagesFlash[] = 'Image ' . $original_name . ' uploaded successfully';

        return compact('name', 'original_name', 'ext', 'size', 'directory');
    }


    /**
     * @param $files
     * @return array|null
     */
    protected function getRequestFiles($files)
    {
        if( ! is_array($files) ) $files[0] = $files;

        return array_filter($files, function($file){
            return  ! is_null($file);
        });
    }


    /**
     * @param ProductImage $image
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function imageDelete(ProductImage $image)
    {
        $filePath = public_path($image->directory . '/' . $image->name);

        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $image->delete();

        return redirect()->back();
    }


    /**
     * @param array $images
     * @return array
     */
    protected function validateImages(array $images){
        $validator = [];
        $images = array_filter($images);

        foreach ($images as $image) {
            $ext = strtolower($image->getClientOriginalExtension());

            if( ! in_array($ext, $this->getAvailableImageExtensions()) ){
                $validator['valid'] = false;
                $validator['error'] = [
                    'images' => 'The image format is invalid. Available file formats are ' . implode(', ', $this->getAvailableImageExtensions())
                ];

                return $validator;
            }
        }

        $validator['valid'] = true;

        return $validator;
    }


}


