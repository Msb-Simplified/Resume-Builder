


<div class="form-group">
    <div class="input-group"> 
        {{ $slot }} 
    </div>
 
   <strong {{ $attributes->merge(['class' =>$errortext]) }}  style="color: red; font-size:12px; display:none;">Something going wrong</strong>
</div>