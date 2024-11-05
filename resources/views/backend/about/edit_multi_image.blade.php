@extends('backend.master')

@section('main-content')

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Multi Image</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">About Page Setup</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">

        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card p-3">
                        <div class="card-body">
                            <h4 class="mb-4">Edit Multi Image</h4>

                            <form action="{{ route('update.multi.image') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $image->id }}">

                                {{-- Multi Image --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Multi Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" class="form-control" name="multi_image" id="multi_image"/>
                                    </div>
                                </div>

                                {{-- Image Show --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3">

                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <img src="{{ (!empty($image->multi_image))? url($image->multi_image) : url('upload/No_Image.jpg') }}" class="p-1 rounded-circle" al t="user avatar" width="110" id="showImage">
                                    </div>
                                </div>

                                {{-- Update --}}
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-success px-4" value="Update Image" />
                                    </div>
                                </div>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    // IMAGE UPLOAD AND SHOW
    $(document).ready(function(){
        $("#multi_image").change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#showImage").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection