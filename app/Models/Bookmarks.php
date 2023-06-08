<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmarks extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        $authority = (auth()->check()) ? auth()->user()->authority : 0;

        $query->leftJoin('categories', 'bookmarks.category_id', '=', 'categories.id')
        ->leftJoin('statuses', 'bookmarks.status_id', '=', 'statuses.id')
        ->leftJoin('read_statuses', 'bookmarks.read_status_id', '=', 'read_statuses.id')
        ->where('categories.restriction', '<=', $authority)
            ->orderBy('bookmarks.updated_at', 'DESC');

        if (!empty($filters['search'])) {
            $query->where(function ($subquery) use ($filters) {
                $searchTerm = '%' . $filters['search'] . '%';
                $subquery->where('name', 'like', $searchTerm)
                    ->orWhere('alt_names', 'like', $searchTerm);
            });
        }

        if (!empty($filters['category']) && $filters['category'] !== 'none') {
            $query->where('category_id', $filters['category']);
        }

        if (!empty($filters['status']) && $filters['status'] !== 'none') {
            $query->where('status_id', $filters['status']);
        }

        if (!empty($filters['reading_status']) && $filters['reading_status'] !== 'none') {
            switch ($filters['reading_status']) {
                case 'catched_up':
                    $query->whereColumn('latest', '=', 'current');
                    break;
                case 'reading':
                    $query->where('current', '<', 'latest')
                    ->where('current', '>', 0);
                    break;
                case 'not_started':
                    $query->where('current', 0);
                    break;
            }
        }

        if (!empty($filters['sort']) && $filters['sort'] !== 'none') {
            $order = ($filters['order'] === 'desc') ? 'desc' : 'asc';
            $query->orderBy('bookmarks.' . $filters['sort'], $order);
        }
    }
}
