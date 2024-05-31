<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
 protected $fillable = ['post_id','user_id'];
    
    
    public function user(){
    
    return $this->belongsTo(User::class);
}
    public function post(){
    
    return $this->belongsTo(Post::class);
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
}
