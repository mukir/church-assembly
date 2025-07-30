@extends('layouts.app')

@section('content')
    <h1>Spiritual Gifts Assessment</h1>
    <form method="POST" action="{{ route('gifts.submit') }}">
        @csrf
        <table>
            @foreach($questions as $number => $text)
                <tr>
                    <td>{{ $number }}. {{ $text }}</td>
                    <td>
                        <select name="{{ $number }}" required>
                            @for ($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
                </tr>
            @endforeach
        </table>
        <button type="submit">Submit</button>
    </form>
@endsection
