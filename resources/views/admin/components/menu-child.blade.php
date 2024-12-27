<ol class="dd-list" id="menu-items">
    @if(!$children->isEmpty())
        @foreach($children as $child)
            <li class="accordion-item dd-item menu-ac-item" data-id="{{ $child->id }}">
                <div class="accordion-header position-relative">
                    <div class="move-media dd-handle">
                        <i class="fa-solid fa-arrows-up-down-left-right"></i>
                    </div>
                    <button class="accordion-button btnLabel collapsed" data-id="{{ $child->id }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $child->id }}" aria-expanded="true" aria-controls="collapseOne__id__">
                        {{ $child->name ?? '' }}
                    </button>
                </div>
                <div id="collapseOne{{ $child->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('language.admin.interfaces.menus.navigation_labels') }}</label>
                                    <input type="text" class="form-control title_url" data-id="{{ $child->id }}" id="title_url{{ $child->id }}" value="{{ $child->name ?? '' }}">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label">{{  __('language.admin.interfaces.menus.slug')}}</label>
                                    <input type="text" class="form-control slug_menu" data-id="{{ $child->id }}" id="slug_menu{{ $child->id }}" value="{{ $child->slug ?? '' }}">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label">{{  __('language.admin.interfaces.menus.url')}}</label>
                                    <input type="text" class="form-control url_menu" value="{{ $child->url ?? '' }}">
                                </div>
                            </div>

                            <input type="hidden" class="form-control record_id" value="{{ $child->record_id ?? '' }}">

                            <input type="hidden" class="form-control type_menu" value="{{ $child->type ?? '' }}">

                            <div class="d-flex align-items-center">
                                <a class="text-hover remove-menu-item remove" href="javascript:void(0);">{{  __('language.admin.interfaces.menus.deleteMenuItem')}}</a>
                                <span class="mx-2">|</span>
                                <a class="text-hover cancel" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $child->id }}" aria-expanded="true" aria-controls="collapseOne">
                                    {{  __('language.admin.interfaces.menus.cancel')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @if(count($child->childrenRecursive) > 0)
                    @include('admin.components.menu-child', [
                        'children' => $child->childrenRecursive
                    ])
                @endif
            </li>
        @endforeach
    @endif
</ol>
