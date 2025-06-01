<?php

namespace App\Livewire\Admin;

use App\Models\ParentCategory;
use Livewire\Component;


class Categories extends Component
{
    public $isUpdateParentCategoryMode = false;
    public $pcategory_id,$pcategory_name;

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
            'pcategories' => ParentCategory::orderBy('ordering','asc')->get()
        ]);
    }
}
