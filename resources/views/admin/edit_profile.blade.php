@extends('admin.admin_master');
@section('admin-index')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Profile Page</h4>
                            <form action="{{ route('update.profile')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Name" id="name" name="name" value="{{ $adminData->name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" placeholder="email" id="email" name="email" value="{{ $adminData->email }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="image" name="image_profile">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="showimage" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class=" avatar-md" src="{{ (!empty($adminData['image_profile']))? url('upload/admin_images/'.$adminData->image_profile) : url('upload/no_image.png') }}" alt="Card image cap" id="showimage">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
                            </form>                         
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            // alert('mandil');
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showimage').attr('src',e.target.result)
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        }); 
    </script>
   

   
@endsection