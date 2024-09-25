<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'cpf',
        'salario',
        'rg',
        'datebirth',
        'password',
        'role', // Caso você também queira armazenar o papel do usuário (admin, nutricionista, paciente)
    ];

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

    /**
     * Define the relationship with the Address model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function anamnesesAsPatient()
    {
        return $this->hasMany(Anamnese::class, 'patient_id');
    }

    /**
     * Define the relationship with the Anamnese model (as a nutricionista).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function anamnesesAsNutricionist()
    {
        return $this->hasMany(Anamnese::class, 'user_id');
    }

    // No modelo User.php
    public function anamnese()
    {
        return $this->hasOne(Anamnese::class);
    }

}
