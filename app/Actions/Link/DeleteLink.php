<?php

namespace App\Actions\Link;

use App\Models\Link as LinkModel;

class DeleteLink
{
    public static function delete(int $linkId): bool
    {
        return LinkModel::find($linkId)->delete();
    }
}
