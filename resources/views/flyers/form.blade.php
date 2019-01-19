<div class="form-group">
    <label for="street">Street</label>
    <input name="street" type="text" class="form-control" id="street" value="{{ old('street') }}">
</div>

<div class="form-group">
    <label for="city">City</label>
    <input name="city" type="text" class="form-control" id="city" value="{{ old('city') }}">
</div>


<div class="form-group">
    <label for="zip">Zip/Postal code</label>
    <input name="zip" type="text" class="form-control" id="zip" value="{{ old('zip') }}">
</div>


    <div class="form-group">
    <label for="country">Country</label>
    <select name="country" class="form-control" id="country">
        @foreach($countries::all() as $country => $code)
                <option value="{{ $code }}">{{ $country }}</option> 
        @endforeach
    </select>
</div>

<hr>

<div class="form-group">
    <label for="price">Price</label>
    <input name="price" type="text" class="form-control" id="price" value="{{ old('price') }}">
</div>

<div class="form-group">
    <label for="description">Home description</label>
    <textarea name="description"  rows="5" class="form-control" id="description">
        {{ old('description') }}
    </textarea>
</div>


<button type="submit" class="btn btn-primary">Submit</button>