<?php namespace Gallery;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int        $id
 * @property int        $cover_id
 * @property bool       $active
 * @property string     $slug
 * @property string     $title
 * @property string     $description
 * @property Carbon     $created_at
 * @property Carbon     $updated_at
 * @property Collection $images
 * @property Image      $cover
 */
class Album extends Model
{
    /**
     * The database table used.
     *
     * @var string
     */
    protected $table = 'albums';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['active', 'slug', 'title', 'description'];

    /**
     * The defaults for the attributes.
     *
     * @var array
     */
    protected $attributes = [
        'cover_id'    => null,
        'active'      => false,
        'slug'        => null,
        'description' => null,
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'          => 'int',
        'cover_id'    => 'int',
        'active'      => 'bool',
        'slug'        => 'string',
        'title'       => 'string',
        'description' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cover()
    {
        return $this->belongsTo(Image::class, 'cover_id', 'id');
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return (bool) $this->active;
    }
}
