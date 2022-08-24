<?php

namespace App\Actions\Category;

use App\Models\Category as CategoryModel;

class UpdateCategory
{
    use CategoryValidationRule;

    public function rules(int $categoryId, string $prefix = null): array
    {
        return $this->categoryRulesForUpdate($prefix);
    }

    public function update(int $categoryId, array $params)
    {
        return CategoryModel::find($categoryId)->update([
            'title' => $params['title'],
            'slug' => $params['slug'],
            'description' => $params['description'] ?? null,
        ]);
    }
}
