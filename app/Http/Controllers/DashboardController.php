<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->usersCount();

        $projects = $this->projectsCount();

        $clients = $this->clientsCount();

        $tasks = $this->tasksCount();

        return view('admin.dashboard.index', compact('users', 'projects', 'clients', 'tasks'));
    }

    public function usersCount()
    {
        $users = User::count();

        return $users;
    }

    public function projectsCount()
    {
        $projects = Project::count();

        return $projects;
    }

    public function clientsCount()
    {
        $clients = Client::count();

        return $clients;
    }

    public function tasksCount()
    {
        $tasks = Task::count();

        return $tasks;
    }

}
