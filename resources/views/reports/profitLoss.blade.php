@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Laporan Profit/Loss - Tahun {{ $year }}</h2>
        <a href="{{ route('reports.export-excel', ['year' => $year]) }}" class="btn btn-success">
            Export Excel {{ $year }}
        </a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Category</th>
            @for($i = 1; $i <= 12; $i++)
            <th>{{ date('F', mktime(0,0,0,$i,1)) }}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @foreach($formattedData as $category => $monthsData)
        <tr>
            <td><strong>{{ $category }}</strong></td>
            @for($i = 1; $i <= 12; $i++)
            <td>
                @if(isset($monthsData[$i]))
                    @if($monthsData[$i]['income'] > 0)
                        <div class="text-success">+{{ number_format($monthsData[$i]['income']) }}</div>
                    @endif
                    @if($monthsData[$i]['expense'] > 0)
                        <div class="text-danger">-{{ number_format($monthsData[$i]['expense']) }}</div>
                    @endif
                @else
                    -
                @endif
            </td>
            @endfor
        </tr>
        @endforeach
    </tbody>
</table>
@endsection