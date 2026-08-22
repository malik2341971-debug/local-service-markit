@extends($activeTemplate . 'layouts.master')
@section('content')
    <section class="py-120">
        <div class="container">
            <div class="card custom--card">
                @if (!blank($soldAccountListings))
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table--responsive--lg">
                                <thead>
                                    <tr>
                                        <th>@lang('Service')</th>
                                        <th>@lang('Platform / Type') </th>
                                        <th>@lang('Category') </th>
                                        <th>@lang('Service Price')</th>
                                        <th>@lang('Paid Amount')</th>
                                        <th>@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($soldAccountListings as $accountListing)
                                        <tr>
                                            <td>
                                                <div>
                                                    <p class="m-0 pb-1 fw-bold">{{ $accountListing->title }}</p>
                                                    <span class="d-block avatar avatar--xs">
                                                        <img
                                                            src="{{ getImage(getFilePath('account_listing_thumb') . '/' . $accountListing->thumbnail_image, getFileSize('account_listing_thumb')) }}">
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                {{ __($accountListing->socialMedia->name) }}
                                            </td>
                                            <td>
                                                {{ __($accountListing->category->name) }}
                                            </td>

                                            <td>
                                               {{ showAmount($accountListing->sell_price) }}
                                            </td>
                                            <td>
                                                <span class="text--base fw-bold">{{ showAmount($accountListing->buy_price) }}</span>
                                            </td>

                                            <td>
                                                <a class="btn btn-sm btn--base"
                                                    href="{{ route('user.account.listing.purchase.details', $accountListing->id) }}">
                                                    <i class="las la-desktop"></i> @lang('Details')
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if ($soldAccountListings->hasPages())
                        <div class="card-footer py-4">
                            {{ paginateLinks($soldAccountListings) }}
                        </div>
                    @endif
                @else
                    @include($activeTemplate . 'empty', ['message' => 'No services purchased yet.'])
                @endif
            </div>
        </div>
    </section>
@endsection
