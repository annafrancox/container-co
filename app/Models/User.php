<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'dateBirth',
        'password',
        'profile_path',
        'admin',
        'cpf',
        'phone',
        'identity',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function saveImg($data, $name, $diretorio, $imgAntiga = '')
    {
        if (isset($data[$name]) && is_file($data[$name])) {
            $imgName = $data[$name]->getClientOriginalName();
            $imgName = hash('sha256', $imgName . strval(time())) . '.' . $data[$name]->getClientOriginalExtension();
            User::deleteImg($imgAntiga, $diretorio);
            $data[$name]->storeAs($diretorio, $imgName);
            $data[$name] = "storage/img/profile/" . $imgName;
        } else {
            unset($data[$name]);
        }

        return $data;
    }
    
    public static function deleteImg($imgName, $diretorio)
    {
        if ($imgName != '' && $imgName != static::getDefaultImgPath() && file_exists(storage_path(str_replace('storage', 'app/public', $imgName)))) {
            unlink(storage_path(str_replace('storage', 'app/public', $imgName)));
        }
    }

    public static function verifyUpdatePassword($data)
    {
        if ($data['password']) {
            $data['password'] = \bcrypt($data['password']);
            unset($data['password_confirmation']);
        } else {
            unset($data['password'], $data['password_confirmation']);
        }
        return $data;
    }

    public function setDefaultImg()
    {
        $this->profile_path = static::getDefaultImgPath();
        $this->save;
    }

    public static function getDefaultImgPath()
    {
        return 'storage/img/profile/profile_default.png';
    }
}
