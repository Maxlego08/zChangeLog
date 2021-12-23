<?php

namespace Azuriom\Plugin\Zchangelog\Models;

use Azuriom\Models\Traits\HasTablePrefix;
use Azuriom\Plugin\Changelog\Models\Update;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static ChangeLog create(array $values)
 */
class ChangeLog extends Model
{
    use HasFactory;
    use HasTablePrefix;

    /**
     * The table prefix associated with the model.
     *
     * @var string
     */
    protected $prefix = 'zchangelog_';

    protected $fillable = ['id', 'name', 'author', 'description', 'created_at', 'updated_at'];

    /**
     * Display updates
     *
     * @return HasMany
     */
    public function updates(): HasMany
    {
        return $this->hasMany(Update::class, 'change_log_id');
    }

}
