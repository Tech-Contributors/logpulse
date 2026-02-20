@extends('log-pulse::layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Audit Logs</h1>

    <form method="GET" action="{{ route('audit-logs.index') }}" class="mb-4">
        <input type="hidden" name="page" value="{{ request('page', 1) }}">

        <div class="input-group">
            <select name="order" class="form-select" onchange="this.form.submit()">
                <option value="desc" {{ request('order', 'desc' )=='desc' ? 'selected' : '' }}>
                    Newest First
                </option>
                <option value="asc" {{ request('order')=='asc' ? 'selected' : '' }}>
                    Oldest First
                </option>
            </select>
        </div>
    </form>


    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Date</th>
                <th>Action</th>
                <th>Resource</th>
                <th>User</th>
                <th>Meta</th>
            </tr>
        </thead>
        <tbody>
            @php
            $start = (($pagination['current_page'] - 1) * $pagination['per_page']);
            @endphp
            @forelse ($logs as $index => $log)
            <tr>
                <td>{{ $start + $index + 1 }}</td>
                <td>{{ date('Y-m-d H:i:s', strtotime($log['created_at'])) ?? '-' }}</td>
                <td>{{ $log['action'] }}</td>
                <td>{{ $log['resource'] }}</td>
                <td>{{ $log['app_user_id'] ?? '-' }}</td>
                <td>
                    <pre class="mb-0">{{ json_encode($log['meta'] ?? [], JSON_PRETTY_PRINT) }}</pre>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No logs found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    @if (!empty($pagination))
    <div class="d-flex justify-content-between mt-4">
        <div>
            Page {{ $pagination['current_page'] }}
            of {{ $pagination['last_page'] }}
        </div>

        <div>
            @php
            $query = request()->query();
            @endphp

            @if ($pagination['prev_page_url'])
            <a href="{{ url('/audit-logs?' . http_build_query(array_merge($query, [
        'page' => $pagination['current_page'] - 1
    ]))) }}" class="btn btn-sm btn-outline-secondary">
                ← Previous
            </a>
            @endif

            @if ($pagination['next_page_url'])
            <a href="{{ url('/audit-logs?' . http_build_query(array_merge($query, [
        'page' => $pagination['current_page'] + 1
    ]))) }}" class="btn btn-sm btn-outline-secondary">
                Next →
            </a>
            @endif

        </div>
    </div>
    @endif
</div>
@endsection