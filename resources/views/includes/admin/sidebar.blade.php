<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('categories.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-newspaper') }}"></use>
            </svg>
            {{ __('Kategori') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('articles.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-description') }}"></use>
            </svg>
            {{ __('Artikel') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('tags.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-tag') }}"></use>
            </svg>
            {{ __('Tag') }}
        </a>
    </li>

    <li class="nav-group" aria-expanded="false">
        <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-star') }}"></use>
            </svg>
            FAQ Management
        </a>
        <ul class="nav-group-items" style="height: 0px;">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('faq-categories.index') }}" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-spreadsheet') }}"></use>
                    </svg>
                    FAQ Kategori
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('faq-questions.index') }}" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-note-add') }}"></use>
                    </svg>
                    FAQ Question
                </a>
            </li>
        </ul>
    </li>
</ul>
