<?php 

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Http\Request;

interface TodoRepositoryInterface
{
    public function all();
    public function store(array $data);
    public function delete(Todo $todo);
    public function update(array $data, $id);
}