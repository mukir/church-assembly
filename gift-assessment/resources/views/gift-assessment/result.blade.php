@extends('layouts.app')

@section('content')
    <h1>Your Spiritual Gifts Results</h1>
    <table>
        <tr><th>Gift</th><th>Score</th></tr>
        @foreach($scores as $gift => $score)
            <tr>
                <td>{{ $gift }}</td>
                <td>{{ $score }}</td>
            </tr>
        @endforeach
    </table>
@endsection
