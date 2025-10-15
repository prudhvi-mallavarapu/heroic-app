<?php

namespace App\Livewire;

use Livewire\Component;

class SideBar extends Component
{
    public function render()
    {
        $menuData = [
            ['title' => 'Dashboard', 'iconClass' => '', 'link' => '#', 'count' => 0, 'hasSubmenu' => false],
            ['title' => 'Monitored Identities', 'iconClass' => '', 'link' => '#', 'count' => 2, 'badgeClass' => 'badge-warning', 'hasSubmenu' => false],
            ['title' => 'Breached Monitoring', 'iconClass' => '', 'link' => '#', 'count' => 58, 'badgeClass' => 'badge-danger', 'hasSubmenu' => false],
            ['title' => 'Discover Breaches', 'iconClass' => '', 'link' => '#', 'count' => 0, 'hasSubmenu' => false],
            ['title' => 'Deep Scan', 'iconClass' => '', 'link' => '#', 'count' => 0, 'hasSubmenu' => false],
            ['title' => 'Investigations', 'iconClass' => '', 'link' => '#', 'count' => 12, 'badgeClass' => 'badge-primary', 'hasSubmenu' => false],
            ['title' => 'Users & Roles', 'iconClass' => '', 'link' => '#', 'count' => 0, 'hasSubmenu' => false],
            ['title' => 'Breach Catalog', 'iconClass' => '', 'link' => '#', 'count' => 0, 'hasSubmenu' => false],
            ['title' => 'Api Management', 'iconClass' => '', 'link' => '#', 'count' => 0, 'hasSubmenu' => false],
            [
                'title' => 'Tools',
                'iconClass' => '',
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
            ['title' => 'Org Settings', 'iconClass' => '', 'link' => '#', 'count' => 0, 'hasSubmenu' => false]
        ];
        return view('livewire.side-bar')->with(['menuData' => $menuData]);
    }
}
