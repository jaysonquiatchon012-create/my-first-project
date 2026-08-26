<?php

namespace App\Http\Controllers;

class StudentController extends Controller
{
    public function index(): string
    {
        return 'Student list from StudentController';
    }

    public function show(string $id): string
    {
        return "Student {$id} from StudentController";
    }
}