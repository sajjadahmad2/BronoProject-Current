<!--begin:: Avatar -->
<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
    <a href="{{ route('user-management.users.show', $user) }}">
        @if($user->photo)
            <div class="symbol-label">
                <img src="{{ asset($user->photo) }}" class="w-100"/>
            </div>
        @else
            <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $user->first_name) }}">
                {{ substr($user->first_name, 0, 1) }}
            </div>
        @endif
    </a>
</div>
<!--end::Avatar-->
<!--begin::User details-->


<div class="d-flex flex-column">
    <span>{{ $user->first_name . ' '. $user->last_name ?? '' }}</span>
</div>
<!--begin::User details-->
