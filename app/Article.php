<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    /**
     * Fillable fields for an Article.
     *
     * @var array
     */
	protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id'       // Temporary
    ];

    /**
     * Additional fields to treat as Carbon instances.
     *
     * @var array
     */
    protected $date = ['published_at'];

    /**
     * Scope queries to articles that have been published.
     *
     * @param $query
     */
    public function scopePublished($query){
        $query->where('published_at', '<=', 'Carbon::now()');
    }

    /**
     * Scope queries to articles that have been published.
     *
     * @param $query
     */
    public function scopeUnpublished($query){
        $query->where('published_at', '>', 'Carbon::now()');
    }

    /**
     * Set the published_at attribute.
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    /**
     * An article is owned by user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }
}