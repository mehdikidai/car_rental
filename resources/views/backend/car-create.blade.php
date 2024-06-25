<x-layout-dashboard>
    <div class="content_cars content">
        
        <div class="boxs">
            <x-tit txt="Add a new car"></x-tit>

            <x-space h="20" />
            <form class="form" method="POST" action="{{ route('backend.car.store') }}" enctype="multipart/form-data">

                <div class="box_f">
                    <label class="txt" for="company_id">
                        Company
                    </label>
                    <select id="company_id" name="company_id" value={{ old('company_id') }}>

                        <option value="">Select Company</option>

                        @foreach ($company as $c)
                            <option {{ old('company_id') == $c->id ? 'selected' : '' }} value="{{ $c->id }}">
                                {{ $c->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="box_f">
                    <label class="txt" for="model_name">
                        Model
                    </label>
                    <input type="text" value="{{ old('model_name') }}" id="model_id" name="model_name"
                        placeholder="model">
                </div>
                <div class="box_f">
                    <label class="txt" for="year">
                        Year
                    </label>
                    <select id="year" name="year">
                        <option value="">Select Year</option>
                        @for ($i = now()->year - 20; $i <= now()->year; $i++)
                            <option {{ old('year') == $i ? 'selected' : '' }} value="{{ $i }}">
                                {{ $i }}</option>
                        @endfor

                    </select>
                </div>
                <div class="box_f">
                    <label class="txt" for="rental_price">
                        Price
                    </label>
                    <input type="text" value="{{ old('rental_price') }}" name="rental_price" id="rental_price"
                        placeholder="Price">
                </div>
                <div class="box_f">
                    <label class="txt" for="photo">
                        Photo
                    </label>
                    <input type="file" name="photo" id="photo" style="display: none">
                    <button type="button" class="btn_upload" id="btn_upload">Add Photo</button>
                </div>
                <div class="box_f">
                    <label class="txt" for="doors">
                        Doors
                    </label>
                    <input type="text" min="2" max="6" value="{{ old('doors') }}" name="doors"
                        id="doors" placeholder="Doors">
                </div>
                <div class="box_f">
                    <label class="txt" for="transmission">
                        Transmission
                    </label>
                    <select id="transmission" name="transmission">
                        <option {{ old('transmission') == 'manual' ? 'selected' : '' }} value="manual">Manual</option>
                        <option {{ old('transmission') == 'auto' ? 'selected' : '' }} value="auto">Auto</option>
                    </select>
                </div>
                <div class="box_f">
                    <label class="txt" for="description">
                        Description
                    </label>
                    <textarea name="description" value="{{ old('description') }}" id="description" cols="30" rows="10"></textarea>
                </div>
                <div class="box_f">
                    @csrf
                    <button class="btn_submit" type="submit">Add Car</button>
                </div>
            </form>
        </div>
        <x-space h="24" />
        <div class="boxs">
            <x-tit txt="Add a new company"></x-tit>

            <x-space h="20" />
            <form action="{{ route('backend.company.store') }}" method="post">
                <div class="box_f">
                    <label class="txt" for="name">
                        Company
                    </label>
                    <input type="text" value="{{ old('name') }}" id="name_company" name="name"
                        placeholder="name">
                </div>
    
                <div class="box_f">
                    @csrf
                    <button class="btn_submit" type="submit">Add Company</button>
                </div>
            </form>
        </div>
    </div>
</x-layout-dashboard>
