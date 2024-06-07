<?php

namespace Toannguyen\OopPhp3\Controllers\Admin;

use Rakit\Validation\Validator;
use Toannguyen\OopPhp3\Commons\Controller;
use Toannguyen\OopPhp3\Commons\Helper;
use Toannguyen\OopPhp3\Models\User;

class UserController extends Controller
{

    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }
    public function index()
    {

        [$users, $totalPage] = $this->user->paginate($_GET['page'] ?? 1);

        $this->renderViewAdmin('users.index', compact('users', 'totalPage'));

    }

    public function create()
    {
        return $this->renderViewAdmin('users.create');
    }

    public function store()
    {
        $validator = new Validator;

        // make it
        $validation = $validator->make($_POST + $_FILES, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'avatar' => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);

        $validation->validate();

        if ($validation->fails()) {

            $errors = $validation->errors()->firstOfAll();

            flash('errors', $errors, 'admin/users/create');
        } else {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];

            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
                $from = $_FILES['avatar']['tmp_name'];
                $to = 'assets/uploads' . time() . $_FILES['avatar']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['avatar'] = $to;
                } else {
                    flash('errors', 'Upload không thành công', 'admin/users/create');
                }

                $this->user->insert($data);
                flash('success', 'Thêm mới thành công', 'admin/users');
            }
        }

    }
    public function show($id)
    {
        $user = $this->user->findByID($id);

        $this->renderViewAdmin('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->user->findByID($id);
        $this->renderViewAdmin('users.edit', compact('user'));

    }

    public function update($id)
    {
        $user = $this->user->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'min:6',
            'avatar' => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);

        $validation->validate();

        if ($validation->fails()) {

            $errors = $validation->errors()->firstOfAll();

            flash('errors', $errors, 'admin/users/' . $id . '/edit');
        } else {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'],
            ];

            $flagUpload = false;
            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
                $flagUpload = true;

                $from = $_FILES['avatar']['tmp_name'];
                $to = 'assets/uploads' . time() . $_FILES['avatar']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['avatar'] = $to;
                } else {
                    flash('errors', 'Upload không thành công', 'admin/users/' . $id . '/edit');
                }

                $this->user->update($id, $data);

                if (
                    $user['avatar']
                    && $flagUpload
                    && file_exists(PATH_ROOT . $user['avatar'])
                ) {
                    unlink(PATH_ROOT . $user['avatar']);
                }

                flash('success', 'Cập nhật thành công', 'admin/users/' . $id . '/edit');
            }
        }

    }
    public function delete($id)
    {
        $this->user->delete($id);

        $user = $this->user->findByID($id);

        if (
            $user['avatar']
            && file_exists(PATH_ROOT . $user['avatar'])
        ) {
            unlink(PATH_ROOT . $user['avatar']);
        }
        
        flash('success', 'Xoá thành công', 'admin/users');
    }
}