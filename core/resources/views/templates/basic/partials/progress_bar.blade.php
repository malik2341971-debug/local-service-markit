
<div class="social-media-sidebar">
    <ul class="account-list">
        <li class="account-list__item">
            <a class="account-list__link" href="{{route('user.account.listing.social.media.category',@$accountListing->id)}}"> <span class="account-list__icon active">
            <i class="fas fa-check"></i>
            </span> @lang('Category & Platform') </a>
        </li>
        <li class="account-list__item">
            <a class="account-list__link" href="@if (listingProgressbar(@$accountListing,1,true)) {{ route('user.account.listing.bidding.info', @$accountListing->id) }}@else javascript:void(0) @endif"> <span class="account-list__icon {{ listingProgressbar(@$accountListing,1) }}">
                <i class="fas fa-check"></i>
            </span> @lang('Service Pricing')
            </a>
        </li>
        <li class="account-list__item"><a class="account-list__link" href="@if (listingProgressbar(@$accountListing,2,true)) {{ route('user.account.listing.url.description', @$accountListing->id) }}@else javascript:void(0) @endif"> <span class="account-list__icon {{ listingProgressbar(@$accountListing,2) }}">
            <i class="fas fa-check"></i>
            </span> @lang('Portfolio & Description') </a>
        </li>
        <li class="account-list__item"><a class="account-list__link" href="@if (listingProgressbar(@$accountListing,3,true)) {{ route('user.account.listing.account.info', @$accountListing->id) }}@else javascript:void(0) @endif"> <span class="account-list__icon {{ listingProgressbar(@$accountListing,3) }}">
            <i class="fas fa-check"></i>
            </span> @lang('Service Specifications') </a>
        </li>
        <li class="account-list__item"><a class="account-list__link" href="@if (listingProgressbar(@$accountListing,4,true)) {{ route('user.account.listing.account.credential', @$accountListing->id) }}@else javascript:void(0) @endif"> <span class="account-list__icon {{ listingProgressbar(@$accountListing,4) }}">
            <i class="fas fa-check"></i>
            </span> @lang('Deliverables & Instructions') </a>
        </li>
        <li class="account-list__item"><a class="account-list__link" href="@if (listingProgressbar(@$accountListing,5,true)) {{ route('user.account.listing.thumbnail.image', @$accountListing->id) }}@else javascript:void(0) @endif"> <span class="account-list__icon {{ listingProgressbar(@$accountListing,5) }}">
            <i class="fas fa-check"></i>
            </span> @lang('Cover & Media') </a>
        </li>
        <li class="account-list__item"><a class="account-list__link" href="@if (listingProgressbar(@$accountListing,6,true)) {{ route('user.account.listing.publish',@$accountListing->id) }}@else javascript:void(0) @endif"> <span class="account-list__icon {{ listingProgressbar(@$accountListing,6) }}">
            <i class="fas fa-check"></i>
            </span> @lang('Publish Service') </a>
        </li>
    </ul>
</div>
