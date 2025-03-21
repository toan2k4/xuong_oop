@extends('layouts.master')

@section('title')
    Cập nhật người dùng: {{ $user['name'] }}
@endsection

@section('content')
    @if (!empty($_SESSION['errors']) && isset($_GET['msg']))
        <div class="alert alert-warning">
            <ul>
                @foreach ($_SESSION['errors'] as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @php
                unset($_SESSION['errors']);
            @endphp
        </div>
    @endif

    @if (!empty($_SESSION['success']) && isset($_GET['msg']))
        <div class="alert alert-success">
            {{ $_SESSION['success'] }}
        </div>
        @php
            unset($_SESSION['success']);
        @endphp
    @endif
    <form action="{{ url("admin/users/{$user['id']}/update") }}" enctype="multipart/form-data" method="POST">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $user['name'] }}"
                name="name">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" value="{{ $user['email'] }}"
                name="email">
        </div>
        <div class="mb-3 mt-3">
            <label for="avatar" class="form-label">Avatar:</label>
            <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="avatar">
            <img src="{{ asset($user['avatar']) }}" width="100px">
        </div>
        <div class="mb-3 mt-3">
            <label for="password" class="form-label">Password:</label>
            <input type="text" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
