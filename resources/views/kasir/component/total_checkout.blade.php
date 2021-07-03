<div class="total ml-auto">
    @currency(Session::get('total'))
    <input type="hidden" name="total" id="total" value="{{ Session::get('total') }}">
</div>