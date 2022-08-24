<?php

namespace App\Actions\Category;

trait CategoryValidationRule
{
    private function categoryRulesForCreate(string $prefix = null): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|alpha_dash|unique:categories,slug',
            'description' => 'nullable|string|max:1024'
        ];

        return (!is_null($prefix)) ? array_prefix($prefix, $rules) : $rules;
    }

    private function categoryRulesForUpdate(int $categoryId, string $prefix = null): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|alpha_dash|unique:categories,slug,' . $categoryId,
            'description' => 'nullable|string|max:1024'
        ];

        return (!is_null($prefix)) ? array_prefix($prefix, $rules) : $rules;
    }
}
