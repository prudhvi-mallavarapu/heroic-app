<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    All Breach Events {{ $totalRecords > 0 ? '(' . $totalRecords . ')' : '' }}
                </h4>
            </div>
            <div class="card-body">
                <div class="my-2 d-flex justify-content-end align-items-center">
                    <div class="form-group w-50">
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="search" class="form-control"
                                placeholder="Search Identities, Sources or breach details"
                                wire:model.live.debounce.250ms="search">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn bg-light"> <i class="fas fa-filter"></i> Filters</button>
                    </div>
                    <div class="form-group">
                        <button class="btn bg-light"> <i class="fas fa-download"></i> Export</button>
                    </div>
                </div>
                <div class="card-sub">
                    Data Overview
                </div>
                <div class="table-responsive table-bordered">
                    <table class="display table">
                        <thead>
                            <tr>
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
                                <tr wire:key="record-{{ $record->id }}">
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
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{ $records->links(data: ['scrollTo' => false]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
