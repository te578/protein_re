<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'body',
        'product_name',
        'fat',
        'protein',
        'carbohydrates',
        'image_url',
        ];
        
    public function likes(){
    
    return $this->hasMany(Like::class,'post_id');
                        }
    public function is_liked_by_auth_user()
  {
    $id = Auth::id();

    $likers = array();
    foreach($this->likes as $like) {
      array_push($likers, $like->user_id);
    }

    if (in_array($id, $likers)) {
      return true;
    } else {
      return false;
    }
  }
   public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
}

