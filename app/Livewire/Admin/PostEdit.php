<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use DOMDocument;

class PostEdit extends Component
{
    use WithFileUploads;

    public $title, $content, $meta_keywords, $meta_description, $category, $visibility, $featured_image, $tags, $categories_html;
    public $post_id;
    public $post;
    private $existingImageUrls = [];

    public function mount($categories_html, $post)
    {
        $this->post = $post;
        $this->post_id = $post->id;
        $this->categories_html = $categories_html;
        $post = Post::findOrFail($this->post_id);
        $this->title = $post->title;
        $this->content = $post->content;
        $this->meta_keywords = $post->meta_keywords;
        $this->meta_description = $post->meta_description;
        $this->category = $post->category_id;
        $this->visibility = $post->visibility;
        $this->tags = $post->tags;

        // Extract existing image URLs from content
        $this->existingImageUrls = $this->extractImageUrls($post->content);
        info('Existing Image URLs on Mount:', ['urls' => $this->existingImageUrls]);
    }

    private function extractImageUrls($html)
    {
        if (empty($html)) {
            return [];
        }

        $urls = [];
        $doc = new DOMDocument();
        @$doc->loadHTML($html); // Suppress warnings for malformed HTML
        $images = $doc->getElementsByTagName('img');

        foreach ($images as $image) {
            $src = $image->getAttribute('src');
            if ($src && strpos($src, '/storage/froala_images/') !== false) {
                $urls[] = $src;
            }
        }

        return array_unique($urls);
    }

    public function updatePost()
    {
        $this->validate([
            'title' => 'required|unique:posts,title,' . $this->post_id,
            'content' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'category' => 'required|exists:categories,id',
            'visibility' => 'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'tags' => 'required',
        ]);

        $post = Post::findOrFail($this->post_id);

        // Debug content before updating
        info('Froala Content (Before Update):', ['content' => $this->content]);

        // Extract new image URLs from updated content
        $newImageUrls = $this->extractImageUrls($this->content);
        info('New Image URLs:', ['urls' => $newImageUrls]);

        // Delete unreferenced images
        $imagesToDelete = array_diff($this->existingImageUrls, $newImageUrls);
        foreach ($imagesToDelete as $url) {
            $path = str_replace(Storage::url(''), '', $url); // Convert URL to storage path
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
                info('Deleted unreferenced image:', ['path' => $path]);
            }
        }

        // Handle featured image
        $featuredImagePath = $post->featured_image;
        if ($this->featured_image) {
            // Delete old featured image and thumbnail
            if ($featuredImagePath && Storage::disk('public')->exists($featuredImagePath)) {
                Storage::disk('public')->delete($featuredImagePath);
                $oldThumbnailPath = 'posts/thumbnails/' . basename($featuredImagePath);
                if (Storage::disk('public')->exists($oldThumbnailPath)) {
                    Storage::disk('public')->delete($oldThumbnailPath);
                }
            }

            // Store new featured image
            $newFilename = Str::random(20) . '.' . $this->featured_image->getClientOriginalExtension();
            $featuredImagePath = $this->featured_image->storeAs('posts', $newFilename, 'public');
            $newOriginalFullPath = storage_path('app/public/' . $featuredImagePath);

            // Generate thumbnail
            $this->createThumbnail($newOriginalFullPath, $newFilename, 250, 250);
        }

        // Update post
        $post->update([
            'title' => $this->title,
            'content' => $this->content,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
            'category_id' => $this->category,
            'slug' => Str::slug($this->title),
            'visibility' => $this->visibility,
            // 'user_id' => Auth::user()->id, // Uncomment if needed
            'tags' => $this->tags,
            'featured_image' => $featuredImagePath,
        ]);

        // Update existing image URLs for future updates
        $this->existingImageUrls = $newImageUrls;

        // Dispatch toast event
        $this->dispatch('toastMagic', [
            'status' => 'success',
            'title' => 'Post updated successfully',
            'options' => [
                'showCloseBtn' => true,
                'progressBar' => true,
                'backdrop' => true,
                'positionClass' => 'toast-top-left',
            ],
        ]);

        // Flash message and redirect
        session()->flash('success', 'Post updated successfully');
        return $this->redirect(route('admin.posts.index'));
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
                return false;
        }

        $width = imagesx($img);
        $height = imagesy($img);

        $thumb = imagecreatetruecolor($thumbWidth, $thumbHeight);
        imagecopyresampled($thumb, $img, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $width, $height);

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

    public function render()
    {
        return view('livewire.admin.post-edit');
    }
}