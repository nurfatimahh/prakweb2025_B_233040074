<?php
class Home extends Controller {
    public function index() {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('home/index', $data);
    }
}
