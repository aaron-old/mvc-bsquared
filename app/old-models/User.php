<?php


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'portfolio_members';
    protected $fillable = ['user_id', 'username', 'email', 'password', 'remember_token', 'role'];
    protected $hidden = ['password', 'remember_token'];
    protected $primaryKey = 'user_id';
}