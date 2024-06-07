@extends('layouts.master')

@section('title')
    Danh sách người dùng
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h3 class="m-0">Data table</h3>
                        </div>
                    </div>
                </div>
                @if (!empty($_SESSION['success']) && isset($_GET['msg']))
                    <div class="alert alert-success">
                        {{ $_SESSION['success'] }}
                    </div>
                    @php
                        unset($_SESSION['success']);
                    @endphp
                @endif
                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Table</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="serach_field_2">
                                    <div class="search_inner">
                                        <form Active="#">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search content here...">
                                            </div>
                                            <button type="submit"> <i class="ti-search"></i> </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="add_button ms-2">
                                    <a href="{{ url('admin/users/create') }}" data-bs-toggle="modal"
                                        data-bs-target="#addcategory" class="btn_1">Thêm người dùng</a>
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">

                            <table class="table lms_table_active ">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">name</th>
                                        <th scope="col">iamge</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">created at</th>
                                        <th scope="col">updated at</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row"> <a href="#"
                                                    class="question_content"><?= $user['id'] ?></a></th>
                                            <td>
                                                <img src="{{ asset($user['avatar']) }}" width="100px">
                                            </td>
                                            <td><?= $user['name'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['created_at'] ?></td>
                                            <td><?= $user['updated_at'] ?></td>
                                            <td>

                                                <a href="{{ url('admin/users/' . $user['id'] . '/show') }}"
                                                    class="btn btn-info">Show</a>
                                                <a href="{{ url('admin/users/' . $user['id'] . '/edit') }}"
                                                    class="btn btn-warning">Sửa</a>
                                                <a href="{{ url('admin/users/' . $user['id'] . '/delete') }}"
                                                    onclick="return confirm('bạn có chắc chắn muốn xoá không?')"
                                                    class="btn btn-danger">Xoá</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
        </div>
    </div>
    
@endsection
