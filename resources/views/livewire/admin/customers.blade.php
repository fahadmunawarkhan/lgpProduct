<div class="col-lg-12">
    <x-layouts.titleSection title="Manage Customers" subtitle="Manage LPG customers" :breadcrumbs="[
        ['url' => route('admin.customers'), 'label' => 'Dashboard', 'icon' => '<i class=\'icon-home\'></i>'],
        ['label' => 'Manage Customers'],
    ]" />
    <div class="card">
        <div class="d-flex justify-content-between align-items-center mt-3 m-3">
            <h2 class="mb-0">Customers</h2>
            <a wire:navigate href="{{ route('admin.create.customers') }}" class="btn btn-primary">
                Add New
            </a>
        </div>

        <div class="body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>email</th>
                            <th>CNIC</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
