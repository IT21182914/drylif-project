@extends('layouts.backend')
@section('Title', 'Testimonial List')
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
                                        <h4 class="card-title">Create New Testimonial</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form" action="{{ route('testimonial.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="name">Company Name</label>
                                                                <input type="text" id="name" class="form-control"
                                                                    value="{{ old('name') }}"
                                                                    placeholder="Enter Company Name" name="name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="logo">Upload Client logo <span>(Image
                                                                        Dimention: 300X25)</span></label>
                                                                <img id="imagePreview1"
                                                                    src="{{ asset('assets/img/banner/demo.jpg') }}"
                                                                    alt="Image Preview"
                                                                    style="width: 30%; height: 30%; object-fit: cover;"><br>
                                                                <input type="file" name="logo"
                                                                    class="form-control-file mt-2"
                                                                    onchange="previewImage(this, 'imagePreview1')">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="client_pic">Upload Client Profile Image
                                                                    <span>(Image
                                                                        Dimention: 500x500)</span></label>
                                                                <img id="imagePreview2"
                                                                    src="{{ asset('assets/img/banner/demo.jpg') }}"
                                                                    alt="Image Preview"
                                                                    style="width: 30%; height: 30%; object-fit: cover;"><br>
                                                                <input type="file" name="client_pic"
                                                                    class="form-control-file mt-2"
                                                                    onchange="previewImage(this, 'imagePreview2')">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="client_name">Client Name</label>
                                                                <input type="text" id="client_name" class="form-control"
                                                                    value="{{ old('client_name') }}"
                                                                    placeholder="Enter Client Name" name="client_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="designation">Client Designation</label>
                                                                <input type="text" id="designation" class="form-control"
                                                                    value="{{ old('designation') }}"
                                                                    placeholder="Enter Client Designation"
                                                                    name="designation">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="feedback">Client Feedback</label>
                                                                <textarea type="text" id="feedback" class="form-control" name="feedback" rows="5" cols="20"
                                                                    value="{{ old('feedback') }}">Enter Client Feedback</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary mr-1 mb-1">Submit</button>
                                                            <a
                                                                href="{{ route('testimonial.index') }}"class="btn btn-primary mr-1 mb-1">Back</a>
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
