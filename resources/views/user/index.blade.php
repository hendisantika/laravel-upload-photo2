@extends('layouts.app')

@push('style')
    <style type="text/css">
        .my-active span {
            background-color: #5cb85c !important;
            color: white !important;
            border-color: #5cb85c !important;
        }

        ul.pager > li {
            display: inline-flex;
            padding: 5px;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-2 mb-2" style="font-weight: 700">User CRUD Tutorial With Image / File Upload</div>
                <div class="card">
                    <div class="card-header" style="background: gray; color:#f1f7fa; font-weight:bold;">
                        User List
                        <a href="{{ route('user.create') }}" class="btn btn-success btn-xs py-0 float-end">+ Create
                            New</a>
                    </div>
                    @if(session('message'))
                        <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
                            <strong>{{ session('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table-responsive" style="width: 100%">
                            <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Profile Pic</th>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->image)
                                            <img src="{{ asset('storage/images/'.$user->image) }}"
                                                 style="height: 50px;width:100px;">
                                        @else
                                            <span>No image found!</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <center class="mt-5">
                            {{  $users->links() }}
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
