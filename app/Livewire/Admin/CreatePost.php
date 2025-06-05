<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;




class CreatePost extends Component
{ 
    use WithFileUploads;

    public $title,$content,$meta_keywords,$meta_description,$category,$visibility,$featured_image,$tags,$categories_html;
    
    
    public function createPost(){
      $this->validate([
        'title' => 'required|unique:posts,title',
        'content' => 'required',
        'meta_keywords' => 'required',
        'meta_description' => 'required',
        'category' => 'required|exists:categories,id',
        'visibility' => 'required',
       'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

        'tags' => 'required',
      ]);

      $post = new Post();
      $post->title = $this->title;
      $post->content = $this->content;
      $post->meta_keywords = $this->meta_keywords;
      $post->meta_description = $this->meta_description;
      $post->category_id = $this->category;
      $post->visibility = $this->visibility;
      $post->user_id = Auth::user()->id;
      $post->tags = $this->tags;
      $post->save();

      
     
     
// Store original image
    $filename = Str::random(20) . '.' . $this->featured_image->getClientOriginalExtension();
    $path = $this->featured_image->storeAs('posts', $filename, 'public');

    // Generate thumbnail using GD
    $this->createThumbnail(storage_path('app/public/' . $path), $filename, 250, 250);

    // Save path in DB
    $post->featured_image = $path;
    $post->save();

      $this->reset(['title','content','meta_keywords','meta_description','category','visibility','tags','featured_image']);
      $this->dispatch('clearFroalaContent');
      $this->dispatch('toastMagic',status: 'success',title: 'Post Created Successfully',options: ['showCloseBtn' => true,'progressBar' => true,'backdrop' => true,'positionClass' => 'toast-top-left',]);
       session()->flash('success', 'Post updated Successfully');
$this->redirect(route('admin.posts.index'));
    }
    public function mount($categories_html){
      $this->categories_html = $categories_html;
    }
    public function render()
    {
        return view('livewire.admin.create-post');
    }
    protected function createThumbnail($originalPath, $filename, $thumbWidth, $thumbHeight)
{
    $extension = pathinfo($originalPath, PATHINFO_EXTENSION);

    switch (strtolower($extension)) {
        case 'jpg':
        case 'jpeg':
            $img = imagecreatefromjpeg($originalPath);
            break;
        case 'png':
            $img = imagecreatefrompng($originalPath);
            break;
        case 'gif':
            $img = imagecreatefromgif($originalPath);
            break;
        case 'webp':
            $img = imagecreatefromwebp($originalPath);
            break;
        default:
            return false; // unsupported type
    }

    $width = imagesx($img);
    $height = imagesy($img);

    // Create new thumbnail image
    $thumb = imagecreatetruecolor($thumbWidth, $thumbHeight);

    // Resize and crop to center
    imagecopyresampled($thumb, $img, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $width, $height);

    // Save thumbnail
    $thumbnailPath = storage_path('app/public/posts/thumbnails');
    if (!File::isDirectory($thumbnailPath)) {
        File::makeDirectory($thumbnailPath, 0777, true, true);
    }

    $savePath = $thumbnailPath . '/thumb_' . $filename;

    switch (strtolower($extension)) {
        case 'jpg':
        case 'jpeg':
            imagejpeg($thumb, $savePath);
            break;
        case 'png':
            imagepng($thumb, $savePath);
            break;
        case 'gif':
            imagegif($thumb, $savePath);
            break;
        case 'webp':
            imagewebp($thumb, $savePath);
            break;
    }

    imagedestroy($img);
    imagedestroy($thumb);

    return true;
}
// protected function createThumbnail($originalPath, $filename, $thumbWidth, $thumbHeight)
// {
//     $extension = strtolower(pathinfo($originalPath, PATHINFO_EXTENSION));

//     // Load the original image
//     switch ($extension) {
//         case 'jpg':
//         case 'jpeg':
//             $img = imagecreatefromjpeg($originalPath);
//             break;
//         case 'png':
//             $img = imagecreatefrompng($originalPath);
//             break;
//         case 'gif':
//             $img = imagecreatefromgif($originalPath);
//             break;
//         case 'webp':
//             $img = imagecreatefromwebp($originalPath);
//             break;
//         default:
//             return false; // Unsupported type
//     }

//     if (!$img) {
//         return false; // Failed to load image
//     }

//     $width = imagesx($img);
//     $height = imagesy($img);

//     // Calculate aspect ratio to avoid stretching
//     $srcAspect = $width / $height;
//     $thumbAspect = $thumbWidth / $thumbHeight;

//     if ($srcAspect >= $thumbAspect) {
//         // Source image is wider than thumbnail
//         $newHeight = $thumbHeight;
//         $newWidth = (int)($thumbHeight * $srcAspect);
//         $srcX = (int)(($newWidth - $thumbWidth) / 2);
//         $srcY = 0;
//     } else {
//         // Source image is taller than thumbnail
//         $newWidth = $thumbWidth;
//         $newHeight = (int)($thumbWidth / $srcAspect);
//         $srcX = 0;
//         $srcY = (int)(($newHeight - $thumbHeight) / 2);
//     }

//     // Create new thumbnail image
//     $thumb = imagecreatetruecolor($thumbWidth, $thumbHeight);

//     // Preserve transparency for PNG and GIF
//     if ($extension === 'png' || $extension === 'gif') {
//         imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
//         imagealphablending($thumb, false);
//         imagesavealpha($thumb, true);
//     }

//     // Resize and crop to center
//     $temp = imagecreatetruecolor($newWidth, $newHeight);
//     if ($extension === 'png' || $extension === 'gif') {
//         imagecolortransparent($temp, imagecolorallocatealpha($temp, 0, 0, 0, 127));
//         imagealphablending($temp, false);
//         imagesavealpha($temp, true);
//     }
//     imagecopyresampled($temp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
//     imagecopyresampled($thumb, $temp, 0, 0, $srcX, $srcY, $thumbWidth, $thumbHeight, $thumbWidth, $thumbHeight);

//     // Save thumbnail
//     $thumbnailPath = storage_path('app/public/posts/thumbnails');
//     if (!File::isDirectory($thumbnailPath)) {
//         File::makeDirectory($thumbnailPath, 0777, true, true);
//     }
//     $savePath = $thumbnailPath . '/thumb_' . $filename;

//     switch ($extension) {
//         case 'jpg':
//         case 'jpeg':
//             imagejpeg($thumb, $savePath, 90); // Higher quality (0-100, 90 is a good balance)
//             break;
//         case 'png':
//             imagepng($thumb, $savePath, 9); // Maximum compression (0-9, 9 is least compression)
//             break;
//         case 'gif':
//             imagegif($thumb, $savePath);
//             break;
//         case 'webp':
//             imagewebp($thumb, $savePath, 90); // Higher quality for WebP
//             break;
//     }

//     // Clean up
//     imagedestroy($img);
//     imagedestroy($temp);
//     imagedestroy($thumb);

//     return true;
// }
}
