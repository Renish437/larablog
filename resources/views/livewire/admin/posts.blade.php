<div class="pd-20 card-box mb-30">
    <div class="row mb-20">
        <div class="col-md-4">
            <label for="search">Search</label>
            <input wire:model.live="search" type="text" class="form-control" id="search" placeholder="Search..."/>
        </div>
        @if(Auth::user()->type == 'superAdmin')
            <div class="col-md-2">
                <label for="author"><b class="text-secondary">Author</b></label>
                <select wire:model.live="author" name="author" class="form-control custom-select" id="author">
                    <option value="">All</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        <div class="col-md-2">
            <label for="category"><b class="text-secondary">Category</b></label>
            <select wire:model.live="category" name="category" class="form-control custom-select" id="category">
                <option value="">All</option>
                {!! $categories_html !!}
            </select>
        </div>
        <div class="col-md-2">
            <label for="visibility"><b class="text-secondary">Visibility</b></label>
            <select wire:model.live="visibility" name="visibility" class="form-control custom-select" id="visibility">
                <option value="">All</option>
                <option value="1">Private</option>
                <option value="0">Public</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="sort"><b class="text-secondary">Sort By</b></label>
            <select wire:model.live="sortBy" name="sort" class="form-control custom-select" id="sort">
                <option value="desc">DESC</option>
                <option value="asc">ASC</option>
            </select>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-auto table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Visibility</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            <img height="50px" width="50px" class="img-fluid" src="{{ $post->image }}" alt="">
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            @if($post->visibility == 1)
                                <span class="badge badge-success badge-pill">Public</span>
                            @else
                                <span class="badge badge-danger badge-pill">Private</span>
                            @endif
                        </td>
                        <td class="d-flex gap-3 align-items-center">
                            <a href="{{ route('admin.posts.edit', $post->slug) }}" class="btn btn-primary">
                                <i class="icon-copy dw dw-edit2 mr-2"></i> Edit
                            </a>
                            <a href="javascript:;" wire:click="deletePost({{ $post->id }})" class="btn btn-danger ml-2">
                                <i class="icon-copy dw dw-delete-3 mr-2"></i> Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center fw-2" colspan="7">No posts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $posts->links('livewire::bootstrap') }}
        </div>
    </div>
</div>
@push('scripts')
<script>
     window.addEventListener("deletePost", function (event) {
        console.log('Event received:', event);
        console.log('Event detail:', event.detail);
        var id = event.detail[0]; // Extract scalar id
       

        Swal.fire({
            title: 'Confirm Deletion',
            text: `Are you sure you want to delete the post with ID ${id}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',
            position: 'top',
            backdrop: true,
            allowOutsideClick: true
        }).then((result) => {
            if (result.isConfirmed) {
                console.log('Dispatching performDeleteCategory with id:', id);
                Livewire.dispatch('performDeletePost', { id: id }); // Use named parameter
            }
        });
    });
</script>
    
@endpush