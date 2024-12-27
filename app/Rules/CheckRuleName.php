<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class CheckRuleName implements ValidationRule
{
    protected ?int $id;
    protected $table;
    protected $isDeleted;

    public function __construct(?int $id = null, $table, $isDeleted = true)
    {
        $this->id = $id;
        $this->table = $table;
        $this->isDeleted = $isDeleted;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $id = $this->id;
        $table = $this->table;
        $isDeleted = $this->isDeleted;

        if($isDeleted) {
            $query = DB::table($table)->where('name', $value)->whereNull('deleted_at');
        } else {
            $query = DB::table($table)->where('name', $value);
        }

        if ($id !== null && is_int($id) && $id > 0) {
            $query->where('id', '!=', $id);
        }

        $exists = $query->exists();

        if ($exists) {
            $fail(__('validation.unique', ['attribute' => __('language.admin.name')]));
        }
    }
}
