@extends('layouts.app')

@section('title', '留言板')

@section('content')
    <div class="container">
    	@include('common.alerts')
    	<div class="justify-content-center">
    		<div class="card mb-3">
    			<div class="card-header">發表留言</div>
    			<div class="card-body">
    				<form
    					method="post"
    					action="{{ route('messages.store') }}"
    					autocomplete="off"
    					id="form">
    					{{ csrf_field() }}
    					<div class="form-row mb-2">
    						<textarea
                                class="form-control"
                                name="content"
                                id="content"
                                placeholder="說點什麼？（至少20個字元）"
                                required>@error('content'){{ old('content') }}@enderror</textarea>
    					</div>
    					<div class="form-row align-items-center justify-content-end">
    						<button class="btn btn-primary" type="submit">送出</button>
    					</div>
    				</form>
    			</div>
    		</div>
    		@foreach ($messages as $message)
    		<div
    			class="card mb-3"
    			id="{{ 'msg-'.$message->id }}">
    			<div class="card-header">
    				<div class="row">
    					<div class="col">
		    				{{ $message->author->name }}
		    				<small class="text-secondary">{{ $message->author->email }}</small>
    					</div>
    					<div class="col text-muted text-right">
    						<time title="{{ $message->created_at }}">
    							<?php echo $message->created_at->diffForHumans() ?>
    							<i class="fas fa-calendar-day fa-fw"></i>
    						</time>
    					</div>
    				</div>
    			</div>
    			<div class="card-body">
    				<pre>{{ $message->content }}</pre>
    			</div>
    		</div>
    		@endforeach
    		{{ $messages->links() }}
    	</div>
    </div>
@endsection