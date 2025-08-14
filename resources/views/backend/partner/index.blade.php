@extends('layouts.backend')
@section('Title', 'Partner List')
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
                <a href="{{ route('partner.create') }}" class="btn btn-primary float-right">Add Partner</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL. No</th>
                                <th>Name</th>
                                <th>logo</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partners as $index => $partner)
                                <tr>
                                    <td class="text-bold-500">{{ $index + 1 }}</td>
                                    <td>{{ $partner->name }}</td>
                                    <td><img src="{{ asset($partner->logo) }}" alt=""></td>
                                    <td>
                                        <form action="{{ route('partner.destroy', $partner->id) }}" method="POST">
                                            <a href="{{ route('partner.edit', $partner->id) }}"><i
                                                    class="badge-circle badge-circle-light-secondary bx bx-edit-alt font-medium-1"></i></a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="border: none; background-color: transparent;"><i
                                                    class="badge-circle badge-circle-light-secondary bx bx-trash-alt font-medium-1"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
