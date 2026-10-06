<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusBadge extends Component
{
    public $status;

    public $label;

    public $class;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $status
     * @return void
     */
    public function __construct($status = null)
    {
        $this->status = $status;

        $normalized = strtolower((string) ($status ?? ''));

        if (in_array($normalized, ['yes', 'aktif', 'active', '1', 'true'])) {
            $this->label = 'Aktif';
            $this->class = 'bg-green-100 text-green-800';
        } elseif (in_array($normalized, ['no', 'tidak aktif', 'inactive', '0', 'false'])) {
            $this->label = 'Tidak Aktif';
            $this->class = 'bg-red-100 text-red-800';
        } else {
            $this->label = $status ? (string) $status : 'Tidak Diketahui';
            $this->class = 'bg-slate-100 text-slate-800';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.status-badge');
    }
}
