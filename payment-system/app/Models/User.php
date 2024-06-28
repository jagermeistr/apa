<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasFactory, Notifiable;
    
    public function hasRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
            return false;
        }

        return $this->role === $roles;
    }
        
    
        const ROLE_ADMIN = 'admin';
        const ROLE_MODERATOR = 'moderator';
        const ROLE_USER = 'user';
    
        protected $fillable = [
            'name',
            'email',
            'password',
            'role',
        ];

        public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isModerator()
    {
        return $this->role === self::ROLE_MODERATOR;
    }

    public function isUser()
    {
        return $this->role === self::ROLE_USER;
    }

    
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
