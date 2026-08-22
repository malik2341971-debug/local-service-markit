@php
    $topSellingContent = getContent('top_account.content', true);
    $accountListings = App\Models\AccountListing::searchable(['title'])
        ->with(['category', 'socialMedia', 'user'])
        ->active()
        ->activeSocialMedia()
        ->activeCategory()
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
@endphp

@if (!blank($accountListings))
    <div class="influential-profile-section py-120 section-bg-two">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <span class="section-heading__subtitle"> {{ __(@$topSellingContent->data_values->title ?? 'Featured Services') }}
                        </span>
                        <h3 class="section-heading__title"> {{ __(@$topSellingContent->data_values->heading ?? 'Explore Top Rated Local Services') }} </h3>
                    </div>
                </div>
            </div>
            <div class="table-responsive account__tab pt-3">
                <table class="table--responsive--lg table">
                    <thead>
                        <tr>
                            <th> @lang('Service Name') </th>
                            <th> @lang('Category') </th>
                            <th> @lang('Platform / Type') </th>
                            <th> @lang('Price') </th>
                            <th> @lang('Action') </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accountListings as $accountListing)
                            <tr>
                                <td>
                                    <div class="account">
                                        <p class="account__name d-flex">
                                            <a
                                                href="{{ route('account.listing.details', [slug($accountListing->title), $accountListing->id]) }}">
                                                {{ __($accountListing->title) }}
                                            </a>
                                            @if ($accountListing->is_verified == Status::VERIFIED)
                                                <span class="product-item__badge ms-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="@lang('Verified Provider')"> <span
                                                        class="product-item__badge-icon"><i
                                                            class="las la-check"></i></span></span>
                                            @endif
                                        </p>
                                    </div>
                                </td>
                                <td> {{ __(@$accountListing->category->name) }} </td>
                                <td>
                                    <span class="badge badge--primary">
                                        {{ __(@$accountListing->socialMedia->name) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="fw-bold text--base">{{ showAmount($accountListing->sell_price) }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('account.listing.details', [slug($accountListing->title), $accountListing->id]) }}" class="btn btn--base btn-sm">
                                        @lang('Order Now')
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
