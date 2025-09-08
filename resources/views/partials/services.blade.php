<div class="row gy-4">
    @forelse($categories as $category)
        <div class="col-xl-4 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
                <div class="icon">
                    <img
                        src="{{ asset('assets/images/icons/service-hosting.svg') }}"
                        alt="icon"
                    />
                </div>
                <h4 class="title">
                    <a href="{{ route('servicesList', $category->id) }}" class="stretched-link">
                        {{ $category->name }}
                    </a>
                </h4>
                <p>{{ $category->discription }}</p>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <h5>هیچ خدماتی وجود ندارد</h5>
        </div>
    @endforelse
</div>
