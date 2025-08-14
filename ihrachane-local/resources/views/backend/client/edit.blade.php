@extends('layouts.backend')
@section('Title', 'Client List')
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
                                        <h4 class="card-title">Update Client</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form" action="{{ route('client.update', $client->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="name">Client Name</label>
                                                                <input type="text" id="name" class="form-control"
                                                                    value="{{ old('name', $client->name) }}"
                                                                    placeholder="Enter Client Name" name="name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="logo">Upload Client Logo <span>(Image
                                                                        Dimention: 300x25)</span></label>
                                                                <img id="imagePreview1" src="{{ asset($client->logo) }}"
                                                                    alt="Image Preview"
                                                                    style="width: 30%; height: 30%; object-fit: cover;"><br>
                                                                <input type="file" name="logo"
                                                                    class="form-control-file mt-2"
                                                                    onchange="previewImage(this, 'imagePreview1')">
                                                            </div>
                                                        </div>


                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary mr-1 mb-1">Submit</button>
                                                            <a
                                                                href="{{ route('client.index') }}"class="btn btn-primary mr-1 mb-1">Back</a>
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
