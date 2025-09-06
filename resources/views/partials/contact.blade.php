    <!-- نمایش پیام موفقیت -->
    @if (session('success'))
        <div class="alert alert-success" id="successMessage" style="margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <!-- نمایش خطاها -->
    @if ($errors->any())
        <div class="alert alert-danger" style="margin-bottom:20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- فرم -->
    <form id="contactForm" method="POST" action="{{ route('contact.send') }}">
        @csrf
        <div class="row mb-3">
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" placeholder="نام" style="font-size: 20px" required>
            </div>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="email" placeholder="ایمیل" style="font-size: 20px" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12">
                <input type="text" class="form-control" name="title" placeholder="موضوع" style="font-size: 20px" required>
            </div>
        </div>
        <div class="form-group mb-3">
            <textarea class="form-control" rows="5" name="description" placeholder="پیام" style="font-size: 20px" required></textarea>
        </div>
        <button class="btn btn-primary" type="submit" style="font-size: 20px; padding: 5px 40px; border-radius: 5px;     background: #025add;">ارسال</button>
    </form>