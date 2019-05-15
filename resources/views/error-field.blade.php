@if($errors->get($fieldName))
    <br><span class='genericAlert'>{{ $errors->first($fieldName) }}</span>
@endif