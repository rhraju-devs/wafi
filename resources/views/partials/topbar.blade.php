<div class="row mb-4">
    <div class="dashboard-header bg--base d-flex justify-content-between align-items-center">

        <div class="navigator-text d-flex justify-content-center align-items-center">
            <div class="dashboard-body__bar">
                <span class="dashboard-body__bar-icon"><i class="las la-bars"></i></span>
            </div>
            <h6>{{ __(@$pageTitle) }}</h6>
        </div>

        <ul class="d-flex justify-content-center align-items-center gap--32">

            <li>
                <div class="user-thumb">
                    @if (isset(auth()->user()->image))
                        <img src="{{ getImage(getFilePath('adminProfile') . '/' . auth()->user()->image) }}" alt="@lang('img')">
                    @else
                        <img src="{{ getImage(getFilePath('userProfile') . '/' . 'default_user.png') }}" alt="@lang('img')">
                    @endif
                </div>
            </li>
        </ul>
    </div>
</div>
