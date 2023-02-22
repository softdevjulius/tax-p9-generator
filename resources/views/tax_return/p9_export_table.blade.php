@php use App\Http\Controllers\GenerateP9Controller; @endphp
<table style="width: 100% !important;">
    <tbody>
    <tr>
        <td colspan="14" style="text-align: center !important;">
            <img src="{{asset("images/img.png")}}" alt="">
        </td>
    </tr>
    <tr>
        <th>P9A</th>
        <th colspan="9" style="text-align: center !important;">DOMESTIC TAXES DEPARTMENT</th>
    </tr>
    <tr>
        <th colspan="5" style="text-align: center !important;">TAX DEDUCTION CARD YEAR {{now()->format("Y")}}</th>
    </tr>
{{--    <tr>--}}
{{--        <td colspan="2">Employer's Name</td>--}}
{{--        <td colspan="4">GATUNDU NORTH CONSTITUENCY</td>--}}

{{--        <td colspan="2">Employer's PIN</td>--}}
{{--        <td colspan="4">P051340491Z</td>--}}
{{--    </tr>--}}
    <tr>
        <td colspan="2">Employee’s Name</td>
        <td colspan="4">{{$name}}</td>
        <td colspan="2">Employee’s PIN</td>
        <td colspan="4">{{$pin}}</td>
    </tr>
    <tr>
        <th>Month</th>
        <th>Basic Salary Kshs.</th>
        <th>Benefits – Non- Cash Kshs.</th>
        <th>Value of Quarters Kshs.</th>
        <th>Total Gross Pay Kshs.</th>
        <th colspan="3">Defined Contribution Retirement Scheme Kshs.</th>
        <th>Owner- Occupied Interest Kshs.</th>
        <th>Retirement Contribution & Owner Occupied Interest Kshs.</th>
        <th>Chargeable Pay Kshs.</th>
        <th>Tax Charged Kshs.</th>
        <th>Personal Relief + Insurance Relief Kshs.</th>
        <th>PAYE Tax (J- K) Kshs.</th>
    </tr>
    <tr>
        <td></td>
        <td>A</td>
        <td>B</td>
        <td>C</td>
        <td>D</td>
        <td>E1 30% of A</td>
        <td>E2 Actual</td>
        <td>E3 Fixed</td>
        <td>Amount of Interest</td>
        <td>The lowest of E added to F</td>
        <td></td>
        <td></td>
        <td>Total Kshs.</td>
    </tr>
    @forelse(range(1,12) as $month_id)
        <tr>
            <td>{{\Repo\MonthHelper::getMonthName($month_id)}}</td>
            <td>{{number_format($amount,2)}}</td>
            <td>{{number_format($allowances,2)}}</td>
            <td>{{number_format($deductions,2)}}</td>
            <td>{{number_format($amount,2)}}</td>
            <td>{{number_format(.3*$amount,2)}}</td>
            <td>{{number_format($nssf,2)}}</td>
            <td>{{number_format(20000,2)}}</td>
            <td></td>
            <td>{{number_format($nssf,2)}}</td>
            <td>{{number_format($taxable_income,2)}}</td>
            <td>{{number_format($total_tax,2)}}</td>
            <td>{{number_format($personal_relief,2)}}</td>
            <td>{{number_format($tax,2)}}</td>
        </tr>

    @empty
    @endforelse
    <tr>
        <th>Totals:</th>
        <th>{{number_format($amount*12,2)}}</th>
        <th>{{number_format($allowances*12,2)}}</th>
        <th>{{number_format($deductions*12,2)}}</th>
        <th>{{number_format($amount*12,2)}}</th>
        <th>{{number_format(.3*$amount*12,2)}}</th>
        <th>{{number_format($nssf*12,2)}}</th>
        <th>{{number_format(20000*12,2)}}</th>
        <th>{{number_format(0*12,2)}}</th>
        <th>{{number_format($nssf*12,2)}}</th>
        <th>{{number_format($taxable_income*12,2)}}</th>
        <th>{{number_format($total_tax*12,2)}}</th>
        <th>{{number_format($personal_relief*12,2)}}</th>
        <th>{{number_format($tax*12,2)}}</th>
    </tr>
    <tr>
        <td colspan="4">TOTAL CHARGEABLE PAY (COL. H)   Kshs</td>
        <th>{{number_format($taxable_income*12,2)}}</th>
        <td colspan="5"></td>
        <td colspan="3">TOTAL TAX (COL. L) Kshs</td>
        <th>{{number_format($tax*12,2)}}</th>
    </tr>
    <tr>
        <td colspan="14">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="14">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="14">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="5">1.  Use P9A     (a) For all liable employees and where director/employee received Benefits in addition to cash emoluments.</td>
        <td colspan="4"></td>
        <td colspan="5">(b)  Attach   (i) Photostat copy of interest certificate and statement of account from the Financial Institution.</td>
    </tr>
    <tr>
        <td colspan="5">(b)  Where an employee is eligible to deduction on owner occupier interest.</td>
        <td colspan="4"></td>
        <td colspan="5">(ii) The DECLARATION duly signed by the employee.</td>
    </tr>
    <tr>
        <td colspan="5">2.  (a)  Allowable  interest in respect of any month must not exceed Kshs. 12,500/= or Kshs. 150,000 per year.</td>
        <td colspan="4"></td>
        <th colspan="5">NAMES OF FINANCIAL INSTITUTION ADVANCING MORTGAGE LOAN</th>
    </tr>
    <tr>
        <th colspan="5">(See back of this card for further information required by the Department).</th>
        <td colspan="4"></td>
        <td colspan="5">NAMES OF FINANCIAL INSTITUTION ADVANCING MORTGAGE LOAN</td>
    </tr>
    <tr>
        <th colspan="5"></th>
        <td colspan="4"></td>
        <td colspan="5">L R NO. OF OWNER OCCUPIED PROPERTY: </td>
    </tr>
    <tr>
        <th colspan="5"></th>
        <td colspan="4"></td>
        <td colspan="5">DATE OF OCCUPATION OF HOUSE:</td>
    </tr>
    </tbody>
</table>
