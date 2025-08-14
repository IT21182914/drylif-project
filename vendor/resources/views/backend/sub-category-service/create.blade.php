@extends('layouts.backend')
@section('Name', 'Sub Category List')
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
                                        <h4 class="card-name">Create New Sub Category Service</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form" action="{{ route('sub_category_service.store') }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="name">Sub Category Name</label>
                                                                <input type="text" id="name" class="form-control"
                                                                    value="{{ old('name') }}"
                                                                    placeholder="Enter Sub Category Name Text"
                                                                    name="name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="sub_category_id">Select Sub Category</label>
                                                                <select class="select2 form-control" name="sub_category_id">
                                                                    <option value="">Choose a Sub Category</option>
                                                                    @foreach ($sub_categories as $sub_category)
                                                                        <option value="{{ $sub_category->id }}">
                                                                            {{ $sub_category->title }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="image">Upload Banner Image <span>(Image
                                                                        Dimention: 1080x720)</span></label>
                                                                <img id="imagePreview1"
                                                                    src="{{ asset('assets/img/banner/demo.jpg') }}"
                                                                    alt="Image Preview"
                                                                    style="width: 30%; height: 30%; object-fit: cover;"><br>
                                                                <input type="file" name="image"
                                                                    class="form-control-file mt-2"
                                                                    onchange="previewImage(this, 'imagePreview1')">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="paragraph">Sub Paragraph</label>
                                                                <textarea type="text" id="paragraph" class="form-control" name="paragraph" rows="5" cols="20"
                                                                    value="{{ old('paragraph') }}">Enter Text</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary mr-1 mb-1">Submit</button>
                                                            <a
                                                                href="{{ route('sub_category_service.index') }}"class="btn btn-primary mr-1 mb-1">Back</a>
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
