<?php

namespace Azuriom\Plugin\Zchangelog\Models;

use Azuriom\Models\Traits\HasTablePrefix;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static Update create(array $values)
 */
class Update extends Model
{
    use HasFactory;
    use HasTablePrefix;

    /**
     * The table prefix associated with the model.
     *
     * @var string
     */
    protected $prefix = 'zchangelog_';

    protected $fillable = ['change_log_id', 'order', 'level', 'description', 'created_at', 'updated_at'];
}
