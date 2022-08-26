<?php

namespace App\Actions\Link;

trait LinkValidationRule
{
    private function linkRulesForCreate(string $prefix = null): array
    {
        # TODO Validation Check Link Slug not use in web routes
        $rules = [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1024',
            'destination' => 'required|string|max:2048|url',
            'slug' => 'required|string|alpha_dash|unique:links,slug',
            'category_id' => 'nullable|exists:categories,id',
            'is_active' => 'nullable|boolean',
            'code' => 'required|numeric|in:301,302,303,307,308'
        ];

        return (!is_null($prefix)) ? array_prefix($prefix, $rules) : $rules;
    }

    private function linkRulesForUpdate(int $linkId, string $prefix = null): array
    {
        $rules = [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1024',
            'destination' => 'required|string|max:2048|url',
            'slug' => 'required|string|alpha_dash|unique:links,slug,' . $linkId,
            'category_id' => 'nullable|exists:categories,id',
            'is_active' => 'nullable|boolean',
            'code' => 'required|numeric|in:301,302,303,307,308'
        ];

        return (!is_null($prefix)) ? array_prefix($prefix, $rules) : $rules;
    }
}
