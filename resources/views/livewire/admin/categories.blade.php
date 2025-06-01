<div class="row">
    <div class="col-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="h4 text-blue">Parent Categories</h4>
                </div>
                <div class="pull-right">
                    <a href="javascript:;" wire:click="addParentCategory" class="btn btn-primary">Add P. Category</a>
                </div>

            </div>
            <div class="table-responsive mt-4">
                <table class="table table-borderless table-striped table-sm">
                    <thead class="bg-secondary text-white">
                        <th>#</th>
                        <th>Name</th>
                        
                        <th>No of posts</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                       @forelse($pcategories as $pcategory)
                         <tr>
                            <td>{{ $pcategory->id }}</td>
                            <td >{{ $pcategory->name }}</td>
                            
                            <td>3</td>
                            <td>
                                <div class="table-actions">
                                    <a href="javascript:;" wire:click="editParentCategory({{ $pcategory->id }})" class="btn btn-sm btn-primary text-white"><i class="dw dw-edit2 mr-1"></i> Edit</a>
                                <a href="#" class="btn btn-sm btn-danger text-white"><i class="dw dw-delete-3 mr-1"></i>Delete</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">No categories found</td>
                        </tr>
                       @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="h4 text-blue">Categories</h4>
                </div>
                <div class="pull-right">
                    <a href="#" class="btn btn-primary">Add Category</a>
                </div>
    
            </div>
            <div class="table-responsive mt-4">
                <table class="table table-borderless table-striped table-sm">
                    <thead class="bg-secondary text-white">
                        <th>#</th>
                        <th>Name</th>
                        <th>Parent Category</th>
                        <th>No of posts</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Computers</td>
                            <td>Electronics</td>
                            <td>3</td>
                            <td>
                                <div class="table-actions">
                                    <a href="#" class="btn btn-sm btn-primary text-white"><i class="dw dw-edit2 mr-1"></i> Edit</a>
                                <a href="#" class="btn btn-sm btn-danger text-white"><i class="dw dw-delete-3 mr-1"></i>Delete</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modals --}}
    <div wire:ignore.self class="modal fade" id="pcategory_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true" data-hidden="true" data-backdrop="static">
									<div class="modal-dialog modal-dialog-centered">
										<form class="modal-content" wire:submit.prevent="{{ $isUpdateParentCategoryMode ? 'updateParentCategory' : 'createParentCategory' }}">
											<div class="modal-header">
												<h4 class="modal-title" id="myLargeModalLabel">
													{{ $isUpdateParentCategoryMode ? 'Update Parent Category' : 'Add Parent Category' }}
												</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
													×
												</button>
											</div>
											<div class="modal-body">
												@if($isUpdateParentCategoryMode)
                                                    <input type="hidden" wire:model="pcategory_id">
                                                @endif
                                                <div class="form-group">
                                                    <label for="">Parent Category Name</label>
                                                    <input type="text" class="form-control" wire:model="pcategory_name" placeholder="Enter your parent category name">
                                                    @error('pcategory_name') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">
													Close
												</button>
												<button type="submit" class="btn btn-primary">
													{{ $isUpdateParentCategoryMode ? 'Update' : 'Add' }}
												</button>
											</div>
										</form>
									</div>
								</div>
</div>