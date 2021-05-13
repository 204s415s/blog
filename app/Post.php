<?php
//データベースとのやりとりをするよ！
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model {
    use SoftDeletes;
    protected $fillable = [
        'title',
        'body',
    ];
    
    /*
    public function getPaginateByLimit(int $limit_count = 10) {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    */
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function favs() {
        return $this->hasMany(Fav::class);
    }
    
    public function is_faved_by_auth_user() {
        $id = Auth::id();
        $likers = array();
        foreach($this->favs as $fav) {
            array_push($likers, $fav->user_id);
        }
        
        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
