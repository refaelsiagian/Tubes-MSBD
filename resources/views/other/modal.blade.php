<!-- Modal Admin-->
<div class="modal fade" id="modal-admin" tabindex="-1" aria-labelledby="modal-admin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Admin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('others.admin') }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="admin_id" value="{{ $admin->employee->id }}">
                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Admin</label>
                        <select name="employee_id" class="form-select" id="employee_id">
                            @foreach ($teachers as $teacher)
                                @if ($teacher->employee->id == $admin->employee->id)
                                    <option value="{{ $teacher->employee->id }}" selected>{{ $teacher->employee->employee_name }}</option>
                                @else
                                    <option value="{{ $teacher->employee->id }}">{{ $teacher->employee->employee_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Inspector-->
<div class="modal fade" id="modal-inspector" tabindex="-1" aria-labelledby="modal-inspector" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Admin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('others.inspector') }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="inspector_id" value="{{ $inspector->employee->id }}">
                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Pengawas</label>
                        <select name="employee_id" class="form-select" id="employee_id">
                            @foreach ($administrators as $admin)
                                @if ($inspector->employee->id == $admin->employee->id)
                                    <option value="{{ $admin->employee->id }}" selected>{{ $admin->employee->employee_name }}</option>
                                @else
                                    <option value="{{ $admin->employee->id }}">{{ $admin->employee->employee_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

