<div class="form-group">
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('subtitle', 'Subtitle:') !!}
    {!! Form::text('subtitle', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('dedication', 'Dedication:') !!}
    {!! Form::textarea('dedication', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('website', 'Website:') !!}
    {!! Form::text('website', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('percent_complete', 'Percent Complete:') !!}
    {!! Form::text('percent_complete', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published', 'Published:') !!}
    {!! Form::checkbox('published') !!}
</div>