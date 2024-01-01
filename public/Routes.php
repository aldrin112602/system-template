<?php
// GET REQUEST
Route('/', 'get');
Route('home', 'get');
Route('about', 'get');
Route('contact', 'get');
Route('Login', 'get');


// POST REQUEST
Route('Login', 'post', function() {
    return [
        'username' => $_POST['username'],
        'password' => $_POST['password']
    ];
});