
                    <form wire:submit.prevent="createPost" autocomplete="off" enctype="multipart/form-data" id="addPostForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="card card-box mb-2">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for=""><b>Title</b></label>
                                            <input type="text" class="form-control" wire:model="title" placeholder="Enter title">
                                               @error('title')
                                                   <span class="text-danger">{{ $message }}</span>
                                               @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>Content</b></label>
                                            <textarea class="form-control" wire:model="content" placeholder="Enter content" rows="10" cols="30"></textarea>
                                               @error('content')
                                                   <span class="text-danger">{{ $message }}</span>
                                               @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-box mb-2">
                                    <div class="card-header weight-500">
                                        SEO
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for=""><b>Post meta keywords</b>(Seperated by comma)</label>
                                            <input type="text" wire:model="meta_keywords" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>Post meta description</b></label>
                                            <textarea wire:model="meta_description" class="form-control" placeholder="Enter meta description" rows="10" cols="30"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-box mb-2">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for=""><b>Post Category</b></label>
                                            <select wire:model="category" class="form-control">
                                                <option value="">Select Category</option>
                                               {!! $categories_html !!}
                                            </select>
                                          @error('category')
                                              <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>Post Featured Image</b>:</label>
                                            <input type="file" wire:model="featured_image" class="form-control-file form-control" height="auto">
                                            @error('featured_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                             <div wire:loading wire:target="featured_image" class="text-success">Uploading...</div>
                                  
                                        </div>
                                     
                                       
                                       @if($featured_image)
                                        
                                       <div class="d-block mb-3" style="max-width: 250px;">
                                            <img wire:loading.remove wire:target="featured_image" accept="image/*" src="{{ $featured_image->temporaryUrl() }}" class="img-thumbnail" id="featured_image_preview" data-ijabo-default-img="" alt="img_preview">
                                 
                                        </div>
                                        
                                       @endif

                                        <div class="form-group">
              <label for="tags" class="font-weight-bold"><b>Tags</b></label>
       
         
            <input type="text" class="form-control" wire:model="tags">
      
        @error('tags')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
                                            {{-- <span class="text-danger error-text tags_error"></span> --}}
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
                            <button wire:loading wire:target="createPost" type="submit" class="btn btn-primary" disabled><span wire:loading wire:target="createPost">Uploading..</span></button>
                            <button  wire:loading.remove wire:target="createPost"     type="submit" class="btn btn-primary"><span><i wire:loading wire:target="createPost" class="fa fa-spinner fa-spin text-white"></i></span>Create Post</button>
                        </div>
                    </form>
                    @push('scripts')
                    {{-- <script src="{{ asset('back/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script> --}}
                    <script>







                    </script>
                    @endpush
                    {{-- @push('styles')
                    <link rel="stylesheet" href="{{ asset('back/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
                        
                    @endpush --}}