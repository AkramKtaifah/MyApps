@extends('layout')

@section('title', 'Cars Page')

@section('content')
@if (count($cars) > 0)

@for ($i = 0; $i < count($cars); $i++)
<article>
    <h1>{{ strtoupper($cars[$i]->name . ' ' . $cars[$i]->type) }}</h1>
    <p>
        <p>
            Center: {{ $centers[$i]->city }}
        </p>
        <p>
            Color: {{ $cars[$i]->color }}
        </p>
        <p>
            Year: {{ $cars[$i]->year }}
        </p>
        <p>
            Board Number: {{ $cars[$i]->boardNum }}
        </p>
        <p>
            Rent Price Daily: {{ $cars[$i]->rentPrice }}
        </p>

            <p><table><tr>
                <td><form action={{ route('reserve.init') }} method="POST">
                @csrf
                <input type="hidden" name="carID" value={{ $cars[$i]->id }} />
                <input type="hidden" name="centerID" value={{ $cars[$i]->centerID }} />
                <input type="submit" value="Reserve" />
                </form></td>
            </tr></table></p>

        <p><table><tr>
            @foreach ($arrImages[$i] as $image)
                <td><img src={{ url('../../admin/public/img/' . $image->path . '') }} alt="" width=200 height=200/></td>
            @endforeach
        </tr></table></p>
    </p>
</article>
<br><br>
@endfor

@else
<h1>There is no results for this search</h1>
@endif

@endsection
