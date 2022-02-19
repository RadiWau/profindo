<?php

namespace App;
use Illuminate\Foundation\Auth\User as Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @property int $user_id
 * @property string $user_code
 * @property string $user_name
 * @property string $password
 * @property string $identity_number
 * @property string $full_name
 * @property string $pangkat
 * @property string $email
 * @property string $phone_number
 * @property string $address
 * @property string $sign1
 * @property string $sign2
 * @property string $sign3
 * @property int $sign_active
 * @property string $verified_at
 * @property string $remember_token
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $deleted_at
 * @property integer $deleted_by
 * @property TKeyUser[] $tKeyUsers
 * @property TRoleUser $tRoleUser
 * @property TUserJob[] $tUserJobs
 */
class User extends Authenticatable
{
    use HasApiTokens, HasApiTokens, Notifiable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 't_user';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * @var array
     */
    protected $fillable = ['user_code', 'user_name', 'password', 'identity_number', 'full_name', 'pangkat', 'email', 'phone_number', 'address', 'sign1', 'sign2', 'sign3', 'sign_active', 'verified_at', 'remember_token', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tKeyUsers()
    {
        return $this->hasMany('App\TKeyUser', 'user_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tRoleUser()
    {
        return $this->hasOne('App\TRoleUser', 'user_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tUserJobs()
    {
        return $this->hasMany('App\TUserJob', 'user_id', 'user_id');
    }

    public static function getRole($id)
    {
        $role = RoleUser::where('user_id', $id)->first()->role_id;
        return $role;
    }
}
