<?php namespace Gallery;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property int    $album_id
 * @property bool   $active
 * @property string $slug
 * @property string $file
 * @property string $title
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Album  $album
 * @property Album  $coverFor
 */
class Image extends Model
{
    /**
     * The database table used.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['active', 'slug', 'file', 'title', 'description'];

    /**
     * The defaults for the attributes.
     *
     * @var array
     */
    protected $attributes = [
        'album_id'    => null,
        'active'      => true,
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
        'album_id'    => 'int',
        'active'      => 'bool',
        'slug'        => 'string',
        'file'        => 'string',
        'title'       => 'string',
        'description' => 'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coverFor()
    {
        return $this->hasOne(Album::class, 'cover_id', 'id');
    }

    /**
     * Scope a query to only include active images.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * @return bool
     */
    public function isCover()
    {
        return (bool) $this->coverFor;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return (bool) $this->active;
    }
}
