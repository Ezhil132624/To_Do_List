<?php
/**
 * @property CI_Todo_model $Todo_model
 * @property CI_Cache $cache
 * @property CI_Input $input  
 ***/

class Todo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Todo_model');
        $this->load->driver('cache', ['adapter' => 'redis', 'backup' => 'file']);
    }

    public function index()
    {
        $todos = $this->cache->redis->get('todo_list');

        if (!$todos) {
            $todos = $this->Todo_model->get_all();
            $this->cache->redis->save('todo_list', $todos, 60); // cache for 5 minutes
        }

        $this->load->view('todos/index', ['todos' => $todos]);
    }

    public function add()
    {
        if ($_POST) {
            $this->Todo_model->insert(['title' => $this->input->post('title')]);
            $this->cache->redis->delete('todo_list');
            redirect('todo');
        }

        $this->load->view('todos/add');
    }

    public function edit($id)
    {
        if ($_POST) {
            $this->Todo_model->update($id, ['title' => $this->input->post('title')]);
            $this->cache->redis->delete('todo_list');
            redirect('todo');
        }

        $data['todo'] = $this->Todo_model->get($id);
        $this->load->view('todos/edit', $data);
    }

    public function delete($id)
    {
        $this->Todo_model->delete($id);
        $this->cache->redis->delete('todo_list');
        redirect('todo');
    }
}
