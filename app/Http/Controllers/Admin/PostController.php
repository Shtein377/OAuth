<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){


        return 'Список постов';

    }

    public function create(){
        return 'Создание постов'; 
    }

    public function store(){

        return 'Запрос создание поста';
        
    }

    public function show($id){

        return "Просмотр постов, {$id}";
        
    }

    public function edit($post){

        return "Страница изменения поста {$post}";
        
    }

    public function update(){

        return 'Запрос на изменение поста';
        
    }

    public function delete(){

        return 'Запрос удаления поста'; 
        
    }

    public function like(){
       
        
        return 'Лайк +1';
    }


}
