@extends('layout')

@section('title', 'Centers Page')

@section('content')
    @if (count($centers) > 0)
    <h1>All Centers</h1><br><br>
    <table><tr>
    @for ($i = 0; $i < count($centers); $i++)
        <td><article>
            <h1>Center Number: {{ $i+1 }}</h1>
            <p>
                <p>
                    City: {{ $centers[$i]->city }}
                </p>
                <p>
                    Region: {{  $centers[$i]->region }}
                </p>
                <p>
                    Street: {{  $centers[$i]->street }}
                </p>
                <p>
                    Mobile Number: {{  $centers[$i]->mobileNum }}
                </p>
                <p>
                    Telephone: {{  $centers[$i]->telephone }}
                </p>
                <table><tr>
                    <td><button onclick="location.href='{{ route('center.edit', $centers[$i]->id) }}'">Edit</button></td>

                    <td><form action={{ route('center.destroy', $centers[$i]->id) }} method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete">
                    </form></td>
                </tr></table>
            </p>
        </article></td>
        @endfor
        </tr></table>
    @else
        <h1>There is no centers yet</h1>
    @endif
    <br><br><br><br>
    <p>
	    <a href={{ route('center.create') }}> Add a new Center</a>
    </p>
@endsection
