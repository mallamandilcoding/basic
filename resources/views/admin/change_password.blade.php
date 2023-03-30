@extends('admin.admin_master');
@section('admin-index')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Change Password Page</h4>
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show">{{ $error}}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('update.password')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password"  id="oldpassword" name="oldpassword" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password"  id="newpassword" name="newpassword" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password"  id="confirmpassword" name="confirmpassword" value="">
                                    </div>
                                </div>
                             
                                
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
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