<div class="col-lg-12">
    <x-layouts.titleSection title="Create Customers" subtitle="Create LPG customers" :breadcrumbs="[
        ['url' => route('admin.customers'), 'label' => 'Dashboard', 'icon' => '<i class=\'icon-home\'></i>'],
        ['label' => 'Create Customers'],
    ]" />

    <div class="card p-4">
        <form action="">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Customer Name</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Customer Phone</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Customer Email</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Customer CNIC</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Customer Address</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-6">
                    <button style="width: 200px" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
