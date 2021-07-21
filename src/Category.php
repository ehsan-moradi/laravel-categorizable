<?php

declare(strict_types=1);

namespace EhsanMoradi\LaravelCategorizable;

use Spatie\Sluggable\HasSlug;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends Model
{
    use NodeTrait, HasSlug;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @return array
     */
    public static function tree(): array
    {
        return static::get()->toTree()->toArray();
    }

    /**
     * @return static
     */
    public static function findByName(string $name): self
    {
        return static::where('name', $name)->orWhere('slug', $name)->firstOrFail();
    }

    /**
     * @return static
     */
    public static function findById(int $id): self
    {
        return static::findOrFail($id);
    }

    /**
     * @return mixed
     */
    public function categories(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return collection
     */
    public function entries(string $class): MorphToMany
    {
        return $this->morphedByMany($class, 'model', 'categories_models');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
		    ->generateSlugsFrom(config('laravel-categorizable.generate_slugs_from'))
            ->saveSlugsTo(config('laravel-categorizable.save_slugs_to'))
            ;

    }
}
