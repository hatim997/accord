<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">CONTACT</h5> <small class="text-muted float-end">CONTACT</small>
        </div>
        <div class="card-body">

            <div class="form-floating form-floating-outline mb-4">
                <input type="text" class="form-control"id="basic-default-fullname" placeholder="John Doe"
                    value="{{ $agent->name }}" readonly />
                <label for="basic-default-fullname">Contact Name</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <input type="text" id="basic-default-phone" class="form-control phone-mask"
                    placeholder="658 799 8941" value="{{ $agent->agencies[0]->agency_cellphone }}" readonly />
                <label for="basic-default-phone">Phone No</label>
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <input type="text" class="form-control" id="basic-default-company" placeholder="434652342342"
                    value="{{ $agent->agencies[0]->agency_fax }}" readonly />
                <label for="basic-default-company">Fax No</label>
            </div>
            <div class="mb-4">
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" id="basic-default-company" placeholder="434652342342"
                        value="{{ $agent->agencies[0]->agency_extra_email }}" readonly />
                    <label for="basic-default-company">Email</label>
                </div>
            </div>
            <div class="form-floating form-floating-outline mb-4">
                <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="658"
                    value="{{ $agent->agencies[0]->producer_customer_number }}" readonly />
                <label for="basic-default-phone">Producer Customer Ids</label>
            </div>


        </div>
    </div>
</div>
</div>
