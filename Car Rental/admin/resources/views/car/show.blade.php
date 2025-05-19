@extends('layout')

@section('title', 'Cars Page')

@section('content')
@for ($i = 0; $i < count($cars); $i++)
<article>
    <h1>Car Info</h1>
    <p>
        <p>
            Name: {{ $cars[$i]->name }}
        </p>
        <p>
            Type: {{ $cars[$i]->type }}
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
            Rent Price: {{ $cars[$i]->rentPrice }}
        </p>
        <table><tr>
            <td><button onclick="location.href='{{ route('car.edit', $cars[$i]->id) }}'">Edit</button></td>
            <td><form action={{ route('car.destroy', $cars[$i]->id) }} method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete">
            </form></td>
        </tr></table>
        <p><table><tr>
            @foreach ($arrImages[$i] as $image)
                <td><img src={{ url('img/' . $image->path . '') }} alt="" width=200 height=200/></td>
            @endforeach
        </tr></table></p>
    </p>
</article>
<br><br>
@endfor
@endsection
