<div class="" style="width: 100% !important;">
    <style>

        td{
            padding: 7px !important;
        }
        table, th, td {
            border: 1px solid #f0f0f4;
        }
    </style>
    <div class="row">

        <table class="tax_calculation_table" style="width: 100% !important;">
            <tr>
                <th colspan="2"><h2>Calculation</h2></th>
            </tr>
            <tr>
                <th colspan="2"><strong>Income Tax</strong></th>
            </tr>
            <tr>
                <td>KRA PIN:</td>
                <td>{{$kra_pin}}</td>
            </tr>
            <tr>
                <td>Basic Income:</td>
                <td>{{number_format($basic_income,2)}}</td>
            </tr>
            @if($p9->should_pay_nhif)
                <tr>
                    <td>NHIF:</td>
                    <td>{{number_format($p9->nhif,2)}}</td>
                </tr>
            @endif
            @if($p9->should_pay_nssf)
                <tr>
                    <td>NSSF:</td>
                    <td>{{number_format($p9->nssf,2)}}</td>
                </tr>
            @endif
            <tr>
                <td>Non-Cash Benefits:</td>
                <td>{{number_format($allowances,2)}}</td>
            </tr>
            <tr>
                <td>Deductions:</td>
                <td>{{number_format($deductions,2)}}</td>
            </tr>
            <tr>
                <td>Taxable Income:</td>
                <td>{{number_format($taxable_income,2)}}</td>
            </tr>
            <tr>
                <td>Total Tax:</td>
                <td>{{number_format($total_tax,2)}}</td>
            </tr>
            <tr>
                <td>Tax Relief:</td>
                <td>{{number_format($personal_relief,2)}}</td>
            </tr>
            <tr>
                <td>Tax Payable:</td>
                <td>{{number_format($tax_payable,2)}}</td>
            </tr>
            @if(!empty($total_other_income_amount) && $total_other_income_amount>0)
                <tr>
                    <th colspan="2"><strong>Individual Income Tax</strong></th>
                </tr>
                <tr>
                    <td>Total Income</td>
                    <td>{{number_format($total_other_income_amount,2)}}</td>
                </tr>
                <tr>
                    <td>Total Taxable Income</td>
                    <td>{{number_format($total_taxable_other_income,2)}}</td>
                </tr>
                <tr>
                    <td>Total Individual Income Tax</td>
                    <td>{{number_format($total_individual_income_tax,2)}}</td>
                </tr>
                <tr>
                    <td>Total Withholding Tax</td>
                    <td>{{number_format($total_withholding_tax,2)}}</td>
                </tr>
            @endif

            <tr style="background-color: #e7f0fe !important;">
                <td>Total Tax Payable</td>
                <td>{{number_format($total_withholding_tax + $total_individual_income_tax + $tax_payable ,2)}}</td>
            </tr>
        </table>

    </div>

</div>
