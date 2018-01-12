<div class="field">
	<label for="{{ $id }}">{{ $label }}</label><br>
	<input type="{{ isset($type) ? $type :  'text' }}" name="{{ $name }}" id="{{ $id }}" value="{{ isset($value) ? $value :  '' }}" 
	{!! isset($ngModel) ? 'ng-model="'.$ngModel.'"': ""!!}
	{!! isset($attrs) ? $attrs: ""!!}	
	>

	{{ $slot }}
</div>