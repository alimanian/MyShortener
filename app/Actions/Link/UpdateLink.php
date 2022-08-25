<?php

namespace App\Actions\Link;

use App\Models\Link as LinkModel;

class UpdateLink
{
    use LinkValidationRule;

    public function rules(int $linkId, string $prefix = null): array
    {
        return $this->linkRulesForUpdate($prefix);
    }

    public function update(int $linkId, array $params)
    {
        return LinkModel::find($linkId)->update([
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
