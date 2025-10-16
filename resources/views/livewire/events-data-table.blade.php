<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    All Breach Events {{ $totalRecords > 0 ? '(' . $records->count() . ')' : '' }}
                </h4>
            </div>
            <div class="card-body">
                <div class="card-sub">
                    Data Overview
                </div>
                <div class="table-responsive table-bordered">
                    <table class="display table">
                        <thead>
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" />
                                    </div>
                                </th>
                                <th>Identity</th>
                                <th>Source</th>
                                <th>Date</th>
                                <th>Severity</th>
                                <th>Status</th>
                                <th class="text-nowrap">Data Types</th>
                                <th>Endpoint</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" />
                                        </div>
                                    </td>
                                    <td>{{ $record->identity->name }}</td>
                                    <td>{{ $record->source->name }}</td>
                                    <td class="text-nowrap">{{ $record->reported_on }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <i
                                                class="fas fa-circle {{ \App\Models\BreachEvent::SEVERITY_LABELS[$record->severity]['class'] }}"></i>
                                            <span
                                                class="{{ \App\Models\BreachEvent::SEVERITY_LABELS[$record->severity]['class'] }} fw-medium">{{ \App\Models\BreachEvent::SEVERITY_LABELS[$record->severity]['label'] }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <button
                                            class="btn btn-sm {{ \App\Models\BreachEvent::STATUS_LABELS[$record->status]['class'] }}">{{ \App\Models\BreachEvent::STATUS_LABELS[$record->status]['label'] }}</button>
                                    </td>
                                    <td>
                                        @foreach ($record->leakedDataTypes as $dataType)
                                            <i
                                                class="text-muted {{ App\Models\LeakedDataType::DataTypeIcons[$dataType->type] }}"></i>
                                        @endforeach
                                    </td>
                                    <td>{{ $record->endpoint }}</td>
                                    <td><button class="btn btn-black btn-border">Details</button></td>
                                </tr>
                            @endforeach
                            {{ $records->links('pagination::bootstrap-5') }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
