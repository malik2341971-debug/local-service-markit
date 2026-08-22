@extends($activeTemplate . 'layouts.master')
@section('content')
    <section class="py-120">
        <div class="container">
            <div class="show-filter mb-3 text-end">
                <button class="btn btn--base showFilterBtn btn-sm" type="button">
                    <i class="las la-filter"></i> @lang('Filter')
                </button>
            </div>
            <div class="responsive-filter-card mb-4">
                <form class="listing-search-form">
                    <div class="d-flex align-items-end justify-content-end flex-wrap gap-4">
                        <div>
                            <input class="form--control" name="search" type="text" value="{{ request()->search }}"
                                placeholder="@lang('Search')">
                        </div>
                        <button class="btn btn--base btn--filter"><i class="fas fa-search"></i> @lang('Search')</button>
                    </div>
                </form>
            </div>
            <div class="card custom--card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table--responsive--lg table">
                            <thead>
                                <tr>
                                    <th>@lang('Service')</th>
                                    <th>@lang('Platform | Category') </th>
                                    <th>@lang('Fixed Price')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($accountListings as $accountListing)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-wrap gap-2 justify-content-end justify-content-md-start align-items-center">
                                                <span class="avatar avatar--xs">
                                                    <img
                                                        src="{{ getImage(getFilePath('account_listing_thumb') . '/thumb_' . $accountListing->thumbnail_image, getFileSize('account_listing_thumb')) }}">
                                                </span>
                                                <a href="{{ route('account.listing.details', [slug($accountListing->title), $accountListing->id]) }}"
                                                    class="fs-15">
                                                    {{ strLimit($accountListing->title, 25) }}
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            {{ __(@$accountListing->socialMedia->name) }}
                                            <br>
                                            <span class="text-muted">{{ __(@$accountListing->category->name) }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">{{ gs('cur_sym') }}{{ showAmount($accountListing->sell_price) }}</span>
                                        </td>
                                        <td>
                                            @php echo $accountListing->statusBadge; @endphp
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end flex-wrap gap-2">

                                                @if ($accountListing->status == Status::LISTING_SOLD)
                                                    <a class="btn btn--sm btn-outline--primary disabled"
                                                        href="javascript:void(0)">
                                                        <i class="la la-pencil"></i> @lang('Edit')
                                                    </a>
                                                @else
                                                    <a class="btn btn--sm btn-outline--primary"
                                                        href="{{ route('user.account.listing.social.media.category', [$accountListing->id, true]) }}">
                                                        <i class="la la-pencil"></i> @lang('Edit')
                                                    </a>
                                                @endif

                                                @if ($accountListing->status == Status::LISTING_INACTIVE)
                                                    <button class="btn btn-outline--base confirmationBtn btn--sm"
                                                        data-question="@lang('Are you sure to activate this service ?')"
                                                        data-action="{{ route('user.account.listing.status', $accountListing->id) }}">
                                                        <i class="las la-eye"></i>@lang('Active')
                                                    </button>
                                                @elseif($accountListing->status == Status::LISTING_REJECTED)
                                                    <button class="btn btn-outline--danger btn--sm confirmationBtn"
                                                        data-question="@lang('Are you sure to delete this service ?')"
                                                        data-action="{{ route('user.account.listing.delete', $accountListing->id) }}">
                                                        <i class="las la-trash"></i>@lang('Delete')
                                                    </button>
                                                @else
                                                    <button class="btn btn-outline--warning btn--sm confirmationBtn"
                                                        data-question="@lang('Are you sure to deactivate this service ?')"
                                                        data-action="{{ route('user.account.listing.status', $accountListing->id) }}"
                                                        @disabled($accountListing->status !== Status::LISTING_ACTIVE)>
                                                        <i class="las la-eye-slash"></i>@lang('Inactive')
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">
                                            @include($activeTemplate . 'empty', [
                                                'message' => 'No services listed yet.',
                                            ])
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if ($accountListings->hasPages())
                <div class="card-footer py-4">
                    {{ paginateLinks($accountListings) }}
                </div>
            @endif
        </div>
    </section>

    <div class="modal fade custom--modal" id="rejectReasonModal" aria-labelledby="exampleModalLabel" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <span>@lang('Reason for Rejection')</span>
                    </h5>
                    <button class="btn-close modal-icon" data-bs-dismiss="modal" type="button" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="reson-box"></p>
                </div>
                </form>
            </div>
        </div>
    </div>
    @php
        $addClass = 'custom--modal';
    @endphp
    <x-confirmation-modal :addClass="$addClass" :customButton=true />
@endsection

@push('script')
    <script>
        (function($) {
            "use strict";
            $('.reasonBtn').on('click', function() {
                var modal = $('#rejectReasonModal');
                modal.find('.reson-box').html(($(this).data('reason')));
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
