<!-- resources/views/collections/new.blade.php -->
{!! Form::open(['url' => '/collections/create']) !!}

name {!! Form::text('name', null, []) !!}
<br>
image {!! Form::textarea('image', null, ['rows'=>3]) !!}
<br>
description {!! Form::textarea('description', null, ['rows'=>3]) !!}
<br>
public {!! Form::select('public', [
  'public' => 'public',
  'private' => 'private',
  'shareable' => 'shareable',
], 'private') !!}
<br>
{!! Form::button('create collection'),[
  'type' => 'submit'
] !!}
{!! Form::close() !!}