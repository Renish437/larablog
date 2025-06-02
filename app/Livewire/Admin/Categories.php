<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\ParentCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;
    public $isUpdateParentCategoryMode = false;
    public $pcategory_id,$pcategory_name;
    public $isUpdateCategoryMode = false;
    public $category_id,$parent=0,$category_name;
    protected $listeners =[
        'updateParentCategoryOrdering',
        'updateCategoryOrdering',
        'performDeleteParentCategory',
        'performDeleteCategory'
      
    ];
  public $pcategoriesPerPage = 3;
  public $categoriesPerPage = 3;
    public function updateParentCategoryOrdering($positions){
        foreach($positions as $position){
            $index = $position[0];
            $new_position = $position[1];
            ParentCategory::where('id',$index)->update(['ordering' => $new_position]);
            $this->dispatch('toastMagic',status: 'success',title: 'ParentCategory Order Updated Successfully',options: ['showCloseBtn' => true,'progressBar' => true,'backdrop' => true,'positionClass' => 'toast-top-left',]);
        }
    }
    public function updateCategoryOrdering($positions){
        foreach($positions as $position){
            $index = $position[0];
            $new_position = $position[1];
            Category::where('id',$index)->update(['ordering' => $new_position]);
            $this->dispatch('toastMagic',status: 'success',title: 'Category Order Updated Successfully',options: ['showCloseBtn' => true,'progressBar' => true,'backdrop' => true,'positionClass' => 'toast-top-left',]);
        }
    }

    public function deleteParentCategory($id){
       
        $this->dispatch('deleteParentCategory', $id);
    }
public function performDeleteParentCategory($id)
{
    // It's good practice to wrap this in a transaction
    // to ensure that if anything fails, the whole operation is rolled back.
    DB::beginTransaction();

    try {
        $pcategory = ParentCategory::with('categories')->findOrFail($id); // Eager load categories

        // Update child categories to set their parent_category_id to NULL
        // This is more efficient than looping and updating one by one.
        if ($pcategory->categories->isNotEmpty()) {
            // This updates all related categories in a single query
            $pcategory->categories()->update(['parent_category_id' => null]);
        }
        // Alternative if you didn't eager load:
        // Category::where('parent_category_id', $pcategory->id)->update(['parent_category_id' => null]);


        // Now, delete the parent category.
        // Since its children no longer reference it, the RESTRICT constraint won't block this.
        $deleted = $pcategory->delete();

        if ($deleted) {
            DB::commit(); // All good, commit the transaction
            $this->dispatch('toastMagic',
                status: 'success',
                title: 'Parent Category Deleted Successfully',
                options: [
                    'showCloseBtn' => true,
                    'progressBar' => true,
                    'backdrop' => true,
                    'positionClass' => 'toast-top-left',
                ]
            );
        } else {
            DB::rollBack(); // Something went wrong with the delete itself
            $this->dispatch('toastMagic',
                status: 'error',
                title: 'Failed to delete parent category.',
                options: [
                    'showCloseBtn' => true,
                    'progressBar' => true,
                    'backdrop' => true,
                    'positionClass' => 'toast-top-left',
                ]
            );
        }
    } catch (\Exception $e) {
        DB::rollBack(); // Something went wrong (e.g., findOrFail, or other DB error)
        // Log the error for debugging: \Log::error($e->getMessage());
        $this->dispatch('toastMagic',
            status: 'error',
            title: 'An error occurred.',
            message: 'Could not delete parent category. ' . $e->getMessage(), // More detailed for dev, careful for prod
            options: [
                'showCloseBtn' => true,
                'progressBar' => true,
                'backdrop' => true,
                'positionClass' => 'toast-top-left',
            ]
        );
    }
}
public function addCategory(){
    $this->category_id = null;
    $this->parent = 0;
    $this->category_name = null;
    $this->isUpdateCategoryMode = false;
    $this->showCategoryModalForm();
}
public function createCategory(){
    $this->validate([
        'category_name' => 'required|unique:categories,name'
    ],[
        'category_name.required' => 'Category field is required',
        'category_name.unique' => 'Category name already exists'
    ]);
    $category = new Category();
    $category->name = $this->category_name;
    $category->parent_category_id = $this->parent;
    $saved = $category->save();
    if($saved){
        $this->hideCategoryModalForm();
        $this->dispatch('toastMagic',status: 'success',title: 'Category Created Successfully',options: ['showCloseBtn' => true,'progressBar' => true,'backdrop' => true,'positionClass' => 'toast-top-left',]);
    }else{
        $this->dispatch('toastMagic',status: 'error',title: 'Something went wrong',options: ['showCloseBtn' => true,'progressBar' => true,'backdrop' => true,'positionClass' => 'toast-top-left',]);
    }

}
public function editCategory($category_id){
    
    $category = Category::findOrFail($category_id);
    $this->category_id = $category->id;
    $this->category_name = $category->name;
    $this->parent = $category->parent_category_id;
    $this->isUpdateCategoryMode = true;
    $this->showCategoryModalForm();
}
public function updateCategory(){
    $category = Category::findOrFail($this->category_id);
    $this->validate([
        'category_name' => 'required|unique:categories,name,'.$category->id,
    ],[
        'category_name.required' => 'Category field is required',
        'category_name.unique' => 'Category name already exists',
    ]);
    $category->name = $this->category_name;
    $category->parent_category_id = $this->parent;
    $category->slug = null;
    $saved = $category->save();
    if($saved){
        $this->hideCategoryModalForm();
        $this->dispatch('toastMagic',status: 'success',title: 'Category Updated Successfully',options: ['showCloseBtn' => true,'progressBar' => true,'backdrop' => true,'positionClass' => 'toast-top-left',]);
    }else{
        $this->dispatch('toastMagic',status: 'error',title: 'Something went wrong',options: ['showCloseBtn' => true,'progressBar' => true,'backdrop' => true,'positionClass' => 'toast-top-left',]);
    }

}
public function showCategoryModalForm(){
$this->resetErrorBag();
$this->dispatch('showCategoryModalForm');
}
public function hideCategoryModalForm(){
$this->dispatch('hideCategoryModalForm');
$this->isUpdateCategoryMode = false;
$this->category_id=$this->category_name=null;
$this->parent=0;
}
public function deleteCategory($id){

    $this->dispatch('deleteCategory', $id);
}
public function performDeleteCategory($id)
{

    $category = Category::findOrFail($id);
  
    $deleted = $category->delete();
    if ($deleted) {
        $this->dispatch('toastMagic', 
            status: 'success', 
            title: 'Category Deleted Successfully', 
            options: [
                'showCloseBtn' => true,
                'progressBar' => true,
                'backdrop' => true,
                'positionClass' => 'toast-top-left',
            ]
        );
    } else {
        $this->dispatch('toastMagic', 
            status: 'error', 
            title: 'Something went wrong', 
            options: [
                'showCloseBtn' => true,
                'progressBar' => true,
                ]
        );
    }
}
    public function addParentCategory(){
          $this->pcategory_id = null;
          $this->pcategory_name = null;
          $this->isUpdateParentCategoryMode = false;
          $this->showParentCategoryModalForm();
    }
    public function showParentCategoryModalForm(){
        $this->resetErrorBag();
        $this->dispatch('showParentCategoryModalForm');
    }
    public function hideParentCategoryModalForm(){
        $this->dispatch('hideParentCategoryModalForm');
        $this->isUpdateParentCategoryMode = false;
        $this->pcategory_id = $this->pcategory_name = null;
    }

    public function createParentCategory(){
        $this->validate([
            'pcategory_name' => 'required|unique:parent_categories,name'
        ],[
            'pcategory_name.required' => 'Parent category field is required',
            'pcategory_name.unique' => 'Parent category name already exists',
        ]);
        // store the parent category
        $parent_category = new ParentCategory();
        $parent_category->name = $this->pcategory_name;
        $saved = $parent_category->save();
        if($saved){
            $this->hideParentCategoryModalForm();
            $this->dispatch('toastMagic',status: 'success',title: 'Parent Category Created Successfully',options: ['showCloseBtn' => true,'progressBar' => true,'backdrop' => true,'positionClass' => 'toast-top-left',]);
        }else{
            $this->dispatch('toastMagic',status: 'error',title: 'Something went wrong',options: ['showCloseBtn' => true,'progressBar' => true,'backdrop' => true,'positionClass' => 'toast-top-left',]);
        }
      
        // $this->dispatch('createdParentCategory');

    }
    public function editParentCategory($pcategory_id){
        $pcategory = ParentCategory::findOrFail($pcategory_id);
        $this->pcategory_id = $pcategory->id;
        $this->pcategory_name = $pcategory->name;
        $this->isUpdateParentCategoryMode = true;
        $this->showParentCategoryModalForm();
    }
    public function updateParentCategory(){
        $pcategory = ParentCategory::findOrFail($this->pcategory_id);
        $this->validate([
            'pcategory_name' => 'required|unique:parent_categories,name,'.$pcategory->id,
        ],[
            'pcategory_name.required' => 'Parent category field is required',
            'pcategory_name.unique' => 'Parent category name already exists',
        ]);
        $pcategory->name = $this->pcategory_name;
        $pcategory->slug = null;

        $updated = $pcategory->save();
        if($updated){
            $this->hideParentCategoryModalForm();
            $this->dispatch('toastMagic',status: 'success',title: 'Parent Category Updated Successfully',options: ['showCloseBtn' => true,'progressBar' => true,'backdrop' => true,'positionClass' => 'toast-top-left',]);
        }else{
            $this->dispatch('toastMagic',status: 'error',title: 'Something went wrong',options: ['showCloseBtn' => true,'progressBar' => true,'backdrop' => true,'positionClass' => 'toast-top-left',]);
        }
    }
    public function render()
    {

        return view('livewire.admin.categories',[
            'pcategories' => ParentCategory::orderBy('ordering','asc')->paginate($this->pcategoriesPerPage,['*'], 'pcat_page'),
            'categories' => Category::orderBy('ordering','asc')->paginate($this->categoriesPerPage,['*'], 'cat_page'),
        ]);
    }
}
