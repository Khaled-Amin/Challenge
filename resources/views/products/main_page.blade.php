<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container mt-5">
        <div class="butn mb-3">
            <a href="{{ route('products_create') }}" class="btn btn-success">create product</a>
            <a href="{{ route('units_home') }}" class="btn btn-warning">show unit</a>
        </div>


        <table class="table">
            <thead class="table-dark">

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">amount_liter</th>
                    <th scope="col">amount_milliliter</th>
                    {{-- <th scope="col">unit</th> --}}
                    <th scope="col">total_quantities_liter</th>
                    <th scope="col">total_quantities_milliliter</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($products as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->amount_liter }}</td>
                        <td>{{ $item->amount_milliliter}}</td>
                        {{-- <td>{{$item->units->unit_name}}</td> --}}
                        <td>{{ $item->total_quantities_liter}} L</td>
                        <td>{{ $item->total_quantities_milliliter }}mL</  td>
                        <td><a href="{{ route('products.destroy', ['id' => $item->id]) }}">delete</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

</body>

</html>
