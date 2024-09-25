<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-850px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Edit User</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross', 'fs-1') !!}
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_user_form" class="form" action="#" wire:submit="submit"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" wire:model="user_id" name="user_id" value="{{ $user_id }}" />
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7" hidden>
                            <!--begin::Label-->
                            <label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
                            <!--end::Label-->
                            <!--begin::Image placeholder-->
                            <style>
                                .image-input-placeholder {
                                    background-image: url('{{ image('svg/files/blank-image.svg') }}');
                                }

                                [data-bs-theme="dark"] .image-input-placeholder {
                                    background-image: url('{{ image('svg/files/blank-image-dark.svg') }}');
                                }
                            </style>
                            <!--end::Image placeholder-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline image-input-placeholder {{ $avatar || $saved_avatar ? '' : 'image-input-empty' }}"
                                data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                @if ($avatar)
                                    <div class="image-input-wrapper w-125px h-125px"
                                        style="background-image: url({{ $avatar ? $avatar->temporaryUrl() : '' }});">
                                    </div>
                                @else
                                    <div class="image-input-wrapper w-125px h-125px"
                                        style="background-image: url({{ $saved_avatar }});"></div>
                                @endif
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    {!! getIcon('pencil', 'fs-7') !!}
                                    <!--begin::Inputs-->
                                    <input type="file" wire:model="avatar" name="avatar"
                                        accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    {!! getIcon('cross', 'fs-2') !!}
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    {!! getIcon('cross', 'fs-2') !!}
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            <!--end::Hint-->
                            @error('avatar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        @php
                            $fields = [
                                [
                                    'label' => 'First Name',
                                    'name' => 'first_name',
                                    'type' => 'text',
                                    'placeholder' => 'First Name',
                                    'wire_model' => 'first_name',
                                ],
                                [
                                    'label' => 'Last Name',
                                    'name' => 'last_name',
                                    'type' => 'text',
                                    'placeholder' => 'Last Name',
                                    'wire_model' => 'last_name',
                                ],
                                [
                                    'label' => 'Email',
                                    'name' => 'email',
                                    'type' => 'email',
                                    'placeholder' => 'example@domain.com',
                                    'wire_model' => 'email',
                                ],
                                [
                                    'label' => 'Password',
                                    'name' => 'password',
                                    'type' => 'password',
                                    'placeholder' => 'Password',
                                    'wire_model' => 'password',
                                ],
                            ];
                            if (auth()->user()->hasRole('superadministrator')) {
                                $fields[] = [
                                    'label' => 'CRM Location ID',
                                    'name' => 'location_id',
                                    'type' => 'text',
                                    'placeholder' => 'Location ID',
                                    'wire_model' => 'location_id',
                            ];
                            }
                        @endphp

                        @foreach ($fields as $field)
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2">{{ $field['label'] }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="{{ $field['type'] }}" wire:model="{{ $field['wire_model'] }}"
                                    name="{{ $field['name'] }}" class="form-control form-control-solid mb-3 mb-lg-0"
                                    placeholder="{{ $field['placeholder'] }}" />
                                <!--end::Input-->
                                @error($field['name'])
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                        @endforeach
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-7" hidden>
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-5">Role</label>
                            <!--end::Label-->
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <!--begin::Roles-->
                            @foreach ($roles as $role)
                                <!--begin::Input row-->
                                <div class="d-flex fv-row">
                                    <!--begin::Radio-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3"
                                            id="kt_modal_update_role_option_{{ $role->id }}" wire:model="role"
                                            name="role" type="radio" value="{{ $role->name }}"
                                            checked="checked" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label"
                                            for="kt_modal_update_role_option_{{ $role->id }}">
                                            <div class="fw-bold text-gray-800">
                                                {{ ucwords($role->name) }}
                                            </div>
                                            <div class="text-gray-600">
                                                {{ $role->description }}
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Radio-->
                                </div>
                                <!--end::Input row-->
                                @if (!$loop->last)
                                    <div class='separator separator-dashed my-5'></div>
                                @endif
                            @endforeach
                            <!--end::Roles-->
                        </div>
                        <!--end::Input group-->
                        <!--start:: Permission Input group-->
                        <div class="fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">Set User Permissions </label>
                            <!--end::Label-->
                            <!--begin::Table wrapper-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-semibold">
                                        <!--begin::Table row-->
                                        <!--end::Table row-->
                                        @foreach ($permissions_by_group as $group => $permissions)
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Label-->
                                                <td class="text-gray-800">{{ ucwords($group) }}</td>
                                                <!--end::Label-->
                                                <!--begin::Input group-->
                                                @foreach ($permissions as $permission)
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                                    wire:model="checked_permissions"
                                                                    value="{{ $permission->name }}"
                                                                    @if (in_array($permission->name, $checked_permissions)) checked @endif />
                                                                <span class="form-check-label">
                                                                    {{ ucwords(Str::before($permission->name, ' ')) }}
                                                                </span>
                                                            </label>
                                                            <!--end::Checkbox-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                @endforeach
                                                <!--end::Input group-->
                                            </tr>
                                            <!--end::Table row-->
                                        @endforeach
                                        <!--begin::Table row-->
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table wrapper-->
                        </div>
                        <!--end:: Permission Input group-->
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close"
                            wire:loading.attr="disabled">Discard</button>
                        <button type="submit" class="btn btn-primary submit-add-user">
                            <span class="indicator-label" wire:loading.remove>Submit</span>
                            <span class="indicator-progress" wire:loading wire:target="submit">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
