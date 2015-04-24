<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $fillable = [
        'title',
        'body',
        'published_at'
    ];

    protected $date = ['published_at'];

    // scopeName
    public function scopePublished($query){
        $query->where('published_at', '<=', 'Carbon::now()');
    }

    // scopeName
    public function scopeUnpublished($query){
        $query->where('published_at', '>', 'Carbon::now()');
    }

    // setNameAttribute
    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }
}
