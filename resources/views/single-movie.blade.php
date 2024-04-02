{{-- single-movie.blade.php --}}
@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <article @php(post_class())>
      <header>
        <h1 class="entry-title">{{ get_the_title() }}</h1>
        @include('partials.entry-meta')
      </header>

      <div class="entry-content">
        @php(the_content())
      </div>

      <footer>
        @php(comments_template())
      </footer>
    </article>
  @endwhile
@endsection