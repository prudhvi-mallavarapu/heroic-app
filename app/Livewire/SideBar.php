<?php

namespace App\Livewire;

use Livewire\Component;

class SideBar extends Component
{
    public function render()
    {
        $menuData = [
            ['title' => 'Dashboard', 'iconClass' => 'fas fa-th-large', 'link' => '#', 'count' => 0, 'hasSubmenu' => false],
            ['title' => 'Monitored Identities', 'iconClass' => 'far fa-id-card', 'link' => '#', 'count' => 2, 'badgeClass' => 'badge-warning', 'hasSubmenu' => false],
            ['title' => 'Breach Monitoring', 'iconClass' => 'fas fa-exclamation-triangle', 'link' => '#', 'count' => 58, 'badgeClass' => 'badge-danger', 'hasSubmenu' => false],
            ['title' => 'Discover Breaches', 'iconClass' => 'fas fa-search', 'link' => '#', 'count' => 0, 'hasSubmenu' => false],
            ['title' => 'Deep Scan', 'iconClass' => 'fas fa-users', 'link' => '#', 'count' => 0, 'hasSubmenu' => false],
            ['title' => 'Investigations', 'iconClass' => 'fas fa-file-invoice', 'link' => '#', 'count' => 12, 'badgeClass' => 'badge-primary', 'hasSubmenu' => false],
            ['title' => 'Users & Roles', 'iconClass' => 'fas fa-users', 'link' => '#', 'count' => 0, 'hasSubmenu' => false],
            ['title' => 'Breach Catalog', 'iconClass' => 'fas fa-th-list', 'link' => '#', 'count' => 0, 'hasSubmenu' => false],
            ['title' => 'Api Management', 'iconClass' => 'fas fa-key', 'link' => '#', 'count' => 0, 'hasSubmenu' => false],
            [
                'title' => 'Tools',
                'iconClass' => 'fas fa-wrench',
                'link' => '#',
                'count' => 0,
                'hasSubmenu' => true,
                'submenu' => [
                    [
                        'title' => 'Tool 1',
                        'iconClass' => '',
                        'link' => '#',
                        'count' => 0,
                    ],
                    [
                        'title' => 'Tool 2',
                        'iconClass' => '',
                        'link' => '#',
                        'count' => 0,
                    ]
                ]
            ],
            ['title' => 'Org Settings', 'iconClass' => 'fas fa-cog', 'link' => '#', 'count' => 0, 'hasSubmenu' => false]
        ];
        return view('livewire.side-bar')->with(['menuData' => $menuData]);
    }
}
