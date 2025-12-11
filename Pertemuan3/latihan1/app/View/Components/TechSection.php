<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Feature;

class TechSection extends Component
{
    /**
     * The features to display in the tech section.
     *
     * @var array
     */
    public $features;

    /**
     * Create a new component instance.
     *
     * @param  array  $features
     * @return void
     */
    public function __construct($features = [])
    {
        if (!empty($features)) {
            $this->features = $features;
            return;
        }

        // Attempt to load features from DB
        try {
            $db = Feature::orderBy('id', 'asc')->get();
            if ($db->count() > 0) {
                $this->features = $db->map(function ($f) {
                    return [
                        'title' => $f->title,
                        'description' => $f->description,
                        'icon' => $f->key,
                    ];
                })->toArray();
            } else {
                $this->features = [
                    [
                        'title' => 'AI & ML',
                        'description' => 'Discover smart systems and models that power modern apps.',
                        'icon' => 'ai',
                    ],
                    [
                        'title' => 'Cloud & DevOps',
                        'description' => 'Scalable cloud architectures and continuous delivery best practices.',
                        'icon' => 'cloud',
                    ],
                    [
                        'title' => 'Security',
                        'description' => 'Secure design patterns and threat-resistant solutions.',
                        'icon' => 'shield',
                    ],
                ];
            }
        } catch (\Throwable $e) {
            $this->features = [
            [
                'title' => 'AI & ML',
                'description' => 'Discover smart systems and models that power modern apps.',
                'icon' => 'ai',
            ],
            [
                'title' => 'Cloud & DevOps',
                'description' => 'Scalable cloud architectures and continuous delivery best practices.',
                'icon' => 'cloud',
            ],
            [
                'title' => 'Security',
                'description' => 'Secure design patterns and threat-resistant solutions.',
                'icon' => 'shield',
            ],
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tech-section');
    }
}
