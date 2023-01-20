<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item;


class Order extends Model
{

    /**
    * ORDER ATTRIBUTES
    * $this->attributes['id'] - int - contains the order primary key (id)
    * $this->attributes['total'] - string - contains the order name
    * $this->attributes['user_id'] - int - contains the referenced user id
    * $this->attributes['created_at'] - timestamp - contains the order creation date
    * $this->attributes['updated_at'] - timestamp - contains the order update date
    * $this->user - User - contains the associated User
    * $this->items - Item[] - contains the associated items
    */


    public static function validate($request){
        $request->validate([
            "total" => "required|numeric",
            "user_id" => "required|exists:users,id",
        ]);
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getId()
    {
       return $this->attributes['id'];
    }

    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setUserId($userId)
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }

    public function getUpdateAt()
    {
        return $this->attributes['updated_at'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function setItems($item)
    {
        $this->items = $item;
    }

    public function getItems()
    {
        return $this->items;
    }

}
