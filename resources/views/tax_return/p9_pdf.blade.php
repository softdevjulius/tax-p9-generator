<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <title>{{config('app.name')}}</title>--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container mt-5">

    <table class="table table-bordered mb-5">

        <tr>
            <th colspan="2" style="background-color: #84a6eb; color: white">P9 Form</th>
        </tr>
        <tbody>
            <tr>
                <th>Full Name:</th>
                <td>{{$p9->organisation_name}}</td>
            </tr>
            <tr>
                <th>KRA PIN:</th>
                <td>{{$p9->kra_pin}}</td>
            </tr>
            <tr>
                <th>Basic Salary:</th>
                <td>{{number_format($p9->basic_salary,2)}}</td>
            </tr>

            @if($p9->deductions()->count())
                <tr>
                    <td></td>
                    <td></td>
                </tr>

            <tr>
                <th colspan="2">Allowances:</th>
{{--                <td>{{$p9->kra_pin}}</td>--}}
            </tr>
            @forelse($p9->allowances as $allowance)
                <tr>
                    <th>{{$allowance->name}}:</th>
                    <td>{{number_format($allowance->amount,2)}}</td>
                </tr>
            @empty
            @endforelse
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            @endif


            @if($p9->deductions()->count())
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            <tr>
                <th colspan="2">Deductions:</th>
{{--                <td>{{$p9->kra_pin}}</td>--}}
            </tr>
            @forelse($p9->deductions as $deduction)
                <tr>
                    <th>{{$deduction->name}}:</th>
                    <td>{{number_format($deduction->amount,2)}}</td>
                </tr>
            @empty
            @endforelse
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            @endif

            <tr>
                <th>Tax:</th>
                <td>{{number_format(doubleval($p9->tax),2)}}</td>
            </tr>

        </tbody>
    </table>
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
