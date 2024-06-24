<x-layout-dashboard>
    <div class="content_cars content">
        <div class="boxs">
            <form class="form" method="POST" action="{{ route('backend.car.update',$car->id) }}" enctype="multipart/form-data">
                
                
                <div class="box_f">
                    <label class="txt" for="company_id">
                        Company
                    </label>
                    <select id="company_id" name="company_id" value={{old('company_id')}}>

                        <option value="">Select Company</option>

                        @foreach ($company as $c)
                                <option {{ $car->company_id === $c->id ? "selected" : "" }}  value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="box_f">
                    <label class="txt" for="model_name">
                        Model
                    </label>
                    <input type="text" value="{{ $car->model->name }}" id="model_id" name="model_name"
                        placeholder="model">
                </div>
                <div class="box_f">
                    <label class="txt" for="year">
                        Year
                    </label>
                    <select id="year" name="year">
                        <option value="">Select Year</option>
                        @for ($i = now()->year - 20; $i <= now()->year; $i++)
                            <option  {{ $car->year == $i ? "selected" : "" }} value="{{ $i }}">{{ $i }}</option>
                        @endfor

                    </select>
                </div>
                <div class="box_f">
                    <label class="txt" for="rental_price">
                        Price
                    </label>
                    <input type="text" value="{{ $car->rental_price }}" name="rental_price" id="rental_price"
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
                    <input type="text" min="2" max="6" value="{{ $car->doors }}" name="doors"
                        id="doors" placeholder="Doors">
                </div>
                <div class="box_f">
                    <label class="txt" for="transmission">
                        Transmission
                    </label>
                    <select id="transmission" name="transmission">
                        <option {{ $car->transmission == "manual" ? "selected" : "" }} value="manual">Manual</option>
                        <option {{ $car->transmission == "auto" ? "selected" : "" }} value="auto">Auto</option>
                    </select>
                </div>
                <div class="box_f">
                    <label class="txt" for="description">
                        Description
                    </label>
                    <textarea name="description" id="description">{{ $car->description }}</textarea>
                </div>
                <div class="box_f">
                    @csrf
                @method('PUT')
                    <button class="btn_submit" type="submit">Update Car</button>
                </div>
            </form>
        </div>
    </div>
</x-layout-dashboard>
