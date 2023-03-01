<form method="post" action="{{route("generate_p9_customize_basic_salary",["code"=>request()->code])}}" class="modal-content">
    @csrf
    @method("PUT")
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="body">

            @forelse($salaries as $basicSalary)
                <div class="mb-10 fv-row">
                    <!--begin::Label-->
                    <label class="form-label mb-3">{{$basicSalary->month_name}}</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label" for="">Basic Salary</label>
                            <input required type="number" class="form-control form-control-lg form-control-solid"
                                   name="basic_salary[{{$basicSalary->month_name}}]" placeholder="" value="{{$basicSalary->amount}}"/>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="">Allowance</label>

                            <input required type="number" class="form-control form-control-lg form-control-solid"
                                   name="allowance[{{$basicSalary->month_name}}]" placeholder="" value="{{$basicSalary->allowance}}"/>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="">Deductions</label>

                            <input required type="number" class="form-control form-control-lg form-control-solid"
                                   name="deduction[{{$basicSalary->month_name}}]" placeholder="" value="{{$basicSalary->deduction}}"/>
                        </div>
                    </div>
                </div>
                <hr>
            @empty
            @endforelse
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</form>
