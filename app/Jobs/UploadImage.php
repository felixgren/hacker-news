<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UploadImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public $fileId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $fileId)
    {
        $this->user = $user;
        $this->fileId = $fileId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = storage_path() . '/uploads/' . $this->fileId;
        $fileName = $this->fileId . '.png';

        // Encode image to png and downscale/upscale to 184x184 pixels
        Image::make($path)->encode('png')->fit(184, 184, function ($constraint) {
            $constraint->upsize();
        })->save();

        // When processed/uploaded to s3 cloud delete from temp storage
        if (Storage::disk('s3')->put('avatar/' . $fileName, fopen($path, 'r+'))) {
            File::delete($path);
        }

        // Update users avatar_filename column
        $this->user->avatar_filename = $fileName;
        $this->user->save();
    }
}
