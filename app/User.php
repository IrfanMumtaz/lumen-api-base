<?php

namespace App;

use App\Models\Address;
use App\Models\Contact;
use App\Models\UserAddress;
use App\Models\UserContact;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Laravel\Passport\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use HasApiTokens, Authenticatable, Authorizable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const STATUS = ['pending' => 0, 'active' => 1, 'blocked' => 2];
    const LOGABLE_ROLES = ['admin'];

    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function primaryContact()
    {
        return $this->hasOneThrough(Contact::class, UserContact::class, 'user_id', 'id', 'id', 'contact_id')->where('user_contacts.primary', true);
    }

    public function secondaryContacts()
    {
        return $this->hasManyThrough(Contact::class, UserContact::class, 'user_id', 'id', 'id', 'contact_id')->where('user_contacts.primary', false);
    }

    public function address()
    {
        return $this->hasOneThrough(Address::class, UserAddress::class, 'user_id', 'id', 'id', 'address_id');
    }
}
