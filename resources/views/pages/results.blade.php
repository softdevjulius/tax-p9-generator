<div class="calc-results" id="paye-results">
    <div class="calc-result"><span class="key">Gross Pay </span><span class="value"> Kes {{number_format($gross_salary,2)}}</span></div>
    <br>
    <div class="calc-result"><span class="key">Total Allowance </span><span class="value"> Kes {{number_format($total_allowance,2)}}</span></div>

{{--    <div class="calc-result"><span class="key">Contribution Benefit </span><span class="value"> Kes {{number_format($total_allowance,2)}}</span></div>--}}
    <br>
    <div class="calc-result"><span class="key">Total Deductions</span><span class="value"> Kes {{number_format($total_deduction,2)}}</span></div>
    <br>
    <div class="calc-result"><span class="key">NSSF</span><span class="value"> Kes {{number_format($nssf,2)}}</span></div>
    <br>
{{--    <div class="calc-result"><span class="key">Personal Relief</span><span class="value"> Kes 2,400.00</span></div>--}}
{{--    <div class="calc-result"><span class="key">Insurance Relief</span><span class="value"> Kes 0.00</span></div>--}}
    <div class="calc-result total"><span class="key">PAYE </span><span class="value"><strong> Kes {{number_format($tax,2)}}</strong></span></div>
{{--    <div class="calc-result disclaimer"><span class="key">This result is only a guideline. It is advised that for filing of returns the exact calculation be made as per the provisions contained in the relevant Acts, and Laws.The tax brackets and personal relief used for the year 2020, are applicable from 25th April, 2020. </span>--}}
{{--    </div>--}}
</div>
