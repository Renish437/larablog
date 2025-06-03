<form wire:submit.prevent="createPost" autocomplete="off" enctype="multipart/form-data" id="addPostForm">
    @csrf
    <div class="row">
        <div class="col-md-9">
            <div class="card card-box mb-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title"><b>Title</b></label>
                        <input type="text" id="title" class="form-control" wire:model="title" placeholder="Enter title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- IMPORTANT: Add wire:ignore to the div wrapping the textarea -->
                    <div class="form-group" wire:ignore>
                        <label for="content_editor"><b>Content</b></label>
                        <!-- Changed id to avoid conflicts, though 'content' might be fine -->
                        <textarea wire:model="content" id="content_editor" class="form-control" rows="10" cols="30"></textarea>
                        {{-- Livewire error display will still work if 'content' property is validated --}}
                    </div>
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="card card-box mb-2">
                <div class="card-header weight-500">
                    SEO
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="meta_keywords"><b>Post meta keywords</b> (Seperated by comma)</label>
                        <input type="text" id="meta_keywords" wire:model="meta_keywords" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="meta_description_editor"><b>Post meta description</b></label>
                        <!-- If this is also a rich editor, apply the same wire:ignore and JS sync -->
                        <!-- Assuming it's a plain textarea for now based on no JS init -->
                        <textarea wire:model="meta_description" id="meta_description_editor" class="form-control" placeholder="Enter meta description" rows="10" cols="30"></textarea>
                         @error('meta_description')
                           <span class="text-danger">{{ $message }}</span>
                       @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-box mb-2">
                <div class="card-body">
                    <div class="form-group">
                        <label for="category"><b>Post Category</b></label>
                        <select wire:model="category" id="category" class="form-control">
                            <option value="">Select Category</option>
                            {!! $categories_html !!}
                        </select>
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="featured_image"><b>Post Featured Image</b>:</label>
                        <input type="file" id="featured_image" wire:model="featured_image" class="form-control-file form-control" height="auto">
                        @error('featured_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div wire:loading wire:target="featured_image" class="text-success">Uploading...</div>
                    </div>

                    @if ($featured_image && !is_string($featured_image)) {{-- Check if it's a temporary uploaded file object --}}
                    <div class="d-block mb-3" style="max-width: 250px;">
                        <img wire:loading.remove wire:target="featured_image" src="{{ $featured_image->temporaryUrl() }}" class="img-thumbnail" id="featured_image_preview" alt="img_preview">
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="tags" class="font-weight-bold"><b>Tags</b></label>
                        <input type="text" id="tags" class="form-control" wire:model="tags">
                        @error('tags')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="visibility"><b>Visibility</b>:</label>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" wire:model="visibility" id="customRadio1" value="1" class="custom-control-input" checked>
                            <label for="customRadio1" class="custom-control-label">Public</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" wire:model="visibility" id="customRadio2" value="0" class="custom-control-input">
                            <label for="customRadio2" class="custom-control-label">Private</label>
                        </div>
                        @error('visibility')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <button wire:loading.attr="disabled" wire:target="createPost" type="submit" class="btn btn-primary">
            <span wire:loading wire:target="createPost">Uploading...</span>
            <span wire:loading.remove wire:target="createPost">Create Post</span>
        </button>
    </div>
</form>

@push('styles')
<link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
@endpush

@push('scripts')
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>

<script>
    // Ensure Livewire is initialized before initializing Froala
    // For Livewire 3+
    document.addEventListener('livewire:init', () => {
        // For Livewire 2.x use: document.addEventListener('livewire:load', () => {

        const editorInstance = new FroalaEditor('#content_editor', { // Use the ID of your textarea
            // Your Froala options here. For example:
            // toolbarButtons: ['bold', 'italic', 'underline', '|', 'formatUL', 'formatOL']
            events: {
                // Sync content to Livewire
                'contentChanged': function () {
                    // 'this' refers to the Froala Editor instance
                    // Use @this.set('propertyName', value) to update Livewire property
                    @this.set('content', this.html.get());
                },
                // Optional: If you need to set initial content from Livewire (e.g., for an edit form)
                // 'initialized': function () {
                //    this.html.set(@json($this->content ?? ''));
                // }
            }
        });

         Livewire.on('clearFroalaContent', () => {
            if (editorInstance && typeof editorInstance.html !== 'undefined' && typeof editorInstance.html.set === 'function') {
                editorInstance.html.set(''); // Use Froala API to clear content
            }
        });
    });
</script>
@endpush