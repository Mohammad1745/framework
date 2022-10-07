<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Framework\Http\Request;

class TaskController {
    /**
     * @return bool|string
     */
    public function index (): bool|string
    {

        $data['tasks'] = Task::all();
        return view('tasks.index', $data);
    }

    /**
     * @return bool|string
     */
    public function create (): bool|string
    {
        return view('tasks.create');
    }

    /**
     * @return string|null
     */
    public function store (): ?string
    {
        $request = new Request();
        Task::create([
            'title' => $request->only('title'),
            'description' => $request->only('description')
        ]);
        header('Location: /tasks');
        return '';
    }
}