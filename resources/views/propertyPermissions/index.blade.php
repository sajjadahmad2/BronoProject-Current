<style>
    .checkdiv {
        position: relative;
        padding: 4px 8px;
        border-radius: 40px;
        margin-bottom: 4px;
        min-height: 30px;
        padding-left: 40px;
        display: flex;
        align-items: center;
    }

    .checkdiv:last-child {
        margin-bottom: 0px;
    }

    .checkdiv span {
        position: relative;
        vertical-align: middle;
        line-height: normal;
    }

    .le-checkbox {
        appearance: none;
        position: absolute;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        background-color: #F44336;
        width: 30px;
        height: 30px;
        border-radius: 40px;
        margin: 0px;
        outline: none;
        transition: background-color .5s;
    }

    .le-checkbox:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(45deg);
        background-color: #ffffff;
        width: 20px;
        height: 5px;
        border-radius: 40px;
        transition: all .5s;
    }

    .le-checkbox:after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(-45deg);
        background-color: #ffffff;
        width: 20px;
        height: 5px;
        border-radius: 40px;
        transition: all .5s;
    }

    .le-checkbox:checked {
        background-color: #4CAF50;
    }

    .le-checkbox:checked:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) translate(-4px, 3px) rotate(45deg);
        background-color: #ffffff;
        width: 12px;
        height: 5px;
        border-radius: 40px;
    }

    .le-checkbox:checked:after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) translate(3px, 2px) rotate(-45deg);
        background-color: #ffffff;
        width: 16px;
        height: 5px;
        border-radius: 40px;
    }
</style>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Property Permissions Management</h4>
    </div>
    <div class="card-body">
        <div class="container">
            <table class="table mb-0 table-bordered table-hover" id="managePerm">
                <thead>
                    <tr>
                        <th class="fw-bold">Permissions</th>
                        <th class="fw-bold">Roles</th>
                    </tr>
                    <tr>
                        <th class="fw-bold">Available Permissions</th>
                        @foreach ($roles as $role)
                            @if ($role->name == 'superadministrator')
                                @continue
                            @endif
                            <th class="fw-bold">{{ $role->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{formatString( $permission->column_name )}}</td>
                            @foreach ($roles as $role)
                                @if ($role->name == 'superadministrator')
                                    @continue
                                @endif
                                <td>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-success">
                                            <div class="holder">
                                                <div class="checkdiv grey400">
                                                    <input type="checkbox" class="le-checkbox permissions"
                                                        id="chkbox-{{ $permission->id }}-{{ $role->id }}"
                                                        value="1" data-role="{{ $role->id }}"
                                                        data-permission="{{ $permission->id }}"
                                                        {{ $permission->editable ? 'checked' : '' }} />
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
