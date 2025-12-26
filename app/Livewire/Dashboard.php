<?php


namespace App\Livewire;


use Livewire\Component;


class Dashboard extends Component
{
    public $tasks = [];
    public $title = '';


    public function addTask()
    {
        if (trim($this->title) === '') return;


        $this->tasks[] = [
            'id' => uniqid(),
            'title' => $this->title,
            'completed' => false,
        ];


        $this->title = '';
    }


    public function toggleTask($id)
    {
        foreach ($this->tasks as &$task) {
            if ($task['id'] === $id) {
                $task['completed'] = !$task['completed'];
                break;
            }
        }
    }


    public function removeTask($id)
    {
        $this->tasks = array_filter(
            $this->tasks,
            fn($task) => $task['id'] !== $id
        );
    }


    public function render()
    {
        return view('livewire.dashboard');
    }
}
