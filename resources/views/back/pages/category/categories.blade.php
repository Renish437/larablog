@extends('back.layout.pages-layout')
@section('title') Cactegories @endsection
@section('content')
<livewire:admin.categories />


@endsection
@push('scripts')
<script>
    window.addEventListener("showParentCategoryModalForm", function (event) {
        $('#pcategory_modal').modal('show');
    })
    window.addEventListener("hideParentCategoryModalForm", function (event) {
        $('#pcategory_modal').modal('hide');
    })

    $('table tbody#sortable_parent_categories').sortable({
        cursor: "move",
        update:function(event, ui){
            $(this).children().each(function(index){
                if($(this).attr('data-ordering')!= (index+1)){
                    $(this).attr('data-ordering',(index+1)).addClass('updated');
                }
            });
            var postions = [];
            $('.updated').each(function(){
                postions.push([$(this).attr('data-index'),$(this).attr('data-ordering')]);
                $(this).removeClass('updated');
            });
            // alert(postions);
            Livewire.dispatch('updateParentCategoryOrdering',[postions]);
        }
    });

     window.addEventListener("showCategoryModalForm", function (event) {
        $('#category_modal').modal('show');
    })
    window.addEventListener("hideCategoryModalForm", function (event) {
        $('#category_modal').modal('hide');
    })
    $('table tbody#sortable_categories').sortable({
        cursor: "move",
        update:function(event, ui){
            $(this).children().each(function(index){
                if($(this).attr('data-ordering') != (index+1)){
                    $(this).attr('data-ordering',(index+1)).addClass('updated');
                }
            });
            var postions = [];
            $('.updated').each(function(){
                postions.push([$(this).attr('data-index'),$(this).attr('data-ordering')]);
                $(this).removeClass('updated');
            });
            // alert(postions);
            Livewire.dispatch('updateCategoryOrdering',[postions]);
        }
    });
  window.addEventListener("deleteParentCategory", function (event) {
        console.log('Event received:', event);
        console.log('Event detail:', event.detail);
        var id = event.detail[0]; // Extract scalar id
       

        Swal.fire({
            title: 'Confirm Deletion',
            text: `Are you sure you want to delete the parent category with ID ${id}?`,
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
                console.log('Dispatching performDeleteParentCategory with id:', id);
                Livewire.dispatch('performDeleteParentCategory', { id: id }); // Use named parameter
            }
        });
    });
  window.addEventListener("deleteCategory", function (event) {
        console.log('Event received:', event);
        console.log('Event detail:', event.detail);
        var id = event.detail[0]; // Extract scalar id
       

        Swal.fire({
            title: 'Confirm Deletion',
            text: `Are you sure you want to delete the category with ID ${id}?`,
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
                Livewire.dispatch('performDeleteCategory', { id: id }); // Use named parameter
            }
        });
    });

       
</script>    

@endpush

