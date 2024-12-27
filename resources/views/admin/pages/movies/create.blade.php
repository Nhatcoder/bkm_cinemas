@extends('admin.layouts.main')

@section('title', 'Thêm mới phim')

@section('css')
    <style>
        .actor-upload .avatar-preview>div {
            width: 90px;
            height: 90px;
            border-radius: 5px;
        }
        .actor-upload .avatar-preview {
            padding: 2px;
            width: 95px;
            height: 95px;
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-titles">
                            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                @include('admin.components.breadcrumbs', [
                                    'breadcrumbs' => $breadcrumbs,
                                ])
                            </nav>
                        </div>
                    </div>
                </div>
                <form method="post" action="{{ route('admin.movies.store') }}" class="product-vali"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#infor"><i
                                        class="la la-home me-2"></i>{{ __('language.admin.movies.inforMovie') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#actor"><i
                                        class="la la-user me-2"></i>{{ __('language.admin.movies.actor') }}</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="infor" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-8">
                                        <div class="card h-auto">
                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <div class="col-6">
                                                        <label
                                                            class="form-label mb-2">{{ __('language.admin.movies.title') }}</label>
                                                        <input type="text" value="{{ old('movie.title') }}"
                                                            id="name" name="movie[title]" class="form-control"
                                                            placeholder="{{ __('language.admin.movies.inputTitle') }}">
                                                        @error('movie.title')
                                                            <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-6">
                                                        <label
                                                            class="form-label mb-2">{{ __('language.admin.movies.slug') }}</label>
                                                        <input type="text" value="{{ old('movie.slug') }}"
                                                            class="form-control" id="slug" name="movie[slug]"
                                                            placeholder="{{ __('language.admin.movies.inputSlug') }}">
                                                        @error('movie.slug')
                                                            <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label
                                                        class="form-label mb-2">{{ __('language.admin.movies.director') }}</label>
                                                    <input value="{{ old('movie.director') }}" type="text"
                                                        class="form-control" name="movie[director]"
                                                        placeholder="{{ __('language.admin.movies.director') }}">
                                                    @error('movie.director')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-6">
                                                        <label
                                                            class="form-label mb-2">{{ __('language.admin.movies.duration') }}</label>
                                                        <input value="{{ old('movie.duration') }}" type="number"
                                                            id="duration" name="movie[duration]" min="1"
                                                            class="form-control"
                                                            placeholder="{{ __('language.admin.movies.duration') }}">
                                                        @error('movie.duration')
                                                            <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-6">
                                                        <label
                                                            class="form-label mb-2">{{ __('language.admin.movies.formatMovie.name') }}</label>
                                                        <select name="movie[format]" id="" class="form-control">
                                                            <option value="2d" @selected(old('movie.format') == '2d')>
                                                                {{ __('language.admin.movies.formatMovie.2d') }}</option>
                                                            <option value="3d" @selected(old('movie.format') == '3d')>
                                                                {{ __('language.admin.movies.formatMovie.3d') }}</option>
                                                        </select>
                                                        @error('movie.format')
                                                            <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label
                                                        class="form-label mb-2">{{ __('language.admin.movies.trailer_url') }}</label>
                                                    <input value="{{ old('movie.trailer_url') }}"
                                                        placeholder="{{ __('language.admin.movies.trailer_url') }}"
                                                        type="text" class="form-control" name="movie[trailer_url]">
                                                    @error('movie.trailer_url')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-6">
                                                        <label
                                                            class="form-label mb-2">{{ __('language.admin.movies.release_date') }}:</label>
                                                        <input type="date" value="{{ old('movie.release_date') }}"
                                                            name="movie[release_date]" class="form-control">
                                                        @error('movie.release_date')
                                                            <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-6">
                                                        <label
                                                            class="form-label mb-2">{{ __('language.admin.movies.premiere_date') }}</label>
                                                        <input type="date" value="{{ old('movie.premiere_date') }}"
                                                            name="movie[premiere_date]" class="form-control">
                                                        @error('movie.premiere_date')
                                                            <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label mb-2">Tuổi:</label>
                                                    <input value="{{ old('movie.age') }}"
                                                        placeholder="{{ __('language.admin.movies.inputAge') }}"
                                                        type="number" min="1" class="form-control"
                                                        name="movie[age]">
                                                    @error('movie.age')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-6">
                                                        <label class="form-label mb-2">Quốc gia:</label>
                                                        <input value="{{ old('movie.country') }}" type="text"
                                                            id="country" name="movie[country]" class="form-control"
                                                            placeholder="{{ __('language.admin.movies.inputCountry') }}">
                                                        @error('movie.country')
                                                            <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-6">
                                                        <label
                                                            class="form-label mb-2">{{ __('language.admin.movies.language') }}</label>
                                                        <select name="movie[language]" id=""
                                                            class="form-control">
                                                            <option value="vietsub">
                                                                {{ __('language.admin.movies.vietSub') }}</option>
                                                            <option value="noVietsub">
                                                                {{ __('language.admin.movies.noVietsub') }}</option>
                                                        </select>
                                                        @error('movie.language')
                                                            <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label
                                                        class="form-label mb-2">{{ __('language.admin.movies.introduce') }}</label>
                                                    <textarea placeholder="{{ __('language.admin.movies.inputIntroduce') }}" class="form-control" cols="20"
                                                        rows="5" name="movie[description]">{{ old('movie.description') }}</textarea>
                                                    @error('movie.description')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label
                                                        class="form-label mb-2">{{ __('language.admin.movies.content') }}</label>
                                                    <textarea placeholder="{{ __('language.admin.movies.inputContent') }}" name="movie[content]"
                                                        class="ckeditor"style="display: none;">{{ old('movie.content') }}</textarea>
                                                    @error('movie.content')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="right-sidebar-sticky">
                                            <div class="filter cm-content-box box-primary">
                                                <div class="content-title SlideToolHeader">
                                                    <div class="cpa">
                                                        {{ __('language.admin.movies.genre') }}
                                                    </div>
                                                </div>
                                                <div class="cm-content-body publish-content form excerpt">
                                                    <div class="card-body">
                                                        <select multiple class="form-control" name="genre_id[][genre_id]">
                                                            <option value=" " disabled>
                                                                --{{ __('language.admin.movies.select') }}--
                                                            </option>
                                                            @if ($listGenre)
                                                                @foreach ($listGenre as $genre)
                                                                    <option value="{{ $genre->id }}"
                                                                        @selected(in_array($genre->id, array_column(old('genre_id', []), 'genre_id')))>
                                                                        {{ $genre->name }}
                                                                    </option>
                                                                    @if (count($genre->childrenRecursive) > 0)
                                                                        @include(
                                                                            'admin.components.child-category',
                                                                            [
                                                                                'children' =>
                                                                                    $genre->childrenRecursive,
                                                                                'depth' => 1,
                                                                            ]
                                                                        )
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('genre_id')
                                                            <div class="text-danger mt-2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="filter cm-content-box box-primary">
                                                <div class="content-title SlideToolHeader">
                                                    <div class="cpa">
                                                        {{ __('language.admin.movies.image') }}
                                                    </div>
                                                </div>
                                                <div class="cm-content-body publish-content form excerpt">
                                                    <div class="card-body">
                                                        <div class="avatar-upload d-flex align-items-center">
                                                            <div class="position-relative" style="width: 120px;">
                                                                <div class="avatar-preview">
                                                                    <div class="imagePreview"
                                                                        style="background-image: url({{ asset('images/no-img-avatar.png') }});">
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="change-btn d-flex align-items-center flex-wrap">
                                                                    <input type="file"
                                                                        class="form-control d-none uploadImage"
                                                                        id="imageUpload1" name="movie[image]"
                                                                        accept=".png, .jpg, .jpeg">
                                                                    <label for="imageUpload1"
                                                                        class="btn btn-sm btn-primary light ms-0">{{ __('language.admin.movies.select') }}</label>
                                                                    <div id="image_error1" class="mt-2"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="filter cm-content-box box-primary">
                                                <div class="content-title SlideToolHeader">
                                                    <div class="cpa">
                                                        {{ __('language.admin.movies.banner') }}
                                                    </div>
                                                </div>
                                                <div class="cm-content-body publish-content form excerpt">
                                                    <div class="card-body">
                                                        <div class="avatar-upload d-flex align-items-center">
                                                            <div class="position-relative" style="width: 120px;">
                                                                <div class="avatar-preview">
                                                                    <div class="imagePreview"
                                                                        style="background-image: url({{ asset('images/no-img-avatar.png') }});">
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="change-btn d-flex align-items-center flex-wrap">
                                                                    <input type="file"
                                                                        class="form-control d-none uploadImage"
                                                                        id="imageUpload2" name="movie[banner_movie]"
                                                                        accept=".png, .jpg, .jpeg">
                                                                    <label for="imageUpload2"
                                                                        class="btn btn-sm btn-primary light ms-0">{{ __('language.admin.movies.select') }}</label>
                                                                    <div id="image_error2" class="mt-2"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="filter cm-content-box box-primary">
                                                <div class="content-title SlideToolHeader">
                                                    <div class="cpa">
                                                        {{ __('language.admin.movies.customize') }}
                                                    </div>
                                                </div>
                                                <div class="cm-content-body publish-content form excerpt">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="p-3">
                                                                <label
                                                                    class="form-label">{{ __('language.admin.movies.status') }}</label><br>
                                                                <div class="row mt-2">
                                                                    <div class="col-sm-6">
                                                                        <input class="form-check-input" type="radio"
                                                                            id="active" name="movie[active]" value="1" @checked(old('movie.active', 1) == 1)>
                                                                        <label class="form-check-label" for="active">
                                                                            {{ __('language.admin.movies.show') }}
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <input class="form-check-input" value="0"
                                                                            type="radio" id="active" name="movie[active]" @checked(old('movie.active', 1) == 0)>
                                                                        <label class="form-check-label" for="active">
                                                                            {{ __('language.admin.movies.hidden') }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="p-3">
                                                                <label
                                                                    class="form-label">{{ __('language.admin.movies.numberOrder') }}</label>
                                                                <br>
                                                                <input class="form-control" value="{{ old('movie.order', 0) }}" type="number"
                                                                    min="0" id="order" name="movie[order]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="card-body">
                                                                <label
                                                                    class="form-label">{{ __('language.admin.movies.hot') }}</label><br>
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="hot" name="movie[hot]" value="1"
                                                                    @checked(old('movie.hot', 0) == 1)>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 d-flex justify-content-start gap-2">
                                                <button type="submit"
                                                    class="btn btn-success">{{ __('language.admin.movies.addNew') }}</button>
                                                <a href="{{ route('admin.movies.index') }}"
                                                    class="btn btn-warning">{{ __('language.admin.movies.back') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="actor">
                                <div class="row">
                                    <div class="col-xl-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>
                                                    {{ __('language.admin.movies.chooseActor') }}
                                                </h5>
                                                <select multiple="multiple" id="movie_actors" style="width:100%;" name="actor_id[]" class="js-example-disabled-multi">
                                                    @if (!empty($actors))
                                                        @foreach ($actors as $actor)
                                                            <option value="{{ $actor->id }}"
                                                                    data-image="{{ asset($actor->image) }}"
                                                                    @selected(in_array($actor->id, old('actor_id', [])))>
                                                                {{ $actor->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div id="roleBoxes">
                                                    @if (!empty(old('movie_actors')))
                                                        @foreach (old('movie_actors') as $index => $item)
                                                            <div class="role-box" data-actor-id="{{ $item['actor_id'] }}" data-index="{{ $index }}">
                                                                <label>Vai trò của {{ old('actors_name')[$index] }}: </label>
                                                                <input class="form-control" type="text" name="movie_actors[{{ $index }}][role]" value="{{ $item['role'] }}">
                                                                <input class="form-control" type="text" hidden name="movie_actors[{{ $index }}][actor_id]" value="{{ $item['actor_id'] }}">
                                                                <input class="form-control" type="text" hidden name="actors_name[{{ $index }}]" value="{{ old('actors_name')[$index] }}">
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="btn btn-success" id="add-actor">
                                                    {{ __('language.admin.movies.addActor') }}
                                                </div>
                                                <div id="actor-list" class="row mt-4">
                                                    @if (!empty(old('actors')))
                                                        @foreach (old('actors') as $index => $actor)
                                                            @if (empty($actor['name']))
                                                                @continue
                                                            @endif
                                                            <div class="actor-row row mt-3" data-index="{{ $index }}">
                                                                <div class="col-2">
                                                                    <label
                                                                        class="form-label mb-2">Tên:</label>
                                                                    <input type="text" value="{{ $actor['name'] }}"
                                                                        name="actors[{{ $index }}][name]" class="form-control">
                                                                </div>

                                                                <div class="col-3">
                                                                    <label
                                                                        class="form-label mb-2">Ngày sinh:</label>
                                                                    <input type="date" value="{{ $actor['birth_date'] }}"
                                                                        name="actors[{{ $index }}][birth_date]" class="form-control">
                                                                </div>
                                                                <div class="col-2">
                                                                    <label
                                                                        class="form-label mb-2">Quốc tịch:</label>
                                                                    <input type="text" value="{{ $actor['nationality'] }}"
                                                                        name="actors[{{ $index }}][nationality]" class="form-control">
                                                                </div>
                                                                <div class="col-2">
                                                                    <label
                                                                        class="form-label mb-2">Vai trò:</label>
                                                                    <input type="text" value="{{ old('role')[$index] }}"
                                                                        name="role[{{ $index }}]" class="form-control">
                                                                </div>
                                                                <div class="col-2">
                                                                    <label
                                                                        class="form-label mb-2 d-flex justify-content-center align-items-center">
                                                                        Ảnh diễn viên:
                                                                    </label>
                                                                    <div class="avatar-upload actor-upload">
                                                                        <div class="position-relative d-flex justify-content-center align-items-center">
                                                                            <div class="avatar-preview">
                                                                                <div class="imagePreview"
                                                                                    style="background-image: url({{ asset('images/no-img-avatar.png') }});">
                                                                                </div>
                                                                            </div>
                                                                            <input type="file"
                                                                                class="form-control d-none uploadImage"
                                                                                id="actorImage{{$index}}" name="actors[{{$index}}][image]"
                                                                                accept=".png, .jpg, .jpeg">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1 mt-4">
                                                                    <a href="#" class="btn btn-danger" onclick="deleteActor(event)">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/commons/movies/create.js') }}"></script>
@endsection
