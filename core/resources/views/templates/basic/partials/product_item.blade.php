<div class="product-item">
    <div class="product-item__wrapper">
        <div class="product-item__thumb">
            <a class="product-item__thumb"
                href="{{ route('account.listing.details', [slug($accountListing->title), $accountListing->id]) }}">
                <img src="{{ getImage(getFilePath('account_listing_thumb') . '/' . $accountListing->thumbnail_image, getFileSize('account_listing_thumb')) }}"
                    alt="image">
            </a>
        </div>
        <div class="product-item__content">
            <h4 class="product-item__title d-flex align-items-center mb-0">
                <a class="text--base" href="{{ route('account.listing.details', [slug($accountListing->title), $accountListing->id]) }}">{{ __(strLimit($accountListing->title, 35)) }}</a>
                @if ($accountListing->is_verified == Status::VERIFIED)
                    <span class="product-item__badge ms-1" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Verified Provider">
                        <span class="product-item__badge-icon"><i class="las la-check"></i></span>
                    </span>
                @endif
            </h4>
            <p class="product-item__text fw-bold text--base mt-1"> 
                {{ showAmount($accountListing->sell_price) }}
            </p>
        </div>
    </div>
    <div class="d-flex align-items-center flex-wrap">
        <div class="product-item__button">
            <a href="{{ route('account.listing.details', [slug($accountListing->title), $accountListing->id]) }}" class="btn btn--base">
                @lang('Order Now')
            </a>
        </div>
    </div>
</div>
