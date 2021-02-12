<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\User;
use App\Models\Item;

class UserItem extends Model
{
    protected $table = 'user_items';
    protected $primaryKey = 'id';

    protected $fillable = [
        'amount',
        'user_id',
        'item_id',
        'price',
        'tax',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected static $session_key = 'user_items';

    static public function sessionValues(Request $request)
    {
        $values = [];
        if ($request->session()->has(self::$session_key))
        {
            $values = $request->session()->get(self::$session_key);
        }
        return $values;
    }

    static public function sessionValue(Request $request)
    {
        $values = UserItem::sessionValues($request);
        if (isset($values[$request->id]))
        {
            return $values[$request->id];
        }
    }

    static public function saveSession(Request $request, UserItem $user_item)
    {
        $values = UserItem::sessionValues($request);
        $values[$user_item->item_id] = $user_item;
        $request->session()->put(self::$session_key, $values);
    }

    static public function updateCart(Request $request, User $user, Item $item, $amount)
    {
        $user_item = UserItem::sessionValue($request);
        if (!$user_item) $user_item = new UserItem();
        $user_item->user_id = $user->id;
        $user_item->item_id = $item->id;
        $user_item->price = $item->price;
        $user_item->amount = $amount;

        UserItem::saveSession($request, $user_item);
    }

    static public function addCart(Request $request, User $user, Item $item)
    {
        $user_item = UserItem::sessionValue($request);
        $amount = (isset($user_item->amount)) ? $user_item->amount + 1 : 1;
        UserItem::updateCart($request, $user, $item, $amount);
    }

}