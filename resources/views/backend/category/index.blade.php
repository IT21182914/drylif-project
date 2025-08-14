@extends('layouts.backend')
@section('Title', 'Category List')
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
                <a href="{{ route('category.create') }}" class="btn btn-primary float-right">Add Category</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL. No</th>
                                <th>Name</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $index => $category)
                                <tr>
                                    <td class="text-bold-500">{{ $index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                            <a href="{{ route('category.edit', $category->id) }}"><i
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
