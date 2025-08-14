@extends('layouts.backend')
@section('Title', 'Company Profile')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
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
                                        <h4 class="card-title">Update Company</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form" action="{{ route('company.update', $company->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="address">Company Address</label>
                                                                <textarea type="text" id="address" class="form-control" name="address" rows="5" cols="20"
                                                                    value="{{ old('address', $company->address) }}">{{ $company->address }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="phone_number">Phone Number</label>
                                                                <input type="text" id="phone_number" class="form-control"
                                                                    value="{{ old('phone_number', $company->phone_number) }}"
                                                                    name="phone_number">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="email">Company Email</label>
                                                                <input type="text" id="email" class="form-control"
                                                                    value="{{ old('email', $company->email) }}"
                                                                    name="email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="whatsapp_number">Company What's App
                                                                    Number</label>
                                                                <input type="text" id="whatsapp_number"
                                                                    class="form-control"
                                                                    value="{{ old('whatsapp_number', $company->whatsapp_number) }}"
                                                                    name="whatsapp_number">
                                                            </div>
                                                        </div>



                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary mr-1 mb-1">Submit</button>

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
