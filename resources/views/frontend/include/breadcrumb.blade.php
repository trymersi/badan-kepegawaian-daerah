<div class="page-title-area text-white bg-image bg-overlay ptb-60" style="background-image:url(http://via.placeholder.com/1920x180);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content">
                    <div class="page-header-caption">
                        <h1>{{ isset($page_name) ? $page_name : $category_name }}</h1>
                    </div>
                    <div class="breadcrumb-area">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>   
                            <li aria-current="page" class="breadcrumb-item {{ isset($page_name) ? '' : 'active' }}">{{ ucwords($category_name) }}</li>
                            @if(isset($page_name))
                            <li aria-current="page" class="breadcrumb-item active">{{ ucwords($page_name) }}</li>
                            @endif
                        </ol>
                    </div>
                </div><!--~~./ page-header-content ~~-->
            </div>
        </div>
    </div><!--~~./ end container ~~-->
</div>
<!--~~./ end page title area ~~-->