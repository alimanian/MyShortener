<?php

namespace App\Actions\Category;

use App\Models\Category as CategoryModel;

class DeleteCategory
{
    public static function delete(int $categoryId): bool
    {
        return CategoryModel::find($categoryId)->delete();
    }
}
