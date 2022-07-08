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
    <div id="converter" style="text-align: center;">
        <h2>Unit converter</h2>
        <form method="post" action="{{ route('products_store') }}" class="inline">
            @csrf
            @method('POST')
            <label for="">enter product name:</label>
            <input type="text" name="product_name" placeholder="input product" autocomplete="off">

            <label for="">enter amount liter:</label>
            <input type="number" step="0.01" name="amount_l" id="">
            <label for="">enter amount milliliter:</label>
            <input type="number" step="0.01" name="amount_ml" id="">

            <div class="col">
                <label for="">Units:</label>
                @isset($getUnitss)
                    <select name="getunit" id="">
                        <option value="">Select Unit</option>
                        @foreach ($getUnitss as $getItem)
                            <option value="{{$getItem->id}}">{{$getItem->unit_name}}</option>
                        @endforeach
                    </select>


                @endisset

            </div>
            <input type="submit" value="calculate" />

        </form>
        <div class="butn mt-4">
            <a class="btn btn-info" href="{{ route('products_home') }}">Back</a>
        </div>
    </div>

    <div class="container">
        <mark>Note:</mark>
        <p>If we have one value in liters, we enter in the field its value liters and choose convert to milliliters
            Whereas if we had two values, we enter two values into liters and milliliters, we can choose one in liters in order to calculate liters and vice versa.</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

</body>

</html>
