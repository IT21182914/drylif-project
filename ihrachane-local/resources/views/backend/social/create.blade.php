@extends('layouts.backend')
@section('Title', 'Social List')
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
                                        <h4 class="card-title">Create New Social Media</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form" action="{{ route('social.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="name">Social Media Name</label>
                                                                <input type="text" id="name" class="form-control"
                                                                    value="{{ old('name') }}"
                                                                    placeholder="Enter Social Name" name="name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="icon">Social Media Icon</label>
                                                                <input type="text" id="icon" class="form-control"
                                                                    value="{{ old('icon') }}"
                                                                    placeholder="Enter Social Icon" name="icon">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="link">Social Media Link</label>
                                                                <input type="text" id="link" class="form-control"
                                                                    value="{{ old('link') }}"
                                                                    placeholder="Enter Social Link" name="link">
                                                            </div>
                                                        </div>

                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary mr-1 mb-1">Submit</button>
                                                            <a
                                                                href="{{ route('social.index') }}"class="btn btn-primary mr-1 mb-1">Back</a>
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

@endsection
