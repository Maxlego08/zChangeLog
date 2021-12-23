<?php

namespace Azuriom\Plugin\Zchangelog\Models;

use Azuriom\Models\Traits\HasTablePrefix;
use Azuriom\Plugin\Zchangelog\Controllers\Admin\AdminController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $level
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

    public function icon()
    {
        return setting(AdminController::SETTING_PREFIX . $this->level, AdminController::DEFAULT_SETTINGS[$this->level]);
    }

}
