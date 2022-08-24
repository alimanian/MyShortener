<?php

namespace App\Actions\Category;

use App\Models\Category as CategoryModel;

class CreateNewCategory
{
    use CategoryValidationRule;

    public function rules(string $prefix = null): array
    {
        return $this->categoryRulesForCreate($prefix);
    }

    public function create(array $params)
    {
        return CategoryModel::create([
            'title' => $params['title'],
            'slug' => $params['slug'],
            'description' => $params['description'] ?? null,
        ]);
    }
}
