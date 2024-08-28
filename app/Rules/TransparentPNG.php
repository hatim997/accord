<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
// use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Facades\Image as Image;
// use Image;


class TransparentPNG implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
           // Check if the file is a PNG image
           if ($value->getClientOriginalExtension() !== 'png') {
            $fail('The image must be a PNG file.');
            return;
        }

        // Check image dimensions
        $image = Image::make($value->getRealPath());
        if ($image->width() !== 200 || $image->height() !== 100) {
            $fail('The image dimensions must be 200x100 pixels.');
            return;
        }

        // Check file size
        if ($value->getSize() > 100 * 1024) { // 100 KB limit
            $fail('The image size must be less than 100KB.');
            return;
        }

        // Check if the image has transparency (alpha channel)
        if (!$this->hasTransparency($image)) {
            $fail('The image must have transparency.');
            return;
        }
    }

    /**
     * Check if the image has transparency (alpha channel).
     *
     * @param  \Intervention\Image\Image  $image
     * @return bool
     */
    private function hasTransparency($image)
    {
        return $image->mime() === 'image/png' && $image->getCore()->alphaChannel;
    }
}
