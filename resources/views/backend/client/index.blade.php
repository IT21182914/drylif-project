@extends('layouts.backend')
@section('Title', 'Client List')
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
                <a href="{{ route('client.create') }}" class="btn btn-primary float-right">Add Client</a>
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
                            @foreach ($clients as $index => $client)
                                <tr>
                                    <td class="text-bold-500">{{ $index + 1 }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td><img src="{{ asset($client->logo) }}" alt=""></td>
                                    <td>
                                        <form action="{{ route('client.destroy', $client->id) }}" method="POST">
                                            <a href="{{ route('client.edit', $client->id) }}"><i
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
