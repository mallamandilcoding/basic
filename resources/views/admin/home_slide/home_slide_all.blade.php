@extends('admin.admin_master');
@section('admin-index')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Home slide Page</h4>
                            <form action="{{ route('update.profile')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Title" id="title" name="title" value="{{ $homeslide->title }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Short Title" id="short_title" name="short_title" value="{{ $homeslide->short_title }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Video Url</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="Video Url" id="video_url" name="video_url" value="{{ $homeslide->video_url }}">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Slider Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="home_slide" name="home_slide">
                                    </div>
                                </div>


                                
                                <div class="row mb-3">
                                    <label for="showimage" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class=" avatar-md" src="{{ (!empty($homeslide['home_slide']))? url('upload/home_slide/'.$homeslide->home_slide) : url('upload/no_image.png') }}" alt="Card image cap" id="home_slide_update">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slide">
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
            $('#home_slide').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#home_slide_update').attr('src',e.target.result)
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        }); 
    </script>
   

   
@endsection