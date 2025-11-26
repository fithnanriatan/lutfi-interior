<?php

class User extends Controller
{

    public function index()
    {
        $data['title'] = 'Data User - Lutfi Interior';
        $data['users'] = $this->model('User_model')->getAllUsers();

        $this->view('templets/admin_header', $data);
        $this->view('admin/user/index', $data);
        $this->view('templets/admin_footer');
    }

    // Tambah user baru
    public function tambah()
    {
        if ($this->model('User_model')->addUser($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success', 'User');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger', 'User');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    // Update password user
    public function updatePassword($id)
    {
        $user = $this->model('User_model')->getUserById($id);
        var_dump($user); die;

        if (!password_verify($_POST['old_password'], $user['password'])) {
            Flasher::setFlash('gagal', 'diupdate', 'danger', 'Password lama salah');
            header('Location: ' . BASEURL . '/user');
            exit;
        }

        if ($this->model('User_model')->updatePassword($id, $_POST['new_password']) > 0) {
            Flasher::setFlash('berhasil', 'diupdate', 'success', 'Password User');
        } else {
            Flasher::setFlash('gagal', 'diupdate', 'danger', 'Password User');
        }

        header('Location: ' . BASEURL . '/user');
        exit;
    }



    // Hapus user
    public function hapus($id)
    {
        if ($this->model('User_model')->deleteUser($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success', 'User');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger', 'User');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
}
