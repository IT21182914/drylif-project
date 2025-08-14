@extends('layouts.backend')
@section('Title', 'Sub Category List')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="card p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <section id="multiple-column-form">
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Create New Sub Category</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form" action="{{ route('sub_category.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="title">Sub Category Title</label>
                                                                <input type="text" id="title" class="form-control"
                                                                    value="{{ old('title') }}"
                                                                    placeholder="Enter Sub Category Title Text"
                                                                    name="title">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="category_id">Select Category</label>
                                                                <select class="select2 form-control" name="category_id">
                                                                    <option value="">Choose a Category</option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}">
                                                                            {{ $category->name }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="banner">Upload Banner Image <span>(Image
                                                                        Dimention: 1080x720)</span></label>
                                                                <img id="imagePreview1"
                                                                    src="{{ asset('assets/img/banner/demo.jpg') }}"
                                                                    alt="Image Preview"
                                                                    style="width: 30%; height: 30%; object-fit: cover;"><br>
                                                                <input type="file" name="banner"
                                                                    class="form-control-file mt-2"
                                                                    onchange="previewImage(this, 'imagePreview1')">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="sub_title">Sub Title</label>
                                                                <textarea type="text" id="sub_title" class="form-control" name="sub_title" rows="5" cols="20"
                                                                    value="{{ old('sub_title') }}">Enter Text</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary mr-1 mb-1">Submit</button>
                                                            <a
                                                                href="{{ route('sub_category.index') }}"class="btn btn-primary mr-1 mb-1">Back</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(input, previewId) {
            var preview = document.getElementById(previewId); // Get the preview element
            var file = input.files[0]; // Get the selected file

            var reader = new FileReader(); // Initialize a new FileReader object

            reader.onload = function(e) {
                // Set the preview source to the FileReader result
                preview.src = e.target.result;
                preview.style.display = 'block'; // Display the preview image
            }

            // Read the selected file as a data URL and trigger the onload event
            reader.readAsDataURL(file);
        }
    </script>
@endsection
