@extends('back.layout.pages-layout')
@section('title') actegories @endsection
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
</script>
    
@endpush