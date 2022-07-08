<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>Hello, world!</title>
</head>

<body>
    <div id="converter" style="text-align: center;">
        <h2>Unit converter</h2>
        <form method="post" action="{{ route('units_store') }}" class="inline" method="post">
            @csrf
            @method('POST')

            <label for="">enter unit name:</label>
            <input type="text" name="unit" placeholder="enter unit name" autocomplete="off">
            <label for="">enter scale:</label>
            <input type="number" name="scale_value" placeholder="input scale" autocomplete="off">


            <label for="">select unit</label>
            <select name="units" id="unit">
                <option value="">select unit</option>
                @foreach ($units_select as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                @endforeach
            </select>
            <label for="">select subunit</label>
            <select name="subunits" id="subunit">

            </select>


            <input type="submit" value="save" />

        </form>
        <div class="butn mt-4">
            <a class="btn btn-info" href="{{ route('products_home') }}">Back</a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#unit').on('change', function(e) {
                var cat_id = e.target.value;
                $.ajax({
                    url: "{{ route('supunit') }}",
                    type: "POST",
                    data: {
                        cat_id: cat_id
                    },
                    success: function(data) {
                        $('#subunit').empty();
                        $('#subunit').append('<option> Select Sup </option>');
                        $.each(data.supunits[0].supunits, function(key,
                        value) {
                            $('#subunit').append('<option value="' + value
                                .id + '">' + value.unit_name + '</option>');
                        })
                        console.log(data);
                    }
                })
            });
        });
    </script>
</body>

</html>
