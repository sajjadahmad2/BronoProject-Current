@foreach ($finalOpportunities as $key => $opportunity)
    <div class="modal fade" id="modal_{{ $key }}" tabindex="-1" aria-labelledby="modalLabel_{{ $key }}"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-black">
                    <h5 class="modal-title font-semibold text-white text-lg " id="modalLabel_{{ $key }}">
                        {{ $opportunity['source'] ?? 'Unknown' }}
                        Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Summary Information -->
                    <div class="mb-4 border rounded bg-white p-4 shadow-sm">
                        <div class="fw-bold fs-5 text-primary mb-3">Summary</div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-gray-600">Source:</div>
                            <div class="col-sm-8 text-gray-800 font-semibold ">
                                {{ $opportunity['source'] ?? 'Unknows' }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-gray-600">Total Count:</div>
                            <div class="col-sm-8 text-gray-800 font-semibold ">
                                {{ number_format($opportunity['count']) }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold text-gray-600">Total Value:</div>
                            <div class="col-sm-8 text-gray-800 font-semibold ">€
                                {{ number_format($opportunity['total_value'], 2) }}</div>
                        </div>

                    </div>

                    <!-- Details Table (only if available) -->
                    @if (isset($opportunity['details']) && count($opportunity['details']) > 0)
                        <div class="grid">
                            <div class="tablecard card-grid min-w-full mb-4 border rounded bg-white p-4 shadow-sm">
                                <div class="card-header py-5 flex-wrap">
                                    <h3 class="fw-bold fs-5 text-primary mb-3">Details</h3>
                                </div>
                                <div class="card-body">
                                    <div data-datatable="true" data-datatable-page-size="5"
                                        data-datatable-state-save="true" id="datatable_1">
                                        <div class="overflow-y-auto">
                                            <table class="table-f-display table-auto table-border text-lg w-full"
                                                data-datatable-table="true"
                                                style="display: table-caption; height:550px">
                                                <thead>
                                                    <tr class="bg-light fw-bold">
                                                        <th class="px-4 py-2 border-b">Contact ID</th>
                                                        <th class="px-4 py-2 border-b">Name</th>
                                                        <th class="px-4 py-2 border-b">Email</th>
                                                        <th class="px-4 py-2 border-b"> Opportunities</th>
                                                        <th class="px-4 py-2 border-b">Total Value</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    @foreach ($opportunity['details'] as $detail)
                                                    @php
                                                    // Calculate total monetary value
                                                    $monetaryValues = array_map(function ($opportunity) {
                                                        if($opportunity['status'] == 'won') {
                                                            return $opportunity['monetary_value'] ?? 0;
                                                        }   else{
                                                            return 0;
                                                        }
                                                    }, $detail['opportunities']);
                                                    $totalValue = array_sum($monetaryValues);
                                                @endphp

                                                        @if ($totalValue > 0)
                                                            <tr class="hover:bg-gray-100">
                                                                <td class="px-4 py-2">
                                                                    {{ $detail['ghl_contact_id'] ?? '' }}</td>
                                                                <td class="px-4 py-2">{{ $detail['name'] ?? '' }}</td>
                                                                <td class="px-4 py-2">{{ $detail['email'] ?? '' }}</td>
                                                                <td class="px-4 py-2">
                                                                    {{ count($detail['opportunities'] ?? []) }}</td>
                                                                <td class="px-4 py-2">
                                                                    €{{ number_format($totalValue, 2) }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info text-center" role="alert">
                            No additional details available.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
