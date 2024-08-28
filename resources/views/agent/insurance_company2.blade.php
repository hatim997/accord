<div class="col-7">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">INSURER(S) AFFORDING COVERAGE</h5> <small class="text-muted float-end">CONTACT</small>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="" placeholder="29424"
                            value="{{ $certPolicy->first()->insuranceProvider->name }}" readonly />
                        <label for="basic-default-fullname">INSURER A</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="naic_a" placeholder="29424"
                            value="{{ $certPolicy->first()->insuranceProvider->naic_number }}" readonly />
                        <label for="basic-default-company">NAIC #</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="br_a" placeholder="A++ 04-1"
                            value="{{ $certPolicy->first()->insuranceProvider->best_rating_number }}" readonly />
                        <label for="basic-default-company">Best Rating </label>
                    </div>
                </div>
            </div>
            <!--------------------------------------------------------------bbbbbb------------------------------------------------------------->

            {{-- <div class="row">
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <select class="js-example-basic-single form-control" name="insurance_provider_id[]"
                            id="insurB"></select>
                        <label for="basic-default-fullname">INSURER B</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="naic_b" placeholder="29424" />
                        <label for="basic-default-company">NAIC #</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="br_b" placeholder="A++ 04-1" />
                        <label for="basic-default-company">Best Rating </label>
                    </div>
                </div>
            </div> --}}
            <!--------------------------------------------------------------ccccccc------------------------------------------------------------->

            {{-- <div class="row">
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <select class="js-example-basic-single form-control" name="insurance_provider_id[]"
                            id="insurC"></select>
                        <label for="basic-default-fullname">INSURER C</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="naic_c" placeholder="29424" />
                        <label for="basic-default-company">NAIC #</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="br_c" placeholder="A++ 04-1" />
                        <label for="basic-default-company">Best Rating </label>
                    </div>
                </div>
            </div> --}}
            <!--------------------------------------------------------------dddddd------------------------------------------------------------->

            {{-- <div class="row">
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <select class="js-example-basic-single form-control" name="insurance_provider_id[]"
                            id="insurD"></select>
                        <label for="basic-default-fullname">INSURER D</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="naic_d" placeholder="29424" />
                        <label for="basic-default-company">NAIC #</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="br_d" placeholder="A++ 04-1" />
                        <label for="basic-default-company">Best Rating </label>
                    </div>
                </div>
            </div> --}}
            <!--------------------------------------------------------------eeeeee------------------------------------------------------------->
            {{--
            <div class="row">
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <select class="js-example-basic-single form-control" name="insurance_provider_id[]"
                            id="insurE"></select>
                        <label for="basic-default-fullname">INSURER E</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="naic_e" placeholder="29424" />
                        <label for="basic-default-company">NAIC #</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" class="form-control" id="br_e" placeholder="A++ 04-1" />
                        <label for="basic-default-company">Best Rating </label>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</div>
