@extends('layout')

@section('title', 'Centers Page')

@section('content')
    <h1>Our Centers</h1><br><br>
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
            </p>
        </article></td><td></td><td></td><td></td><td></td><td></td>
        @endfor
        </tr></table>
@endsection
