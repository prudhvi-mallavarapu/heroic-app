<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Breach Events</h4>
            </div>
            <div class="card-body">
                <div class="card-sub">
                    Create responsive tables by wrapping any table with
                    <code class="highlighter-rouge">.table-responsive</code>
                    <code class="highlighter-rouge">DIV</code> to make them
                    scroll horizontally on small devices
                </div>
                <div class="table-responsive table-bordered">
                    <table id="basic-datatables" class="display table table-hover">
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
                                <tr>
                                    <td>{{ $record->identity->name }}</td>
                                    <td>{{ $record->source }}</td>
                                    <td class="text-nowrap">{{ $record->reported_on }}</td>
                                    <td>
                                        {{ \App\Models\BreachEvent::SEVERITY_LABELS[$record->severity]['label'] }}
                                    </td>
                                    <td>
                                        {{ \App\Models\BreachEvent::STATUS_LABELS[$record->status]['label'] }}
                                    </td>
                                    <td>
                                        @foreach ($record->leakedDataTypes as $dataType)
                                            <span class="badge badge-primary">
                                                {{ $dataType->type }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>{{ $record->endpoint }}</td>
                                    <td><button class="btn btn-black">Details</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
