<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">PRODUCER</h5> <small class="text-muted float-end">PRODUCER INFO</small>
        </div>
        <div class="card-body">

            <div class="form-floating form-floating-outline mb-4">
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="ACME Inc."
                    value="{{ $agent->agencies[0]->agency_name }}" readonly />
                <label for="basic-default-fullname">Company</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <input type="text" class="form-control" id="basic-default-company2" placeholder="Address line1"
                    value="{{ $agent->agencies[0]->agency_address }}" readonly />
                <label for="basic-default-company2">Address</label>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="mb-4">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="basic-default-email" class="form-control"
                                placeholder="Westlake Village" value="{{ $agent->agencies[0]->agency_city }}"
                                readonly />
                            <label for="basic-default-email">City </label>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" id="basic-default-phone" class="form-control " placeholder="6583"
                            value="{{ $agent->agencies[0]->agency_zip }}" readonly />
                        <label for="basic-default-phone">Zip code</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating form-floating-outline mb-4">
                        <input type="text" id="basic-default-phone" class="form-control " placeholder="CA"
                            value="{{ $agent->agencies[0]->agency_state }}" readonly />
                        <label for="basic-default-phone">State</label>
                    </div>
                </div>
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="44444"
                    value="{{ $agent->agencies[0]->agency_zip }}" readonly />
                <label for="basic-default-phone">Zip Code</label>
            </div>


        </div>
    </div>
</div>
