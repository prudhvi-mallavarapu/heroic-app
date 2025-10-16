<?php

namespace App\Models;

use Database\Factories\BreachEventsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreachEvent extends Model
{
    use HasFactory;

    protected $table = 'breach_events';

    protected $fillable = ['identity_id', 'source', 'reported_on', 'severity', 'status', 'endpoint', 'details'];

    // Severity constants
    public const SEVERITY_LOW      = 'L';
    public const SEVERITY_MEDIUM   = 'M';
    public const SEVERITY_HIGH     = 'H';
    public const SEVERITY_CRITICAL = 'C';

    // Status constants
    public const STATUS_RESOLVED   = 'R';
    public const STATUS_UNRESOLVED = 'U';

    // Optional: map for labels & classes
    public const SEVERITY_LABELS = [
        self::SEVERITY_LOW      => ['label' => 'Low', 'class' => 'text-muted'],
        self::SEVERITY_MEDIUM   => ['label' => 'Medium', 'class' => 'text-warning'],
        self::SEVERITY_HIGH     => ['label' => 'High', 'class' => 'text-danger'],
        self::SEVERITY_CRITICAL => ['label' => 'Critical', 'class' => 'text-danger'],
    ];

    public const STATUS_LABELS = [
        self::STATUS_RESOLVED   => ['label' => 'Resolved', 'class' => 'bg-light border-0 disabled'],
        self::STATUS_UNRESOLVED => ['label' => 'Unresolved', 'class' => 'btn-danger btn-border'],
    ];

    public function leakedDataTypes()
    {
        return $this->belongsToMany(
            LeakedDataType::class,
            'breach_event_leaked_data_type',
            'breach_event_id',
            'leaked_data_type_id'
        )->withTimestamps();
    }

    public function identity()
    {
        return $this->belongsTo(Identity::class);
    }

    /**
     * Override the factory method to use a custom factory class
     */
    protected static function newFactory()
    {
        return BreachEventsFactory::new();
    }
}
