<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>P9 PDF</title>

    <!-- Fonts -->
</head>
<body class="antialiased">
<div class="col-md-12">
    <div class="ml-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            <table style="width: 100% !important;">
                <tr style="width: 100% !important;">
                    <td>Name: {{$p->name}}</td>
                    <td>Phone: {{$p->phone}}</td>
                    <td>Email: {{$p->email}}</td>
                </tr>
                <tr style="width: 100% !important;">
                    <td>KRA PIN {{$p->kra_pin}}</td>
                    <td>Basic Salary {{$p->basic_salary}}</td>
                    <td>Account Type {{$p->account_type}}</td>
                </tr>
                @if($p->allowances->count())
                    <tr>
                        <th colspan="3">
                            <h2>Allowances</h2>
                        </th>
                    </tr>
                @endif
                @forelse($p->allowances as $allowance)
                    <tr style="width: 100% !important;">
                        <!--begin::Customer=-->
                        <td>
                            #{{$loop->iteration}}
                        </td>
                        <td>
                            {{$allowance->name}}
                        </td>

                        <!--end::Billing=-->
                        <!--begin::Product=-->
                        <td>KES {{number_format($allowance->amount,2)}}</td>
                        <!--end::Product=-->
                        <!--begin::Date=-->
                    </tr>
                @empty
                @endforelse
                @if($p->deductions->count())
                    <tr>
                        <th colspan="3">
                            <h2>Deductions</h2>
                        </th>
                    </tr>
                @endif
                @forelse($p->deductions as $deduction)
                    <tr style="width: 100% !important;">
                        <!--begin::Customer=-->
                        <td>
                            #{{$loop->iteration}}
                        </td>
                        <td>
                            {{$deduction->name}}
                        </td>

                        <!--end::Billing=-->
                        <!--begin::Product=-->
                        <td>KES {{number_format($deduction->amount,2)}}</td>
                        <!--end::Product=-->
                        <!--begin::Date=-->
                    </tr>
                @empty
                @endforelse

                @if($p->incomes->count())
                    <tr>
                        <th colspan="3">
                            <h2>Incomes</h2>
                        </th>
                    </tr>
                @endif

                @if($p->incomes()->count())
                    <thead>
                    <th>Income</th>
                    <th>Amount</th>
                    <th>Withholding Tax Amount</th>
                    <th>Withholding Tax (%)</th>
                    <th>Attachment(s)</th>
                    </thead>
                @endif
                @forelse($p->incomes as $income)
                    <tr>

                        <td>
                            <div class="badge badge-light-success">{{$income->name}}</div>
                        </td>

                        <td>KES {{number_format($income->amount,2)}}</td>
                        <td>KES {{number_format($income->withholding_tax_amount,2)}}</td>
                        <td> {{number_format($income->withholding_tax,2)}}</td>
                        <!--end::Product=-->
                        <!--end::Action=-->
                        <td>
                            @forelse($income->files as $file)
                                <a href="{{route("download_file",["path"=>($file->path)])}}"><i class="fa fa-download"></i> file #{{$loop->iteration}}</a>
                            @empty
                            @endforelse
                        </td>
                    </tr>
                    @foreach($income->expenses as $expense)
                        <tr>

                            <!--end::Checkbox-->
                            <!--begin::Customer=-->
                            <td>
                                --
                            </td>
                            <!--end::Customer=-->
                            <!--begin::Status=-->
                            <td>
                                <div class="">Expense Name: {{$expense->expense_name}}</div>
                            </td>
                            <!--end::Customer=-->
                            <!--begin::Status=-->
                            <td>
                                <div class="">Expense Amount: {{number_format($expense->expense_amount,2)}}</div>
                            </td>


                        </tr>
                    @endforeach
                @empty
                @endforelse
            </table>
        </div>
    </div>
</div>

</body>
</html>
