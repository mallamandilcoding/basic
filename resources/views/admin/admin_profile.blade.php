@extends('admin.admin_master');
@section('admin-index')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <center class="mt-3">
                            <img class=" img-thumbnail rounded-circle avatar-xl" src="{{ (!empty($adminData['image_profile']))? url('upload/admin_images/'.$adminData->image_profile) : url('upload/no_image.png') }}" alt="Card image cap">
                        </center>

                        <div class="card-body">
                           
                           {{-- {!! dd($adminData) !!} --}}
                            <h4 class="card-title">Name: {{ $adminData->name }}</h4> <hr>
                            <h4 class="card-title">Email: {{ $adminData->email }}</h4> <hr> 
                            <a href="{{ route('edit.profile') }}" class="btn btn-primary btn-rounded waves-effect waves-light">Edit Details</a>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>

@endsection