<?php

namespace App\Actions\Link;

use App\Models\Link as LinkModel;

class CreateNewLink
{
    use LinkValidationRule;

    public function rules(string $prefix = null): array
    {
        return $this->linkRulesForCreate($prefix);
    }

    public function create(array $params)
    {
        return LinkModel::create([
            'title' => $params['title'] ?? null,
            'description' => $params['description'] ?? null,
            'destination' => $params['destination'],
            'slug' => $params['slug'],
            'category_id' => $params['category_id'],
            'is_active' => $params['is_active'] ?? null,
            'code' => (string) $params['code']
        ]);
    }
}
