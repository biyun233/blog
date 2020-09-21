<form method="post" action="{{ route('articles.store_comment', $post->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control @error('comment_name') is-invalid @enderror" name="comment_name" id="comment_name" placeholder="Votre nom" value="{{ old('nom') }}">
        @error('comment_name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" class="form-control @error('comment_email') is-invalid @enderror" name="comment_email" id="comment_email" placeholder="Votre email" value="{{ old('email') }}">
        @error('comment_email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <textarea class="form-control @error('comment_content') is-invalid @enderror" name="comment_content" id="comment_content" placeholder="Message" rows="8">{{ old('message') }}</textarea>
        @error('comment_content')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <input type="hidden" name="post_id" value="{{ $post->id }}" />
    <button type="submit" name="Envoyer" class="btn btn-info input-lg">Envoyer</button>
</form>

